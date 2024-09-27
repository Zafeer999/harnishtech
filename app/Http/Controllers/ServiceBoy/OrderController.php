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

        return view('serviceboy.order-pending')->with(['pendingOrders' => $pendingOrders]);
    }

    public function working(Request $request)
    {
        // Fetch pending orders for the s
        $serviceBoy = Auth::user();
        $workingOrders = Order::with(['user','timeSlot','orderItems.category', 'orderItems.subCategory'])->whereIn('status', [Order::STATUS_CONFIRMED, Order::STATUS_PROCESSING])
            ->whereHas('assignedOrders', function ($q) use ($serviceBoy) {
                $q->where('service_boy_user_id', $serviceBoy->id);
            })
            ->get();

        return view('serviceboy.order-working')->with(['workingOrders' => $workingOrders]);
    }

    public function completed(Request $request)
    {
        $serviceBoy = Auth::user();
        $completedOrders = Order::with(['user','timeSlot','orderItems.category', 'orderItems.subCategory'])->where('status', Order::STATUS_COMPLETED)
            ->whereHas('assignedOrders', function ($q) use ($serviceBoy) {
                $q->where('service_boy_user_id', $serviceBoy->id);
            })
            ->get();

        return view('serviceboy.order-completed')->with(['completedOrders' => $completedOrders]);
    }
}
