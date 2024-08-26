<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreBannerSliderRequest;
use App\Http\Requests\Admin\Masters\UpdateBannerSliderRequest;
use App\Models\BannerSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BannerSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannerSliders = BannerSlider::latest()->get();
        $colorsArray = config('default_data.colors_array');

        return view('admin.masters.banner_sliders')->with(['bannerSliders' => $bannerSliders, 'colorsArray' => $colorsArray]);
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
    public function store(StoreBannerSliderRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['image'] = 'storage/' . $input['image']->store('banner_slider', 'public');

            BannerSlider::create(Arr::only($input, BannerSlider::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Banner slider created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Banner slider');
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
    public function edit(BannerSlider $bannerSlider)
    {
        $colorsArray = config('default_data.colors_array');
        $textColorHTML = '<select class="form-select" name="text_color">
        <option value="">Select text color</option>';

        foreach ($colorsArray as $key => $color) {
            $isSelected = $color == $bannerSlider->text_color ? 'selected' : '';
            $textColorHTML .= '<option class="dropdown-item" value="' . $color . '" ' . $isSelected . '>' . $color . '</option>';
        }
        $textColorHTML .= '</select>';

        $bannerImgHtml = '<div class="card p-0 m-0">
                                <div class="card-body p-0 pt-3 m-0">
                                    <img src="' . asset($bannerSlider->image) . '" class="img-fluid" alt="bannerslider_img">
                                </div>
                            </div>';
        return [
            'result' => 1,
            'bannerSlider' => $bannerSlider,
            'bannerImgHtml' => $bannerImgHtml,
            'textColorHTML' => $textColorHTML
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerSliderRequest $request, BannerSlider $bannerSlider)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            if (isset($input['image'])) {
                $input['image'] = 'storage/' . $input['image']->store('banner_slider', 'public');
                if (File::exists(public_path('\\') . $bannerSlider->image)) {
                    File::delete(public_path('\\') . $bannerSlider->image);
                }
            } else {
                $input['image'] = $bannerSlider->image;
            }

            $bannerSlider->update(Arr::only($input, BannerSlider::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Banner slider updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Banner slider');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BannerSlider $bannerSlider)
    {
        try {
            DB::beginTransaction();
            if (File::exists(public_path('\\') . $bannerSlider->image)) {
                File::delete(public_path('\\') . $bannerSlider->image);
            }
            $bannerSlider->delete();
            DB::commit();
            return response()->json(['success' => 'Banner slider successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Banner slider');
        }
    }
}
