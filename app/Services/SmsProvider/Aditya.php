<?php

namespace App\Services\SmsProvider;

use App\Models\SendNotificationCronjob;
use App\Models\SmsCounter;
use App\Services\SmsProvider\Base;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Aditya extends Base
{
    public $isSmsEnabled;
    public $testNumbers;
    public $key;
    public $senderId;
    public $route;
    public $baseUrl;
    public $smsModule;

    public function __construct()
    {
        $this->isSmsEnabled = config('services.sms.enabled');
        $this->testNumbers = config('services.sms.test_numbers');
        $this->key = config('services.sms.aditya_sms.key');
        $this->senderId = config('services.sms.aditya_sms.senderid');
        $this->route = config('services.sms.aditya_sms.route');
        $this->baseUrl = 'http://sms.adityahost.com/vb/apikey.php';
    }

    public function getProviderName()
    {
        return 'aditya';
    }

    public function sendAuthenticatorSms($number, $otp)
    {
        $organisationName = 'Harnish Technical Services';
        $content = 'Welcome to '.$organisationName.'. Your Current OTP Is '.$otp.' CORE OCEAN.';

        return $this->sendSms($number, $content);
    }

    public function sendVerificationSms($number, $otp)
    {
        $organisationName = 'Harnish Technical Services';
        $content = 'Welcome to '.$organisationName.'. Your Current OTP Is '.$otp.' CORE OCEAN.';

        return $this->sendSms($number, $content);
    }

    public function sendCustomerOrderSms($number, $orderNo, $statusText, $schedule = false)
    {
        $otp = "Generated For This Service";
        $organisationName = 'HTS';
        $orderString = 'your order #'.$orderNo.' is '.$statusText.' successfully';
        $content = 'Welcome to '.$organisationName.', '.$orderString.'. Your Current OTP Is '.$otp.' CORE OCEAN.';

        if($schedule)
            $this->smsModule = 'place_order';

        return $this->sendSms($number, $content, $schedule);
    }

    public function sendServiceBoyOrderSms($number, $orderNo, $statusText, $schedule = false)
    {
        $otp = "Generated For This Service";
        $organisationName = 'HTS';
        $orderString = ', order #'.$orderNo.' is '.$statusText;
        $content = 'Welcome to '.$organisationName.' '.$orderString.'. Your Current OTP Is '.$otp.' CORE OCEAN.';

        if($schedule)
            $this->smsModule = 'assign_order';

        return $this->sendSms($number, $content, $schedule);
    }






    public function sendSms($number, $content, $schedule = false)
    {
        // if( in_array($number, config('services.sms.test_numbers')) || env('APP_ENV') == 'local' )
        //     return true;

        try
        {
            if($schedule)
            {
                SendNotificationCronjob::create([
                    'type' => 1,
                    'target' => $number,
                    'content' => $content,
                    'method' => $this->smsModule,
                    'is_send' => 0,
                ]);
            }
            else
            {
                $response = Http::get($this->baseUrl,[
                    'apikey' => $this->key,
                    'senderid' => $this->senderId,
                    'number' => $number,
                    'message' => $content,
                ]);

                SmsCounter::create(['mobile' => $number, 'text' => $content]);
                return $response;
            }
        }
        catch(Exception $e)
        {
            Log::info($e);
            return true;
        }

    }
}
