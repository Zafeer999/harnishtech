<?php

namespace App\Http\Livewire\Customer;

use App\Mail\SendOTP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use PHPUnit\Metadata\Uses;

class ForgotPassword extends Component
{
    public $email, $otp, $password, $confirm_password, $step = 1, $alert = '';
    public $generateOtp;

    public function render()
    {
        return view('livewire.customer.forgot-password');
    }

    public function sendOtp()
    {
        $this->resetErrorBag();
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $this->generateOtp = rand(1111, 9999);;

        $user = User::where('email', $this->email)->first();
        $user->otp = $this->generateOtp;
        $user->save();

        Mail::to($this->email)->send(new SendOTP($this->generateOtp));
        $this->step = 2;
    }

    public function confirmOtp()
    {
        $this->resetErrorBag();
        $this->validate([
            'otp' => 'required|digits:4',
        ]);

        $user = User::where('email', $this->email)->first();

        if($this->otp != $this->generateOtp)
        {
            $this->alert = "Entered OTP is invalid.";
        }
        elseif( Carbon::parse($user->update_at)->lt(Carbon::now()->subMinutes(10)->toDateTimeString()) )
        {
            $this->alert = "Entered OTP is expired.";
        }
        else
        {
            $this->step = 3;
        }
    }

    public function resetPassword()
    {
        $this->resetErrorBag();
        $this->validate([
            'password' => 'required|string|min:8|max:16',
            'confirm_password' => 'required|same:password',
        ]);

        return redirect()->route('customer.login');
    }
}
