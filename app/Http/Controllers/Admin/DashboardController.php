<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Holiday;
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
        $is_admin = $authUser->hasRole(['Admin', 'Super Admin']) ? true : false;

        $totalEmployees = User::count();


        return view('admin.dashboard.index')->with([
            'is_admin' => $is_admin,
            'totalEmployees' => $totalEmployees,
        ]);
    }
}
