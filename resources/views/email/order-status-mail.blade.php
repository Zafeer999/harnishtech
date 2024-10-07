<x-mail::message>
# Order Status Update

Hello,

{{ $mailText }}

Thanks,<br>
{{ ucfirst(config('app.name')) }}
</x-mail::message>
