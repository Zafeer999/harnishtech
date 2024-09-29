<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Holiday;
use App\Models\Order;
use App\Models\Punch;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ward;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $authUser = auth()->user();
        $unassignedCount = Order::query()
            ->where('status', Order::STATUS_PLACED)
            ->count();

        $is_admin = $authUser->hasRole(['Admin', 'Super Admin']) ? true : false;

        if ($is_admin) {
            $totalEmployees = User::where('is_service_boy', '1')->count();
            $allCount = Order::count();
            $pendingCount = Order::whereIn('status', [Order::STATUS_ASSIGNED, Order::STATUS_CONFIRMED])->count();
            $workingCount = Order::where('status', Order::STATUS_PROCESSING)->count();
            $completedCount = Order::where('status', Order::STATUS_COMPLETED)->count();
            $cancelledCount = Order::where('status', Order::STATUS_CANCELLED)->count();

            return view('admin.dashboard.index')->with([
                'is_admin' => $is_admin,
                'totalEmployees' => $totalEmployees,
                'totalCount' => $allCount,
                'totalUnassignedCount' => $unassignedCount,
                'totalPendingCount' => $pendingCount,
                'totalWorkingCount' => $workingCount,
                'totalCompletedCount' => $completedCount,
                'totalCancelledCount' => $cancelledCount,
            ]);
        }



        // SERVICE BOY DASHBOARD

        $userRole = $authUser->roles()->first();

        $allCount = Order::query()
            ->with('user')
            ->whereRelation('assignedOrders', 'service_boy_user_id', $authUser->id)
            ->count();

        $pendingCount = Order::with('user')
            ->whereIn('status', [Order::STATUS_ASSIGNED, Order::STATUS_CONFIRMED])
            ->when($userRole->name != 'Admin', function ($q) use ($authUser) {
                $q->whereRelation('assignedOrders', 'service_boy_user_id', $authUser->id);
            })
            ->count();

        $workingCount = Order::with('user')
            ->where('status', Order::STATUS_PROCESSING)
            ->when($userRole->name != 'Admin', function ($q) use ($authUser) {
                $q->whereRelation('assignedOrders', 'service_boy_user_id', $authUser->id);
            })
            ->count();
        $completedCount = Order::with('user')
            ->where('status', Order::STATUS_COMPLETED)
            ->when($userRole->name != 'Admin', function ($q) use ($authUser) {
                $q->whereRelation('assignedOrders', 'service_boy_user_id', $authUser->id);
            })
            ->count();

        $cancelledCount = Order::with('user')
            ->where('status', Order::STATUS_CANCELLED)
            ->when($userRole->name != 'Admin', function ($q) use ($authUser) {
                $q->whereRelation('assignedOrders', 'service_boy_user_id', $authUser->id);
            })
            ->count();

        return view('serviceboy.index')->with([
            'is_admin' => $is_admin,
            'totalUnassignedCount' => $unassignedCount,
            'totalAllCount' => $allCount,
            'totalPendingCount' => $pendingCount,
            'totalWorkingCount' => $workingCount,
            'totalCompletedCount' => $completedCount,
            'totalCancelledCount' => $cancelledCount,
        ]);
    }
}
