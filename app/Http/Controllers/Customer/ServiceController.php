<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::where('category_id', null)->get();
        $services = Category::where('level', 2)->get();

        return view('customer.services')->with(['services' => $services, 'categories' => $categories]);
    }

    public function serviceByCategory(Category $category)
    {
        $selectedCategory = $category;
        $categories = Category::where('category_id', null)->get();
        $services = $category->services()->get();


        return view('customer.services')->with(['services' => $services, 'categories' => $categories, 'selectedCategory' => $selectedCategory]);
    }
}
