<?php

namespace App\View\Components\Admin;

use App\Models\Clas;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Device;
use App\Models\Holiday;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Order;
use App\Models\Shift;
use App\Models\Ward;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $authUser = Auth::user();
        $userRole = $authUser->roles()->first();

        $unassignedCount = Order::where('status', 0)->count();
        // if($userRole == "Service Boy")
        // {

        // }
        // else
        // {
        // }

        return view('components.Admin.admin-sidebar', [
            'unassignedCount'=> $unassignedCount
        ]);
    }
}
