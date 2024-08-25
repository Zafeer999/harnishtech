<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Evara - eCommerce HTML Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('customer/assets/imgs/theme/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/main.css?v=3.4') }}">
    <link rel="manifest" href="https://progressier.app/cTQ3i8bfuV2Pq1pyXZWw/progressier.json"/>
    <script defer src="https://progressier.app/cTQ3i8bfuV2Pq1pyXZWw/script.js"></script>
</head>

<body>

    <x-customer.header />

        <main class="main">
            {{ $slot }}
        </main>

    <x-customer.footer />
</body>

</html>
