<x-customer.layout>

    <main class="main">

        {{-- SLIDER SECTION --}}
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Offer available </h4>
                                    <h2 class="animated fw-900">For Fresh Bookings</h2>
                                    <h1 class="animated fw-900 text-brand">On Every Services</h1>
                                    <p class="animated">Save more with coupons & up to 70% off</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="shop-product-right.html"> Book Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{ asset('customer/assets/imgs/slider/service-slider-1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Best Service</h4>
                                    <h2 class="animated fw-900">Monsoon Offer</h2>
                                    <h1 class="animated fw-900 text-7">Grab The Deal</h1>
                                    <p class="animated">Save more with coupons & up to 20% off</p>
                                    <a class="animated btn btn-brush btn-brush-2" href="shop-product-right.html"> Discover Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-2" src="{{ asset('customer/assets/imgs/slider/service-slider-2.webp') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Upcoming Offer</h4>
                                    <h2 class="animated fw-900">Big Deals From</h2>
                                    <h1 class="animated fw-900 text-8">Manufacturer</h1>
                                    <p class="animated">Clothing, Shoes, Bags, Wallets...</p>
                                    <a class="animated btn btn-brush btn-brush-1" href="shop-product-right.html"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-3" src="assets/imgs/slider/slider-3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>


        {{-- CATEGORIES SECTION --}}
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-4 col-md-2 mb-md-3 mb-lg-0 d-flex">
                            <div class="banner-features wow fadeIn animated hover-up">
                                <a href="{{ route('services-by-category', $category->id) }}">
                                    <img src="{{ asset($category->image) }}" alt="" class="img-fluid w-50 m-auto d-block">
                                    <h4 style="background-color: {{$colorsArray[$loop->iteration]}}">{{ ucwords($category->name) }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>



        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured Services</button>
                        </li>
                    </ul>
                    <a href="{{ route('services') }}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach ($featuredServices as $featuredService)
                                <div class="col-6 col-md-3 d-flex align-items-stretch">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img" src="{{ asset($featuredService->image) }}" alt="">
                                                    <img class="hover-img" src="{{ asset($featuredService->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">{{ $featuredService->category?->name }}</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">{{ $featuredService->name }}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>4.5</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>₹{{ $featuredService->min_price }} </span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" data-cart-id="{{$featuredService->id}}" class="addToCart action-btn hover-up" href="#"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                </div>
                <!--End tab-content-->
            </div>
        </section>




        {{-- <section class="banner-2 section-padding pb-0"> --}}
        <section class="bg-grey-9 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                        <h1 class="fw-600 mb-20">Your Trust In Us <br>Is Our Foundation</h1>
                        <a href="shop-grid-right.html" class="btn">See How <i class="fi-rs-arrow-right"></i></a>
                    </div>
                    <img src="{{ asset('customer/assets/imgs/banner/service-banner-1.webp') }}" class="img-fluid w-100" alt="">
                </div>
            </div>
        </section>






        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">

                        @foreach ($categories as $category)
                            <div class="card-1">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{ route('services-by-category', $category->id) }}"><img src="{{ asset($category->image) }}" alt="" class="img-fluid w-75 m-auto"></a>
                                </figure>
                                <h5><a href="{{ route('services-by-category', $category->id) }}">{{ $category->name }}</a></h5>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>



    </main>

</x-customer.layout>
