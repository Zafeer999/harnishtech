<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreCouponRequest;
use App\Http\Requests\Admin\Masters\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('admin.masters.coupons')->with(['coupons' => $coupons]);
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
    public function store(StoreCouponRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            Coupon::create(Arr::only($input, Coupon::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Coupon created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Category');
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
    public function edit(Coupon $coupon)
    {
        $discountTypes = Coupon::getDiscountTypes();

        $couponHtml = '<select class="form-select" name="discount_type" id="discount_type">
                            <option value="">Select a discount type</option>';
        foreach ($discountTypes as $discountType) {
            $isSelected = $coupon->discount_type == $discountType ? 'selected' : '';
            $couponHtml .= '<option  ' . $isSelected . ' class="dropdown-item" value=" ' . $discountType . ' "> ' .  ucfirst($discountType) . '</option>';
        }
        $couponHtml .= '</select>';
        return [
            'result' => 1,
            'couponHtml' => $couponHtml,
            'coupon' => $coupon,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $coupon->update(Arr::only($input, Coupon::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Coupon updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Coupon');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        try {
            DB::beginTransaction();
            $coupon->delete();
            DB::commit();
            return response()->json(['success' => 'Coupon deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Coupon');
        }
    }
}
