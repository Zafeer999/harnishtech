<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::where('category_id', null)->get();
        $colorsArray = config('default_data.colors_array');

        $featuredServices = Category::with('category')->where(['is_featured' => 1, 'level' => 2])->get();

        return view('customer.home')->with(['categories' => $categories, 'colorsArray' => $colorsArray, 'featuredServices' => $featuredServices]);
    }
}
