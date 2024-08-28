<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index(Request $request)
    {
        $authUser = Auth::user();
        $cartItems = \Cart::getContent();

        if($cartItems->isEmpty())
            return redirect()->back();

        return view('customer.checkout')->with(['authUser' => $authUser]);
    }
}
