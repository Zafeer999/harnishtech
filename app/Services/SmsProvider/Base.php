<?php

namespace App\Services\SmsProvider;

use Illuminate\Http\Request;

abstract class Base{

    abstract public function getProviderName();
    abstract public function sendAuthenticatorSms($number, $application);
    abstract public function sendVerificationSms($number, $otp);
}
