<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreCategoryRequest;
use App\Http\Requests\Admin\Masters\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereCategoryId(null)->latest()->get();

        return view('admin.masters.categories')->with(['categories' => $categories]);
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
    public function store(StoreCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['description'] = $this->cleanInput($input['description']);
            $input['image'] = 'storage/' . $input['image']->store('category', 'public');
            $input['level'] = 1;

            Category::create(Arr::only($input, Category::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Category created successfully!']);
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
    public function edit(Category $category)
    {
        $categoryImgHtml = '<div class="card p-0 m-0">
                                <div class="card-body p-0 m-0">
                                    <img src="' . asset($category->image) . '" class="img-fluid" alt="category_image">
                                </div>
                            </div>';

        $category->description = htmlspecialchars_decode($category->description);
        return [
            'result' => 1,
            'category' => $category,
            'categoryImgHtml' => $categoryImgHtml,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['description'] = $this->cleanInput($input['edit_description']);
            if (isset($input['image'])) {
                $input['image'] = 'storage/' . $input['image']->store('category', 'public');
                if (File::exists(public_path('\\') . $category->image)) {
                    File::delete(public_path('\\') . $category->image);
                }
            } else {
                $input['image'] = $category->image;
            }

            $category->update(Arr::only($input, Category::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Category updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();
            if (File::exists(public_path('\\') . $category->image)) {
                File::delete(public_path('\\') . $category->image);
            }
            $category->delete();
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
