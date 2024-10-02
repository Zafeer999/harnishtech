<x-mail::message>
# Send OTP

Hi,

Your OTP code is: **{{ $otp }}**

Please use this code to complete your action. This OTP will expire in 10 minutes.

If you did not request this, please ignore this email.

Thanks,<br>
{{ ucfirst(config('app.name')) }}
</x-mail::message>
