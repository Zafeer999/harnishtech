<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StoreCtaSectionRequest;
use App\Http\Requests\Admin\Masters\UpdateCtaSectionRequest;
use App\Models\CtaSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CtaSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ctaSections = CtaSection::latest()->get();
        $colorsArray = config('default_data.colors_array');

        return view('admin.masters.cta_sections')->with(['ctaSections' => $ctaSections, 'colorsArray' => $colorsArray]);
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
    public function store(StoreCtaSectionRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['image'] = 'storage/' . $input['image']->store('cta_section', 'public');

            CtaSection::create(Arr::only($input, CtaSection::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Cta section created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Cta section');
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
    public function edit(CtaSection $ctaSection)
    {
        $crtImgHtml = '<div class="card p-0 m-0">
                                <div class="card-body p-0 pt-3 m-0">
                                    <img src="' . asset($ctaSection->image) . '" class="img-fluid" alt="bannerslider_img">
                                </div>
                            </div>';
        return [
            'result' => 1,
            'ctaSection' => $ctaSection,
            'crtImgHtml' => $crtImgHtml,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCtaSectionRequest $request, CtaSection $ctaSection)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            if (isset($input['image'])) {
                $input['image'] = 'storage/' . $input['image']->store('cta_section', 'public');
                if (File::exists(public_path('\\') . $ctaSection->image)) {
                    File::delete(public_path('\\') . $ctaSection->image);
                }
            } else {
                $input['image'] = $ctaSection->image;
            }

            $ctaSection->update(Arr::only($input, CtaSection::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Cta section updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Cta section');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CtaSection $ctaSection)
    {
        try {
            DB::beginTransaction();
            if (File::exists(public_path('\\') . $ctaSection->image)) {
                File::delete(public_path('\\') . $ctaSection->image);
            }
            $ctaSection->delete();
            DB::commit();
            return response()->json(['success' => 'Ctr section successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Ctr section');
        }
    }
}
