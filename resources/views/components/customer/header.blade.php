<div>
    @if (request()->routeIs('home'))
        <!-- Deal of the day Modal -->
        <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="deal" style="background-image: url('assets/imgs/banner/menu-banner-7.png')">
                            <div class="deal-top">
                                <h2 class="text-brand">Deal of the Day</h2>
                                <h5>Limited quantities.</h5>
                            </div>
                            <div class="deal-content">
                                <h6 class="product-title"><a href="shop-product-right.html">Summer Collection New Morden Design</a></h6>
                                <div class="product-price"><span class="new-price">$139.00</span><span class="old-price">$160.99</span></div>
                            </div>
                            <div class="deal-bottom">
                                <p>Hurry Up! Offer End In:</p>
                                <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"><span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span
                                            class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span></div>
                                <a href="shop-grid-right.html" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Quick view -->
    {{-- <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('customer/assets/imgs/shop/product-16-2.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('customer/assets/imgs/shop/product-16-1.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('customer/assets/imgs/shop/product-16-3.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('customer/assets/imgs/shop/product-16-4.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('customer/assets/imgs/shop/product-16-5.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('customer/assets/imgs/shop/product-16-6.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('customer/assets/imgs/shop/product-16-7.jpg') }}" alt="product image">
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div><img src="{{ asset('customer/assets/imgs/shop/thumbnail-3.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('customer/assets/imgs/shop/thumbnail-4.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('customer/assets/imgs/shop/thumbnail-5.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('customer/assets/imgs/shop/thumbnail-6.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('customer/assets/imgs/shop/thumbnail-7.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('customer/assets/imgs/shop/thumbnail-8.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('customer/assets/imgs/shop/thumbnail-9.jpg') }}" alt="product image"></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="{{ asset('customer/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h3 class="title-detail mt-30">Colorful Pattern Shirts HD450</h3>
                                <div class="product-detail-rating">
                                    <div class="pro-details-brand">
                                        <span> Brands: <a href="shop-grid-right.html">Bootstrap</a></span>
                                    </div>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <ins><span class="text-brand">$120.00</span></ins>
                                        <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                        <span class="save-price  font-md color3 ml-15">25% Off</span>
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                <div class="short-desc mb-30">
                                    <p class="font-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi,!</p>
                                </div>

                                <div class="attr-detail attr-color mb-15">
                                    <strong class="mr-10">Color</strong>
                                    <ul class="list-filter color-filter">
                                        <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                        <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                        <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                        <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                        <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                        <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                        <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                    </ul>
                                </div>
                                <div class="attr-detail attr-size">
                                    <strong class="mr-10">Size</strong>
                                    <ul class="list-filter size-filter font-small">
                                        <li><a href="#">S</a></li>
                                        <li class="active"><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <ul class="product-meta font-xs color-grey mt-50">
                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                    <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                                </ul>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><i class="fi-rs-smartphone"></i> <a href="tel:9096969667">(+91) 9096969667</a></li>
                                <li><i class="fi-rs-marker"></i><a href="#" id="geo_location">Thane, MH, IN</a></li>
                                <input type="hidden" name="geo_city" value="">
                                <input type="hidden" name="geo_pincode" value="">
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                @if ($authUser)
                                    <li>
                                        <a class="language-dropdown-active" href="#"> <i class="fa-regular fa-circle-user"></i> {{ ucwords($authUser->name) }} <i class="fi-rs-angle-small-down"></i></a>
                                        <ul class="language-dropdown">
                                            <li><a href="#"><i class="fa-solid fa-chart-bar"></i> My Orders</a></li>
                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><i class="fi-rs-user"></i><a href="{{ route('customer.login') }}">Log In / Sign Up</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.html"><img src="{{ asset('customer/assets/imgs/theme/logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    @foreach ($categories as $category)
                                        <option>{{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="Search for items...">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <livewire:customer.header-cart deviceType="desktop" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{ asset('customer/assets/imgs/theme/logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a class="{{ request()->routeIs('home') || request()->routeIs('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li><a class="{{ request()->routeIs('services-by-category') ? 'active' : '' }}" href="#">Categories <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach ($categories as $category)
                                                <li><a href="{{ route('services-by-category', $category->id) }}">{{ ucwords($category->name) }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="{{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-headset"></i><span>Helpline</span> <a href="tel:+919096969667">(+91) 9096969667</a> </p>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <livewire:customer.header-cart deviceType="mobile" />
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><img src="{{ asset('customer/assets/imgs/theme/logo.png') }}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item">
                                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span>
                                <a href="#" class="{{ request()->routeIs('home') ? 'active' : '' }}">Categories</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('services-by-category', $category->id) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="menu-item">
                                <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                            </li>
                            @if ($authUser)
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">{{ ucwords($authUser->name) }}</a>
                                    <ul class="dropdown">
                                        <li><a href="#">My Orders</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <li class="menu-item"><a href="{{ route('customer.login') }}">Log In / Sign Up </a></li>
                            @endif
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"> Bhiwandi, MH, IND </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="tel:9096969667">(+91) 9096969667 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
