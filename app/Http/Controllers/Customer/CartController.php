<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $cartItems = \Cart::getContent();
        $cartTotal = Category::whereIn('id', $cartItems->pluck('id'))->sum('min_price');
        $serviceCharge = env('IS_SERVICE_CHARGE_ENABLE') ? env('SERVICE_CHARGE') : 0;
        $cities = City::get();

        return view('customer.carts')->with(['cartItems' => $cartItems, 'cartTotal' => $cartTotal, 'serviceCharge' => $serviceCharge, 'cities' => $cities]);
    }

    public function store(Request $request)
    {
        $service = Category::find($request->service_id);
        if(!$service)
            return response()->json(['error2' => "Invalid cart item requested"], 500);

        \Cart::add(array(
            'id' => $request->service_id,
            'name' => $service->name,
            'price' => $service->min_price,
            'quantity' => $request->quantity ?? 1,
            'attributes' => ['image' => $service->image],
        ));

        return response()->json(['success' => "Product added in cart successfully"], 200);
    }
}
