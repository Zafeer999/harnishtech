<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::get();
        $colorsArray = config('default_data.colors_array');
        $allServices = $categories;
        $categories = $categories->where('category_id', null);
        $featuredServices = Category::with('category')->where(['is_featured' => 1, 'level' => 2])->get();
        $cities = City::get();

        return view('customer.home')->with(['categories' => $categories, 'allServices' => $allServices, 'colorsArray' => $colorsArray, 'featuredServices' => $featuredServices, 'cities' => $cities]);
    }
}
