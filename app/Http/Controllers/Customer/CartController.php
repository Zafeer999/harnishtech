<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AssignedOrder;
use App\Models\Category;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ServiceBoyPincode;
use App\Models\TimeSlot;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $authUser = Auth::user();

        $cartItems = \Cart::getContent();
        $cartTotal = Category::whereIn('id', $cartItems->pluck('id'))->sum('min_price');
        $serviceCharge = config('setting_data.IS_SERVICE_CHARGE_ENABLE') ? config('setting_data.SERVICE_CHARGE') : 0;
        $cities = City::selectRaw('MIN(id) as id, name')->groupBy('name')->get();
        $slots = TimeSlot::get();

        $gstCharge = config('setting_data.IS_GST_ENABLE') ? (($serviceCharge+$cartTotal) * config('setting_data.GST_PERCENTAGE')) / 100 : 0;

        $userAddresses = $authUser ? UserAddress::where('user_id', $authUser->id)->get() : collect([]);

        return view('customer.carts')->with(['cartItems' => $cartItems, 'cartTotal' => $cartTotal, 'serviceCharge' => $serviceCharge, 'gstCharge' => $gstCharge, 'cities' => $cities, 'slots' => $slots, 'userAddresses' => $userAddresses]);
    }

    public function store(Request $request)
    {
        $service = Category::find($request->service_id);
        if(!$service)
            return response()->json(['error2' => "Invalid cart item requested"], 500);

        \Cart::add(array(
            'id' => $request->service_id,
            'name' => $service->name,
            'price' => $service->min_price,
            'quantity' => $request->quantity ?? 1,
            'attributes' => ['image' => $service->image],
        ));

        return response()->json(['success' => "Product added in cart successfully"], 200);
    }

    public function checkCoupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => ['required', Rule::exists('coupons', 'name')->where(fn ($q) => $q->whereDate('expiry_date', '>=', Carbon::today()->toDateString() ) )],
        ],
        [
            'coupon.required' => 'Please enter username',
        ]);

        if ($validator->fails())
            return response()->json(['error'=>$validator->errors()], 422);


        try{
            $checkCoupon = Coupon::where('name', $request->coupon)
                                ->whereDate('expiry_date', '>=', Carbon::today()->toDateString())
                                ->first();

            $cartItems = \Cart::getContent();
            $cartServices = Category::whereIn('id', $cartItems->pluck('id'))->sum('min_price');
            $serviceCharge = config('setting_data.IS_SERVICE_CHARGE_ENABLE') ? config('setting_data.SERVICE_CHARGE') : 0;
            $couponDiscount = 0;

            if($cartServices <= $checkCoupon->min_value)
                return response()->json(['error2' => 'Coupon minimum limit is less, add more services to continue with this offer'], 200);

            $couponDiscount = number_format($checkCoupon->discount_value);
            if($checkCoupon->discount_type == 'percent')
                $couponDiscount = ($checkCoupon->discount_value/100) * $cartServices;

            if((($cartServices+$serviceCharge) - $couponDiscount) < ((($cartServices+$serviceCharge)*config('setting_data.MAX_DISCOUNT_PERCENT'))/100 ))
                return response()->json(['error2' => 'Can not apply coupon with hge discount, add more services to continue with this offer'], 200);

            $cartTotal = ($cartServices+$serviceCharge)-$couponDiscount;
            $gstCharge = config('setting_data.IS_GST_ENABLE') ? (($serviceCharge+$cartTotal) * config('setting_data.GST_PERCENTAGE')) / 100 : 0;
            $cartTotal = $cartTotal+$gstCharge;

            return response()->json(['success' => 'Coupon applied successfully', 'couponDiscount' => $couponDiscount, 'cartTotal' => $cartTotal], 200);
        }
        catch(\Exception $e)
        {
            Log::info($e);
            return response()->json(['error2' => 'Something went wrong'], 500);
        }

    }

    public function resetCoupon(Request $request)
    {
        try{

            $cartItems = \Cart::getContent();
            $cartServices = Category::whereIn('id', $cartItems->pluck('id'))->sum('min_price');
            $serviceCharge = config('setting_data.IS_SERVICE_CHARGE_ENABLE') ? config('setting_data.SERVICE_CHARGE') : 0;
            $gstCharge = config('setting_data.IS_GST_ENABLE') ? (($serviceCharge+$cartServices) * config('setting_data.GST_PERCENTAGE')) / 100 : 0;
            $cartTotal = number_format($cartServices+$serviceCharge+$gstCharge);

            return response()->json(['success' => 'Coupon reset successfully', 'cartTotal' => $cartTotal], 200);
        }
        catch(\Exception $e)
        {
            Log::info($e);
            return response()->json(['error2' => 'Something went wrong'], 500);
        }

    }

    public function placeOrder(Request $request)
    {
        $authUser = Auth::user();
        if(!$authUser)
            return response()->json(['redirect' => route('customer.login')]);

        $userRole = $authUser->roles()->first();
        if($userRole->name != 'User')
            return response()->json(['error2'=> 'You are not authorised to book service, please contact support']);

        if(!$request->full_address && !$request->previous_address)
            return response()->json(['error2'=> 'Please type full address or select any previous address to place order']);

        if(!$request->slot)
            return response()->json(['error2'=> 'Please select any time slot for service']);


        try{
            DB::beginTransaction();
            $userAddress = '';
            if(($request->full_address && $request->city && $request->pincode))
                $userAddress = UserAddress::create(['user_id' => $authUser->id, 'full_address' => $request->full_address, 'city' => $request->city, 'pincode' => $request->pincode]);

            if($request->full_address && (!$request->city || !$request->pincode))
                return response()->json(['error2'=> 'City name and Pincode is required.']);


            $cartItems = \Cart::getContent();
            $cartServices = Category::whereIn('id', $cartItems->pluck('id'))->get();
            $serviceCharge = config('setting_data.IS_SERVICE_CHARGE_ENABLE') ? config('setting_data.SERVICE_CHARGE') : 0;
            $scheduleDate = Carbon::now()->format('H') < config('setting_data.SCHEDLE_TODAY_IF_TIME_BEFORE') ? Carbon::now()->toDateString() : Carbon::tomorrow()->toDateString();

            $coupon = $couponDiscount = null;
            if($request->coupon)
                $coupon = Coupon::where('name', $request->coupon)->whereDate('expiry_date', '>=', Carbon::today()->toDateString())->first();

            $couponDiscount = $coupon ? $coupon->discount_value : 0;
            if($coupon && $coupon->discount_type == 'percent')
            {
                $couponDiscount = ($coupon->discount_value/100) * $cartServices->sum('min_price');
            }
            $gstCharge = config('setting_data.IS_GST_ENABLE') ? (($serviceCharge+$cartServices->sum('min_price')) * config('setting_data.GST_PERCENTAGE')) / 100 : 0;

            $order = Order::create([
                'time_slot_id' => $request->slot,
                'user_id' => $authUser->id,
                // 'category_id' => $cartService->category_id,
                // 'sub_category_id' => $cartService->id,
                'user_address_id' => $request->previous_address ? $request->previous_address : $userAddress->id,
                'coupon_id' => $coupon ? $coupon->id : $coupon,
                'order_no' => Order::generateOrderNo(),
                // 'amount' => $cartService->min_price,
                'status' => Order::STATUS_PLACED,
                'service_charge' => $serviceCharge,
                'gst_charge' => $gstCharge,
                'total' => ($cartServices->sum('min_price')+$serviceCharge+$gstCharge)-$couponDiscount,
                'scheduled_on' => $scheduleDate,
                'payment_type' => Order::PAYMENT_TYPE_POSTPAID,
                'payment_method' => Order::PAYMENT_METHOD_CASH,
                'payment_status' => Order::PAYMENT_STATUS_UNPAID,
            ]);

            foreach($cartServices as $cartService)
            {
                OrderItem::create([
                    'order_id' => $order->id,
                    'category_id' => $cartService->category_id,
                    'sub_category_id' => $cartService->id,
                    'amount' => $cartService->min_price
                ]);
            }

            $isAssigned = $this->assignOrder($order, $request->merge(['schedule_date'=> $scheduleDate]), $cartService->category_id);

            \Cart::clear();

            DB::commit();

            if($isAssigned)
                return response()->json(['success'=> 'Order placed successfully']);
            else
                return response()->json(['success'=> 'Order placed successfully, a Service boy will be assigned soon for the service']);
        }
        catch(\Exception $e)
        {
            Log::info($e);
            return response()->json(['error2'=> 'Something went wrong while placing order']);
        }
    }


    protected function assignOrder($order, $request, $categoryId)
    {
        $availableServiceboysOnPincode = ServiceBoyPincode::where('pincode', $request->pincode)->where('is_working', 1)->get();

        $scheduledServiceData = AssignedOrder::query()
                            // ->whereIn('service_boy_user_id', $availableServiceboysOnPincode->pluck('user_id'))
                            ->where('pincode', $request->pincode)
                            ->where('category_id', $categoryId)
                            ->whereDate('scheduled_on', $request->schedule_date)
                            ->get();

        $assigneableServiceBoyId = 0;
        if($scheduledServiceData->isEmpty())
        {
            $assigneableServiceBoyId = $availableServiceboysOnPincode->value('user_id');
        }
        elseif( $availableServiceboysOnPincode->pluck('user_id')->diff($scheduledServiceData->pluck('service_boy_user_id'))->isNotEmpty() )
        {
            $vacantServiceBoyIds = $availableServiceboysOnPincode->pluck('user_id')->diff($scheduledServiceData->pluck('service_boy_user_id'))->values();
            $assigneableServiceBoyId = $vacantServiceBoyIds[0];
        }
        else{
            $filtered = $scheduledServiceData->pluck('service_boy_user_id')->filter(function ($user_id) use ($availableServiceboysOnPincode) {
                return collect($availableServiceboysOnPincode->user_id)->contains($user_id);
            });

            $counts = $filtered->countBy();
            $firstLowestRepeated = $counts->sort()->keys()->first();

            $assigneableServiceBoyId = $firstLowestRepeated;
        }

        if(!$assigneableServiceBoyId)
            return false;

        AssignedOrder::create([
            'service_boy_user_id' => $assigneableServiceBoyId,
            'order_id' => $order->id,
            'time_slot_id' => $request->slot,
            'pincode' => $request->geo_pincode,
            'category_id' => $categoryId,
            'service_date' => $request->schedule_date,
        ]);

        $order->status = Order::STATUS_ASSIGNED;
        $order->save();

        return true;
    }
}
