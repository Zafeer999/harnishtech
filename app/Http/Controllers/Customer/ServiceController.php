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
        $colorsArray = config('default_data.colors_array');

        return view('customer.services')->with(['services' => $services, 'categories' => $categories, 'colorsArray' => $colorsArray]);
    }

    public function show(Request $request, Category $service)
    {
        $service->load('category')->loadCount('reviews');
        $serviceCharge = env('IS_SERVICE_CHARGE_ENABLE') ? env('SERVICE_CHARGE') : 0;

        return view('customer.service')->with(['service' => $service, 'serviceCharge' => $serviceCharge]);
    }

    public function serviceByCategory(Category $category)
    {
        $selectedCategory = $category;
        $categories = Category::where('category_id', null)->get();
        $services = $category->services()->get();
        $colorsArray = config('default_data.colors_array');


        return view('customer.services')->with(['services' => $services, 'categories' => $categories, 'selectedCategory' => $selectedCategory, 'colorsArray' => $colorsArray]);
    }
}
