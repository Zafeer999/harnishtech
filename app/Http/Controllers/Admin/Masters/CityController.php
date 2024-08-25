<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreCityRequest;
use App\Http\Requests\Admin\Masters\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::latest()->get();

        return view('admin.masters.cities')->with(['cities' => $cities]);
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
    public function store(StoreCityRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            City::create(Arr::only($input, City::getFillables()));
            DB::commit();

            return response()->json(['success' => 'City created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'City');
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
    public function edit(City $city)
    {
        return [
            'result' => 1,
            'city' => $city,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $city->update(Arr::only($input, City::getFillables()));
            DB::commit();

            return response()->json(['success' => 'City updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'City');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        try {
            DB::beginTransaction();
            $city->delete();
            DB::commit();
            return response()->json(['success' => 'City deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'City');
        }
    }
}
