<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::where(['level' => 2])->get();

        return view('customer.services')->with(['categories' => $categories]);
    }

    public function serviceByCategory(Category $category)
    {
        $categories = Category::where(['category_id' => $category->id, 'level' => 2])->get();

        return view('customer.services')->with(['categories' => $categories]);
    }
}
