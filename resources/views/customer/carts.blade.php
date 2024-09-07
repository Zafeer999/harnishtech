<x-customer.layout>

    <main class="main">


        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="card cart-card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table shopping-summery text-center clean">
                                        <thead>
                                            <tr class="main-heading bg-6">
                                                <th scope="col"></th>
                                                <th scope="col">Service</th>
                                                <th scope="col">Price</th>
                                                {{-- <th scope="col">Subtotal</th> --}}
                                                <th scope="col">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($cartItems as $cart)
                                                <tr>
                                                    <td class="image product-thumbnail"><img src="{{ asset($cart->attributes->image) }}" alt="#"></td>
                                                    <td class="product-des product-name">
                                                        <h5 class="product-name"><a href="shop-product-right.html">{{ $cart->name }}</a></h5>
                                                        <p class="font-xs">{!! Str::limit(strip_tags($cart->attributes->description), 60) !!}</p>
                                                    </td>
                                                    {{-- <td class="price" data-title="Price"><span>₹{{ number_format($cart->price) }} </span></td> --}}
                                                    {{-- <td class="text-center" data-title="Stock">
                                                        <div class="detail-qty border radius  m-auto">
                                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                            <span class="qty-val">{{ $cart->quantity }}</span>
                                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                        </div>
                                                    </td> --}}
                                                    <td class="text-right" data-title="Cart">
                                                        <span>${{ number_format($cart->price) }} </span>
                                                    </td>
                                                    <td class="action" data-title="Remove"><a href="#" data-cart-remove-id="{{ $cart->id }}" class="removeFromCart text-muted"><i class="fi-rs-trash"></i></a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        <h3 class="p-5">No Items in your cart</h3>
                                                    </td>
                                                </tr>
                                            @endforelse

                                            @if ($cartItems->isNotEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-end">
                                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart-action text-end">
                                    <a class="btn mr-10"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                                    <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                                </div>
                            </div>
                        </div>

                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>

                        <div class="row mb-50 px-md-0 px-3">
                            <div class="col-lg-6 col-md-12">
                                <div class="card cart-card">
                                    <div class="card-body">
                                        <div class="heading_s1 mb-3">
                                            <h4>Calculate Shipping</h4>
                                        </div>
                                        <p class="mt-15 mb-30">Flat rate: <span class="font-xl text-brand fw-900">5%</span></p>
                                        <form class="field_form shipping_calculator">
                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <input required="required" placeholder="Full Address" name="address" type="text">
                                                </div>
                                            </div>
                                            <div class="form-row row">
                                                <div class="form-group col-lg-6">
                                                    <div class="custom_select">
                                                        <select class="form-control select-active">
                                                            <option value="">Change Location</option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ strtolower($city->name) }}">{{ ucwords($city->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input required="required" placeholder="PostCode / ZIP" name="name" type="text">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <button class="btn  btn-sm"><i class="fi-rs-shuffle mr-10"></i>Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="mb-30 mt-50">
                                            <div class="heading_s1 mb-3">
                                                <h4>Apply Coupon</h4>
                                            </div>
                                            <div class="total-amount">
                                                <div class="left">
                                                    <div class="coupon">
                                                        <form action="#" target="_blank">
                                                            <div class="form-row row justify-content-center">
                                                                <div class="form-group col-lg-6">
                                                                    <input class="font-medium" name="Coupon" placeholder="Enter Your Coupon">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card cart-card">
                                    <div class="card-body">
                                        <div class="border p-md-4 p-30 border-radius cart-totals">
                                            <div class="heading_s1 mb-3">
                                                <h4>Cart Totals</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="cart_total_label">Cart Subtotal</td>
                                                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">₹{{ number_format($cartTotal) }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Visiting Charge</td>
                                                            @if ($serviceCharge)
                                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> {{ number_format($serviceCharge) }}</td>
                                                            @else
                                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">₹{{ number_format($cartTotal) }}</span></strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- Payment options --}}
                                            <div class="payment_method">
                                                <div class="mb-25">
                                                    <h5>Payment</h5>
                                                </div>
                                                <div class="payment_option">
                                                    <div class="custome-radio">
                                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash Payment</label>
                                                        <div class="form-group collapse in" id="checkPayment">
                                                            <p class="text-muted mt-5">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                                        </div>
                                                    </div>
                                                    <div class="custome-radio">
                                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">
                                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online</label>
                                                        <div class="form-group collapse in" id="paypal">
                                                            <p class="text-muted mt-5">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Payment option ends --}}
                                            <a href="{{ route('checkouts.index') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


    </main>

</x-customer.layout>
