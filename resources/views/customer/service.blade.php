<x-customer.layout>

    <main class="main">


        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset($service->image) }}" alt="product image">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $service->name }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Category: <a href="shop-grid-right.html">{{ $service->category?->name }}</a></span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:{{ round(($service->avg_rating / 5) * 100) }}%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> ({{ $service->reviews_count }} reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">₹{{ number_format($service->min_price, 2) }}</span></ins>
                                                {{-- <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                                <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{!! Str::limit($service->description, 120) !!}</p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> Experience Quality Service</li>
                                                @if ($serviceCharge)
                                                    <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> ₹{{ number_format($serviceCharge) }} Service Charge</li>
                                                @else
                                                    <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> Free of Service Charge</li>
                                                @endif
                                                <li><i class="fi-rs-credit-card mr-5"></i> Pay After Service</li>
                                            </ul>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="product-extra-link2">
                                                <button type="submit" data-cart-id="{{$service->id}}" class="addToCart button button-add-to-cart">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 m-auto entry-main-content">
                                    <h2 class="section-title style-1 mb-30">Description</h2>
                                    <div class="description mb-50">{!! $service->description !!}</div>



                                    <livewire:customer.service-review category_id="{{$service->id}}"/>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

</x-customer.layout>
