<?php

namespace App\Http\Controllers\ServiceBoy;

use App\Http\Controllers\Admin\Controller;
use App\Models\AssignedOrder;
use App\Models\Order;
use App\Models\User;
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

        $serviceBoysHtml = '<span>
            <option value="">--Select Pincode--</option>';
        foreach ($serviceBoys as $serviceBoy):
            $is_select = in_array($serviceBoy->id, ) ? "selected" : "";
            $serviceBoysHtml .= '<option value="' . $serviceBoy->id . '" ' . $is_select . '>' . ($serviceBoy->name.' - '.$serviceBoy->pincode) . '</option>';
        endforeach;
        $serviceBoysHtml .= '</span>';

        $response = [
            'result' => 1,
            'order' => $order,
            'serviceBoysHtml' => $serviceBoysHtml,
        ];

        return $response;
    }
}
