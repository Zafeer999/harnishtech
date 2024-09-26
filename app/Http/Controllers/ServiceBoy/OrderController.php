<?php

namespace App\Http\Controllers\ServiceBoy;

use App\Http\Controllers\Admin\Controller;
use App\Models\AssignedOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function pending(Request $request)
    {
        // Fetch pending orders for the s
        $serviceBoy = Auth::user();
        $pendingOrders = Order::with(['user','timeSlot','orderItems.category', 'orderItems.subCategory'])->whereIn('status', [Order::STATUS_ASSIGNED, Order::STATUS_CONFIRMED])
            ->whereHas('assignedOrders', function ($q) use ($serviceBoy) {
                $q->where('service_boy_user_id', $serviceBoy->id);
            })
            ->get();
        Log::info('$pendingOrders', [$pendingOrders]);
        return view('serviceboy.order-pending')->with(['pendingOrders' => $pendingOrders]);
    }

    public function completed(Request $request)
    {
        $serviceBoy = auth()->user();
        // $order = Order::with(['orderItems.subCategory', 'orderItems.category', 'user.userAddress'])->where('')
        $completedOrders = AssignedOrder::with(['order'])->where('service_boy_user_id', $serviceBoy->id)->get();
        Log::info('pendingOrders', [$completedOrders]);

        return view('serviceboy.order-completed')->with(['orders' => $completedOrders]);
    }
}
