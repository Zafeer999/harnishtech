<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AssignedOrder;
use App\Models\Category;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\TimeSlot;
use App\Models\UserAddress;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $authUser = Auth::user();

        $cartItems = \Cart::getContent();
        $cartTotal = Category::whereIn('id', $cartItems->pluck('id'))->sum('min_price');
        $serviceCharge = env('IS_SERVICE_CHARGE_ENABLE') ? env('SERVICE_CHARGE') : 0;
        $cities = City::selectRaw('MIN(id) as id, name')->groupBy('name')->get();
        $slots = TimeSlot::get();

        $userAddresses = $authUser ? UserAddress::where('user_id', $authUser->id)->get() : collect([]);

        return view('customer.carts')->with(['cartItems' => $cartItems, 'cartTotal' => $cartTotal, 'serviceCharge' => $serviceCharge, 'cities' => $cities, 'slots' => $slots, 'userAddresses' => $userAddresses]);
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

            if(!$request->slot)
                return response()->json(['error2'=> 'Please select any time slot for the service.']);


            $cartItems = \Cart::getContent();
            $cartServices = Category::whereIn('id', $cartItems->pluck('id'))->get();
            $serviceCharge = env('IS_SERVICE_CHARGE_ENABLE') ? env('SERVICE_CHARGE') : 0;

            foreach($cartServices as $cartService)
            {
                $order = Order::create([
                    'time_slot_id' => $request->slot,
                    'user_id' => $authUser->id,
                    'category_id' => $cartService->category_id,
                    'sub_category_id' => $cartService->id,
                    'user_address_id' => $request->previous_address ? $request->previous_address : $userAddress->id,
                    'coupon_id' => Coupon::where('name', $request->coupon)->first()?->id ?? null,
                    'order_no' => Order::generateOrderNo(),
                    'amount' => $cartService->min_price,
                    'status' => 1,
                    // 'is_assigned' => 1,
                    'service_charge' => $serviceCharge,
                    'total' => $cartService->min_price,
                    'scheduled_on' => Carbon::tomorrow()->toDateString(),
                    'payment_type' => 1,
                    'payment_method' => 0,
                    'payment_status' => 0,
                ]);

                $this->assignOrder($order, $request);
            }

            \Cart::clear();

            DB::commit();

            return response()->json(['success'=> 'Order placed successfully']);
        }
        catch(\Exception $e)
        {
            Log::info($e);
            return response()->json(['error2'=> 'Please type full address or select any previous address to place order']);
        }
    }


    protected function assignOrder($order, $request)
    {
        // $checkServiceBoy = AssignedOrder::where('')->
        AssignedOrder::create([
            'service_boy_user_id' => 3,
            'order_id' => $order->id,
            'time_slot_id' => $request->slot,
            'pincode' => $request->geo_pincode,
        ]);
    }
}
