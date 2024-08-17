<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="assets/images/fav.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Home |'.strtoupper(env('APP_NAME')) }}</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('customer/assets/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/assets/css/odometer.css') }}" />
    <script defer src="{{ asset('customer/index.js') }}"></script>
    <link href="{{ asset('customer/style.css') }}" rel="stylesheet">
</head>
@stack('styles')

<body>

    <x-customer.header />


    {{ $slot }}


    <x-customer.footer />
</body>

@stack('scripts')
</html>
