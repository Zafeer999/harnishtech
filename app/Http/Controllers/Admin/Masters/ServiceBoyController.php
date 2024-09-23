<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreServiceBoyRequest;
use App\Models\Category;
use App\Models\City;
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
    public function show(User $service_boy)
    {
        $service_boy->load('services');

        $services = Category::whereNotNull('category_id')->get();
        $servicesHtml = '<span>
            <option value="">--Select Service--</option>';
        foreach ($services as $service):
            $is_select = in_array($service->id, $service_boy->services->pluck('id')->toArray()) ? "selected" : "";
            $servicesHtml .= '<option value="' . $service->id . '" ' . $is_select . '>' . $service->name . '</option>';
        endforeach;
        $servicesHtml .= '</span>';

        $response = [
            'result' => 1,
            'user' => $service_boy,
            'servicesHtml' => $servicesHtml,
        ];

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $service_boy)
    {
        $service_boy->load('pincodes');

        $pincodes = City::get();
        $pincodesHtml = '<span>
            <option value="">--Select Pincode--</option>';
        foreach ($pincodes as $pincode):
            $is_select = in_array($pincode->id, $service_boy->pincodes->pluck('id')->toArray()) ? "selected" : "";
            $pincodesHtml .= '<option value="' . $pincode->id . '" ' . $is_select . '>' . ($pincode->name.' - '.$pincode->pincode) . '</option>';
        endforeach;
        $pincodesHtml .= '</span>';

        $response = [
            'result' => 1,
            'user' => $service_boy,
            'pincodesHtml' => $pincodesHtml,
        ];

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $service_boy)
    {
        try {
            DB::beginTransaction();
            $serviceBoy = $service_boy->serviceBoy()->first();

            DB::table('service_boy_categories')->where('user_id', $service_boy->id)->delete();
            $categories = Category::whereIn('id', $request->services)->get();

            foreach($categories as $service)
            {
                DB::table('service_boy_categories')
                    ->insert([
                        'user_id' => $service_boy->id,
                        'service_boy_id' => $serviceBoy->id,
                        'category_id' => $service->category_id,
                        'sub_category_id' => $service->id
                    ]);
            }
            DB::commit();

            return response()->json(['success' => 'Service assigned successfully']);
        }
        catch (\Exception $e) {
            return $this->respondWithAjax($e, 'assigning', 'services to service boy');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatePincodes(Request $request, User $service_boy)
    {
        try {
            DB::beginTransaction();

            DB::table('service_boy_pincodes')->where('user_id', $service_boy->id)->delete();
            $pincodes = City::whereIn('id', $request->pincodes)->get();

            foreach($pincodes as $pincode)
            {
                DB::table('service_boy_pincodes')
                    ->insert([
                        'user_id' => $service_boy->id,
                        'city_name' => $pincode->name,
                        'pincode' => $pincode->pincode,
                        'is_working' => 0,
                    ]);
            }
            DB::commit();

            return response()->json(['success' => 'Pincodes assigned successfully']);
        }
        catch (\Exception $e) {
            return $this->respondWithAjax($e, 'assigning', 'pincodes to service boy');
        }
    }
}
