<div>
    <footer class="main">
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="{{ asset('customer/assets/imgs/theme/logo.png') }}" style="filter: invert(1);" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>Near TDCC bank At,post - kudus, tal - wada, dist - Palghar
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>(+91) 9096969667 /(+91) 7875000141
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Hours: </strong>10:00 - 18:00, Mon - Sat
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('services') }}">Services</a></li>
                            <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('terms-condition') }}">Terms &amp; Conditions</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="{{ route('carts') }}">View Cart</a></li>
                            <li><a href="{{ route('customer.register', ['user_type'=> 'service_boy']) }}">Service Boy Signup</a></li>
                            <li><a href="{{ route('orders.index') }}">Orders</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="widget-title wow fadeIn animated">Follow Us</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0" style="filter: invert(1)">
                            <a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                        </div>
                        <h5 class="widget-title wow fadeIn animated">Secured Payment Gateways</h5>
                        <div class="row">
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <img class="wow fadeIn animated" src="{{ asset('customer/assets/imgs/theme/payment-method.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container py-2 wow fadeIn animated">
            <div class="row">
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">&copy; {{ date('Y') }}, <strong class="text-brand">Harnish Technical Service</strong> </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        Designed & Developed by <a href="{{ env('APP_URL') }}" target="_blank">{{ env('APP_URL') }}</a>. All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <div class="whatsapp-icon-area">
        <a class="whatsapp-icon" href="https://wa.me/+919096969667" target="_blank">
        <a class="whatsapp-icon" href="https://api.whatsapp.com/send?phone=+919096969667&text=Hey%21%20I%20want%20to%20book%20a%20service%2C%20can%20you%20please%20help%20me" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <!-- Vendor JS-->

    <script src="{{ asset('customer/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('customer/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script> --}}
    <script src="{{ asset('customer/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customer/assets/js/plugins/slick.js') }}"></script>
    {{-- <script src="{{ asset('customer/assets/js/plugins/jquery.syotimer.min.js') }}"></script> --}}
    <script src="{{ asset('customer/assets/js/plugins/wow.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="{{ asset('customer/assets/js/plugins/jquery-ui.js') }}"></script> --}}
    {{-- <script src="{{ asset('customer/assets/js/plugins/perfect-scrollbar.js') }}"></script> --}}
    {{-- <script src="{{ asset('customer/assets/js/plugins/magnific-popup.js') }}"></script> --}}
    <script src="{{ asset('customer/assets/js/plugins/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('customer/assets/js/plugins/waypoints.js') }}"></script> --}}
    {{-- <script src="{{ asset('customer/assets/js/plugins/counterup.js') }}"></script> --}}
    <script src="{{ asset('customer/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    {{-- <script src="{{ asset('customer/assets/js/plugins/images-loaded.js') }}"></script> --}}
    {{-- <script src="{{ asset('customer/assets/js/plugins/isotope.js') }}"></script> --}}
    {{-- <script src="{{ asset('customer/assets/js/plugins/scrollup.js') }}"></script> --}}
    {{-- <script src="{{ asset('customer/assets/js/plugins/jquery.vticker-min.js') }}"></script> --}}
    <script src="{{ asset('customer/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    {{-- <script src="{{ asset('customer/assets/js/plugins/jquery.elevatezoom.js') }}"></script> --}}
    <script src="{{ asset('customer/assets/js/main.js?v=3.4') }}"></script>
    <script src="{{ asset('customer/assets/js/shop.js?v=3.4') }}"></script>
    @if (!request()->routeIs('about') && !request()->routeIs('contact') && !request()->routeIs('customer.login') && !request()->routeIs('customer.signup'))
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsQRPtAFnaxHQqjf6lPbuqkIQPH2daBJc"></script>
        <script src="{{ asset('customer/assets/js/geolocation.js') }}"></script>
    @endif
</div>
