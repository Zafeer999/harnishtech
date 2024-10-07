<x-customer.layout>

    <main class="main">

        {{-- SLIDER SECTION --}}
        <section class="home-slider position-relative">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @foreach ($bannerSliders as $bannerSlider)
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-5 col-md-6">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">{{ $bannerSlider->small_text }} </h4>
                                        <h2 class="animated fw-900">{{ $bannerSlider->main_black_text }}</h2>
                                        <h2 class="animated fw-900" style="color: {{ $bannerSlider->text_color }}">{{ $bannerSlider->main_color_text }}</h2>
                                        <form class="form-subcriber banner-form d-md-flex wow fadeIn animated my-4" action="{{ route('services-by-category') }}" method="get">
                                            @csrf
                                            <div class="custom_select">
                                                <select class="form-control select-active" name="location_area" id="location_area">
                                                    <option value="">Change Location</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ strtolower($city->name) }}">{{ ucwords($city->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="custom_select service-select">
                                                <select class="form-control select-active service" name="service" id="service">
                                                    <option value="">Choose Service</option>
                                                    @foreach ($allServices as $allService)
                                                        <option value="{{ $allService->category_id }}">{{ $allService->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn bg-dark text-white search-btn"  type="submit">{{ $bannerSlider->button_text }}</button>
                                        </form>
                                        <p class="animated">{{ $bannerSlider->offer_text }}</p>
                                        <a class="animated btn btn-brush btn-brush-3" style="color: {{ $bannerSlider->text_color }}" href="{{ $bannerSlider->button_link }}"> {{ $bannerSlider->button_text }} </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="single-slider-img single-slider-img-1">
                                        <img class="animated slider-1-1" src="{{ asset($bannerSlider->image) }}" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="single-hero-slider single-animation-wrap">
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
                </div> --}}
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
                                                <a href="{{ route('services.show', $featuredService->id) }}">
                                                    <img class="default-img" src="{{ asset($featuredService->image) }}" alt="">
                                                    <img class="hover-img" src="{{ asset($featuredService->image) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('services.show', $featuredService->id) }}">{{ $featuredService->category?->name }}</a>
                                            </div>
                                            <h2><a href="{{ route('services.show', $featuredService->id) }}">{{ $featuredService->name }}</a></h2>
                                            <div class="rating-result" title="{{ ((number_format($featuredService->avg_rating, 1) / 5) * 100) }}%">
                                                <span>
                                                    <span>{{ number_format($featuredService->avg_rating, 1) }}</span>
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
