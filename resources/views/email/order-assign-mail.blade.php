<x-mail::message>
# Order Assigned Successfully

Hello,

{{ $mailText }}

Thanks,<br>
{{ ucfirst(config('app.name')) }}
</x-mail::message>
