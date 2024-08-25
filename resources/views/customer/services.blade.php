<x-customer.layout>

    <main class="main">


        {{-- CATEGORIES SECTION --}}
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-4 col-md-2 mb-md-3 mb-lg-0 d-flex">
                            <div class="banner-features wow fadeIn animated hover-up" style="background-color: {{ isset($selectedCategory) && $selectedCategory->id == $category->id ? '#0776c7' : '#f0f7fc' }}">
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
            @if ($services->isNotEmpty())
                <div class="bg-square"></div>
            @endif
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">{{ isset($selectedCategory) ? ucwords($selectedCategory->name) : 'All' }} Services</button>
                        </li>
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @forelse ($services as $service)
                                <div class="col-6 col-md-3 d-flex align-items-stretch">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img" src="{{ asset($service->image) }}" alt="">
                                                    <img class="hover-img" src="{{ asset($service->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">{{ $service->category?->name }}</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">{{ $service->name }}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>4.5</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>₹{{ $service->min_price }} </span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" data-cart-id="{{ $service->id }}" class="addToCart action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 col-md-12 d-flex align-items-stretch">
                                    <div class="product-cart-wrap mb-30">
                                        <h3 class="card-text p-5">New services are on the way! we will add services for this category very soon. Stay tuned and visit soon. </h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <!--End product-grid-4-->
                    </div>
                </div>
                <!--End tab-content-->
            </div>
        </section>


    </main>

</x-customer.layout>
