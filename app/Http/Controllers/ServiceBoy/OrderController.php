<?php

namespace App\Http\Controllers\ServiceBoy;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StoreOrderPhotoRequest;
use App\Models\AssignedOrder;
use App\Models\Order;
use App\Models\OrderImage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function unassigned()
    {
        $user = Auth::user();

        $unassignedOrders = Order::query()
                                ->with(['user', 'timeSlot', 'orderItems.category', 'orderItems.subCategory'])
                                ->where('status', Order::STATUS_PLACED)
                                ->get();

        return view('serviceboy.order-unassigned')->with(['unassignedOrders' => $unassignedOrders]);
    }

    public function claimUnassigned(Order $order, Request $request)
    {
        try
        {
            DB::beginTransaction();

            $order->load(['userAddress', 'orderItems']);
            AssignedOrder::create([
                'service_boy_user_id' => auth()->user()->id,
                'order_id' => $order->id,
                'time_slot_id' => $order->time_slot_id,
                'pincode' => $order->userAddress->pincode,
                'category_id' => $order->orderItems[0]?->category_id,
                'scheduled_on' => $order->scheduled_on,
            ]);
            $order->status = Order::STATUS_ASSIGNED;
            $order->is_assigned = Order::IS_ASSIGNED;
            $order->save();

            DB::commit();

            return response()->json(['success' => 'Order claimed successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'claiming', 'Order');
        }
    }

    public function pending(Request $request)
    {
        $user = Auth::user();
        $userRole = $user->roles()->first();

        $pendingOrders = Order::with(['user','timeSlot','orderItems.category', 'orderItems.subCategory'])
                                ->whereIn('status', [Order::STATUS_ASSIGNED, Order::STATUS_PLACED])
                                ->when($userRole->name != 'Admin', function($q) use ($user){
                                    $q->whereRelation('assignedOrders', 'service_boy_user_id', $user->id);
                                })
                                ->get();

        return view('serviceboy.order-pending')->with(['pendingOrders' => $pendingOrders]);
    }

    public function working(Request $request)
    {
        $user = Auth::user();
        $userRole = $user->roles()->first();

        $workingOrders = Order::with(['user','timeSlot','orderItems.category', 'orderItems.subCategory'])
                                ->whereIn('status', [Order::STATUS_CONFIRMED, Order::STATUS_PROCESSING])
                                ->when($userRole->name != 'Admin', function($q) use ($user){
                                    $q->whereRelation('assignedOrders', 'service_boy_user_id', $user->id);
                                })
                                ->get();

        return view('serviceboy.order-working')->with(['workingOrders' => $workingOrders]);
    }

    public function completed(Request $request)
    {
        $user = Auth::user();
        $userRole = $user->roles()->first();

        $completedOrders = Order::with(['user','timeSlot','orderItems.category', 'orderItems.subCategory'])
                                ->where('status', Order::STATUS_COMPLETED)
                                ->when($userRole->name != 'Admin', function($q) use ($user){
                                    $q->whereRelation('assignedOrders', 'service_boy_user_id', $user->id);
                                })
                                ->get();

        return view('serviceboy.order-completed')->with(['completedOrders' => $completedOrders]);
    }

    public function orderGetServiceBoys(Order $order, Request $request)
    {
        $serviceBoys = User::where('is_service_boy', 1)->get();

        $assignedServiceBoy = AssignedOrder::where('order_id', $order->id)->first();

        $serviceBoysHtml = '<span>
            <option value="">--Select Service Boy--</option>';
        foreach ($serviceBoys as $serviceBoy):
            $is_select = $serviceBoy->id == $assignedServiceBoy->service_boy_user_id ? "selected" : "";
            $serviceBoysHtml .= '<option value="' . $serviceBoy->id . '" ' . $is_select . '>'.$serviceBoy->name.'</option>';
        endforeach;
        $serviceBoysHtml .= '</span>';

        $response = [
            'result' => 1,
            'order' => $order,
            'serviceBoysHtml' => $serviceBoysHtml,
        ];

        return $response;
    }


    public function assignOrder(Request $request, Order $order)
    {
        try {

            DB::beginTransaction();

            AssignedOrder::query()
                        ->where(['order_id' => $order->id])
                        ->update(['service_boy_user_id' => $request->service_boy]);

            $order->status = Order::STATUS_ASSIGNED;
            $order->is_assigned = Order::IS_ASSIGNED;
            $order->save();

            DB::commit();

            return response()->json(['success' => 'Order assigned successfully']);
        }
        catch (\Exception $e) {
            return $this->respondWithAjax($e, 'assigning', 'order to service boy');
        }
    }

    public function markConfirmProcessing(Order $order, Request $request)
    {
        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => 'Order status updated successfully!']);
    }


    public function orderUploadPhoto(StoreOrderPhotoRequest $request, Order $order)
    {
        try
        {
            DB::beginTransaction();

            foreach($request->photos as $photo)
            {
                $path = 'storage/' . $photo->store('order', 'public');

                OrderImage::create([
                    'order_id' => $order->id,
                    'image' => $path,
                ]);
            }

            $order->status = Order::STATUS_COMPLETED;
            $order->total = $order->total+$request->charges;
            $order->charges = $request->charges;
            $order->serviced_on = Carbon::now()->toDateString();
            $order->payment_status = 1;
            $order->save();

            DB::commit();

            return response()->json(['success' => 'Order completed successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'completing', 'Order');
        }
    }
}
