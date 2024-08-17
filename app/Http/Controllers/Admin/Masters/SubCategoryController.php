<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StoreSubCategoryRequest;
use App\Http\Requests\Admin\Masters\UpdateSubCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereCategoryId(null)->latest()->get();
        $subcategories = Category::with('category')->where('level', 2)->get();
        // dd($subcategories);

        return view('admin.masters.subcategories')->with(['subcategories' => $subcategories, 'categories' => $categories]);
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
    public function store(StoreSubCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['description'] = $this->cleanInput($input['description']);
            $input['image'] = 'storage/' . $input['image']->store('subcategory', 'public');
            $input['level'] = 2;

            Category::create(Arr::only($input, Category::getFillables()));
            DB::commit();

            return response()->json(['success' => 'SubCategory created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'SubCategory');
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
    public function edit(Category $subcategory)
    {
        $categories =  Category::where('level', 1)->get();
        // dd($subcategory);
        $categoryHtml = '<select class="form-select" name="category_id" id="category_id">
                            <option value="">Select a category</option>';
        foreach ($categories as $category) {
            $isSelected = $category->id == $subcategory->category_id ? 'selected' : '';
            $categoryHtml .= '<option  ' . $isSelected . ' class="dropdown-item" value=" ' . $category->id . ' "> ' . $category->name . '</option>';
        }
        $categoryHtml .= '</select>';

        $subcategoryImgHtml = '<div class="card p-0 m-0">
            <div class="card-body p-0 m-0">
                <img src="' . asset($subcategory->image) . '" class="img-fluid" alt="category_image">
            </div>
        </div>';

        $subcategory->description = htmlspecialchars_decode($subcategory->description);
        return [
            'result' => 1,
            'categoryHtml' => $categoryHtml,
            'subcategory' => $subcategory,
            'subcategoryImgHtml' => $subcategoryImgHtml,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, Category $subcategory)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['description'] = $this->cleanInput($input['edit_description']);
            if (isset($input['image'])) {
                $input['image'] = 'storage/' . $input['image']->store('subcategory', 'public');
                if (File::exists(public_path('\\') . $subcategory->image)) {
                    File::delete(public_path('\\') . $subcategory->image);
                }
            } else {
                $input['image'] = $subcategory->image;
            }

            $subcategory->update(Arr::only($input, Category::getFillables()));
            DB::commit();

            return response()->json(['success' => 'SubCategory updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'SubCategory');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $subcategory)
    {
        try {
            DB::beginTransaction();
            if (File::exists(public_path('\\') . $subcategory->image)) {
                File::delete(public_path('\\') . $subcategory->image);
            }
            $subcategory->delete();
            DB::commit();
            return response()->json(['success' => 'Category deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Category');
        }
    }

    private function cleanInput($text)
    {
        $text = trim($text);
        $text = htmlspecialchars($text);
        return $text;
    }
}
