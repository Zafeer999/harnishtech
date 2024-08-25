<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $cartItems = \Cart::getContent();

        return view('customer.carts')->with(['cartItems' => $cartItems]);
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
