<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Factories\SmsProviderFactory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Signup extends Component
{

    // Form fields
    public $name;
    public $email;
    public $mobile;
    public $password;
    public $confirm_password;

    // OTP fields
    public $otp;
    public $generatedOtp;
    public $otpSentAt;
    public $otpVerified = false;

    // Step control
    public $step = 1;

    // Validation rules for the form
    protected $rules = [
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:200|unique:users,email',
        'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,mobile',
        'password' => 'required|string|min:8|max:16',
        'confirm_password' => 'required|same:password',
    ];


    // Function to send OTP
    public function sendOtp()
    {
        $this->resetErrorBag();

        // Validate form input
        $this->validate();

        // Generate OTP
        $this->generatedOtp = rand(1111, 9999);
        $this->otpSentAt = now();

        // Send OTP to the mobile number
        $smsProvider = SmsProviderFactory::get('aditya'); // Replace 'aditya' with your provider
        $smsProvider->sendVerificationSms($this->mobile, $this->generatedOtp);

        // Move to the next step (OTP verification)
        $this->step = 2;

        session()->flash('success', 'OTP sent to your mobile number.');
    }

    // Function to verify OTP
    public function verifyOtp()
    {
        $otpExpiryMinutes = 5;
        // Check if OTP is expired
        if (now()->diffInMinutes($this->otpSentAt) > $otpExpiryMinutes) {
            session()->flash('error', 'OTP has expired. Please request a new OTP.');
            return;
        }

        if ($this->otp == $this->generatedOtp) {
            $this->otpVerified = true;

            // Store user data
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->mobile = $this->mobile;
            $user->password = Hash::make($this->password); // Hash the password
            $user->otp = $this->generatedOtp; // Store the OTP for reference
            $user->is_mobile_verified = Carbon::now();
            $user->active_status = 1;

            $user->save();

            // Move to the next step (success)
            $this->step = 3;
            session()->flash('success', 'OTP verified and you are registered successfully.');
        } else {
            session()->flash('error', 'Invalid OTP. Please try again.');
        }
    }

    // Function to resend OTP
    public function resendOtp()
    {
        // Resend OTP only if 30 seconds have passed since last sent
        if (now()->diffInSeconds($this->otpSentAt) < 30) {
            session()->flash('error', 'Please wait before resending OTP.');
            return;
        }

        // Generate a new OTP
        $this->generatedOtp = rand(1111, 9999);
        $this->otpSentAt = now();

        // Resend OTP to the mobile number
        $smsProvider = SmsProviderFactory::get('aditya');
        $smsProvider->sendVerificationSms($this->mobile, $this->generatedOtp);

        session()->flash('success', 'A new OTP has been sent to your mobile number.');
    }




    public function render()
    {
        return view('livewire.customer.signup');
    }
}
