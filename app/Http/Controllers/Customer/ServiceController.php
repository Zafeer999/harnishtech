<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{


    public function serviceByCategory(Category $category)
    {
        $categories = Category::where(['category_id' => $category->id, 'level' => 2])->get();

        return view('admin.services-list')->with(['categories' => $categories]);
    }
}
