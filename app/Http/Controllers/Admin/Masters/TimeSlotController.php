<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StoreTimeSlotRequest;
use App\Http\Requests\Admin\Masters\UpdateTimeSlotRequest;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeslots = TimeSlot::latest()->get();

        return view('admin.masters.timeslots')->with(['timeslots' => $timeslots]);
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
    public function store(StoreTimeSlotRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            TimeSlot::create(Arr::only($input, TimeSlot::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Time slot created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Time slot');
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
    public function edit(TimeSlot $timeslot)
    {
        $timeslot->from_time = Carbon::parse($timeslot->from_time)->format('H:i');
        $timeslot->to_time = Carbon::parse($timeslot->to_time)->format('H:i');
        $timeslot->update();
        return [
            'result' => 1,
            'timeslot' => $timeslot,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimeSlotRequest $request, TimeSlot $timeslot)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $timeslot->update(Arr::only($input, TimeSlot::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Time slot updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Time slot');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeSlot $timeslot)
    {
        try {
            DB::beginTransaction();
            $timeslot->delete();
            DB::commit();
            return response()->json(['success' => 'Time slot deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Time slot');
        }
    }
}
