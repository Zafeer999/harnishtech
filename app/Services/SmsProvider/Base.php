<?php

namespace App\Services\SmsProvider;

use Illuminate\Http\Request;

abstract class Base{

    abstract public function getProviderName();
    abstract public function sendAuthenticatorSms($number, $application);
    abstract public function sendVerificationSms($number, $otp);
    abstract public function sendFormSubmissionSms($number, $application_no, $standard_name);
    abstract public function sendScrutinyApproveSms($number, $application_no);
    abstract public function sendScrutinyRejectSms($number, $application_no);
    abstract public function sendLotterySelectionSms($number, $application);
    abstract public function sendLotteryWaitingSms($number, $application);
}
