<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        if(Auth::check())
            return redirect()->route('home');

        return view('customer.auth.signin');
    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Please enter username',
            'password.required' => 'Please enter password',
        ]);

        if ($validator->fails())
            return response()->json(['error'=>$validator->errors()]);

        $username = $request->email;
        $password = $request->password;
        $remember_me = $request->has('remember_me') ? true : false;

        try
        {
            $user = User::where('email', $username)->orWhere('mobile', $username)->first();

            if(!$user)
                return response()->json(['error2'=> 'No user found with this detail']);

            if($user->active_status == '0')
                return response()->json(['error2'=> 'You are not authorized to login, contact support']);

            if(!auth()->attempt(['email' => $username, 'password' => $password], $remember_me))
                return response()->json(['error2'=> 'Your entered credentials are invalid']);

            return response()->json(['success'=> 'login successful', 'user_type'=> $user->roles()->first()->name, 'previous_url' => $request->previous_url ]);
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            Log::info("login error:". $e);

            return response()->json(['error2'=> 'Something went wrong while validating your credentials!']);
        }
    }


    public function showRegister()
    {
        return view('customer.auth.signup');
    }
}
