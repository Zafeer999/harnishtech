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

        $cartTotal = \Cart::getTotal();
        $serviceCharge = config('setting_data.IS_SERVICE_CHARGE_ENABLE') ? config('setting_data.SERVICE_CHARGE') : 0;

        return view('customer.checkout')->with(['authUser' => $authUser, 'cartItems' => $cartItems, 'cartTotal' => $cartTotal, 'serviceCharge' => $serviceCharge]);
    }
}
