<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }} | {{ $title ?? "On demand services for Plumber, Electrician, technician, AC repair, etc." }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="On demand services for Plumber, Electrician, technician, AC repair, etc.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ $title ?? "On demand services for Plumber, Electrician, technician, AC repair, etc." }}">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="{{ asset('customer/assets/imgs/theme/favicon.svg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('customer/assets/imgs/theme/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/css/main.css?v=3.4') }}">
    {{-- <link rel="manifest" href="https://progressier.app/cTQ3i8bfuV2Pq1pyXZWw/progressier.json" /> --}}
    {{-- <script defer src="https://progressier.app/cTQ3i8bfuV2Pq1pyXZWw/script.js"></script> --}}
</head>
@stack('styles')
@livewireStyles()

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/66dc7681ea492f34bc0f0a00/1i76itr4a';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<style>
    .widget-visible iframe{
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
    $('body').on('click', '.addToCart', function(e) {
        e.preventDefault();

        $(".addToCart").prop('disabled', true);
        let serviceId = $(this).attr('data-cart-id');
        let url = "{{ route('carts.store') }}";
        Livewire.emitTo('customer.header-cart', 'cartdata', {
            'service_id': serviceId
        });
        $(".addToCart").prop('disabled', false);
        Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Service added in cart',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        // $.ajax({
        //     url: url,
        //     type: 'POST',
        //     data: {
        //         '_token': "{{ csrf_token() }}",
        //         'service_id': serviceId,
        //     },
        //     success: function(data)
        //     {
        //         $(".addToCart").prop('disabled', false);
        //         if (!data.error2)
        //             Livewire.emitTo('customer.header-cart', 'cartdata', {'service_id': serviceId});
        //         else
        //             swal("Error!", data.error2, "error");
        //     },
        //     statusCode: {
        //         422: function(responseObject, textStatus, jqXHR) {
        //             $(".addToCart").prop('disabled', false);
        //         },
        //         500: function(responseObject, textStatus, errorThrown) {
        //             $(".addToCart").prop('disabled', false);
        //             swal("Error occured!", "Something went wrong please try again", "error");
        //         }
        //     }
        // });
    })
</script>

</html>
