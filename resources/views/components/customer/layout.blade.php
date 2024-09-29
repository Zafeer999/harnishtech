<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }} | {{ $title ?? 'On demand services for Plumber, Electrician, technician, AC repair, etc.' }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="On demand services for Plumber, Electrician, technician, AC repair, etc.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ $title ?? 'On demand services for Plumber, Electrician, technician, AC repair, etc.' }}">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta name="google" content="notranslate">
    <meta property="og:image" content="{{ config('setting_data.HEADER_LOGO') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ config('setting_data.HEADER_LOGO') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/rating.css') }}">
    {{-- <link rel="manifest" href="https://progressier.app/cTQ3i8bfuV2Pq1pyXZWw/progressier.json" /> --}}
    {{-- <script defer src="https://progressier.app/cTQ3i8bfuV2Pq1pyXZWw/script.js"></script> --}}
</head>
@stack('styles')
@livewireStyles()

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/66dc7681ea492f34bc0f0a00/1i76itr4a';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
<style>
    .widget-visible iframe {
        left: 20px !important;
        right: auto !important;
    }
</style>
<!--End of Tawk.to Script-->

<body>

    <x-customer.header />

    <main class="main">
        {{ $slot }}
    </main>

    <x-customer.footer />

</body>
@livewireScripts()

@stack('scripts')
{{-- Handle Add To Cart Click --}}
<script>
    // Livewire Sweetalert browserevent
    window.addEventListener('swal:modal', event => {
        Swal.fire({
            toast: true,
            icon: event.detail.type,
            title: event.detail.text,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    });

    $('body').on('click', '.addToCart', function(e) {
        e.preventDefault();

        $(".addToCart").prop('disabled', true);
        let serviceId = $(this).attr('data-cart-id');
        Livewire.emitTo('customer.header-cart', 'cartdata', {
            'service_id': serviceId
        });
        $(".addToCart").prop('disabled', false);
    })


    // Clear individual cart item
    $('body').on('click', '.removeFromCart', function(e) {
        e.preventDefault();

        $(".removeFromCart").prop('disabled', true);
        let serviceId = $(this).attr('data-cart-remove-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to remove this cart item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('customer.header-cart', 'removeCartData', {
                    'service_id': serviceId
                });
                $(".removeFromCart").prop('disabled', false);

                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: 'Service removed from your cart',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });

    });


    // Clear all cart
    $('body').on('click', '.clearAllCart', function(e) {
        e.preventDefault();
        $(".clearAllCart").prop('disabled', true);


        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to remove all items from your cart?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('customer.header-cart', 'removeCartData');
                $(".clearAllCart").prop('disabled', false);

                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: 'All items from yor cart is removed',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });

    });

</script>

</html>
