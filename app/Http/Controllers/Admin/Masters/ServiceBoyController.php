<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreServiceBoyRequest;
use App\Models\ServiceBoy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class ServiceBoyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceBoys = User::where('is_service_boy', 1)->with('serviceBoy')->get();

        return view('admin.masters.service_boys')->with(['serviceBoys' => $serviceBoys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceBoyRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            // Create a new user in the users table
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'mobile' => $input['mobile'],
                'password' => Hash::make($input['password']), // Hash the password
                'is_service_boy' => 1,
            ]);
            // Create a new service boy in the service_boys table
            ServiceBoy::create([
                'user_id' => $user->id, // Link to the newly created user
                'emp_code' => $input['emp_code'],
                'gender' => $input['gender'],
                'dob' => $input['dob'],
                'doj' => $input['doj'],
                'address' => $input['address'],
                'status' => 1,
            ]);
            $role = Role::where('name', 'Service Boy')->first();
            $user->assignRole($role->name);

            DB::commit();

            return response()->json(['success' => 'Service boy created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Service boy');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
