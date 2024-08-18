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

        return view('customer.home')->with(['categories' => $categories]);
    }
}
