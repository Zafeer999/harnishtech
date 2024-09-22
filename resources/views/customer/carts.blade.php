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

                                            {{-- @if ($cartItems->isNotEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-end">
                                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                                    </td>
                                                </tr>
                                            @endif --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart-action text-end">
                                    @if ($cartItems->isNotEmpty())
                                        <a class="btn mr-10 clearAllCart"><i class="fi-rs-cross-small mr-10"></i>Clear Cart</a>
                                    @endif
                                    <a class="btn " href="{{ route('services') }}"><i class="fi-rs-shopping-bag mr-10"></i>Add Services</a>
                                </div>
                            </div>
                        </div>

                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>

                        <div class="row mb-50 px-md-0 px-3">
                            <div class="col-lg-6 col-md-12">
                                <div class="card cart-card">
                                    <div class="card-body">
                                        <div class="heading_s1 mb-3">
                                            <h4>Confirm Your Address</h4>
                                        </div>
                                        {{-- <p class="mt-15 mb-30">Flat rate: <span class="font-xl text-brand fw-900">5%</span></p> --}}
                                        <form class="field_form shipping_calculator">
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($userAddresses as $address)
                                                        <div class="card address-card">
                                                            <div class="card-body form-check p-0 ps-3">
                                                                <input type="radio" name="previous_address" id="add_{{ $address->id }}" checked="false" value="{{ $address->id }}" class="form-check-input">
                                                                <label for="add_{{$address->id}}" class="form-check-label w-100 ps-2">
                                                                    {{ $address->full_address }}.<br>
                                                                    <strong>City : {{ $address->city }}</strong> <br>
                                                                    <strong>Pincode : {{ $address->pincode }}</strong>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if ($userAddresses->isNotEmpty())
                                                    <div class="col-12">
                                                        <p style="font-size: 20px; margin: 15px auto; width: 100%; text-align: center; font-weight: 700">OR</p>
                                                    </div>
                                                @endif
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <input required="required" class="input-border" placeholder="Full Address" name="full_address" type="text">
                                                </div>
                                            </div>
                                            <div class="form-row row">
                                                <div class="form-group col-lg-6">
                                                    <div class="custom_select">
                                                        <select class="form-control select-active" name="cart_location" id="cart_location">
                                                            <option value="">Change Location</option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ strtolower($city->name) }}">{{ ucwords($city->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input required="required" placeholder="Pincode" class="input-border" name="pincode" id="pincode" type="number">
                                                </div>
                                            </div>

                                            <div class="form-row row">
                                                <div class="form-group col-lg-6">
                                                    <div class="custom_select">
                                                        <select class="form-control select-active" name="slot" id="slot">
                                                            <option value="" selected>Time Slot</option>
                                                            @foreach ($slots as $slot)
                                                                <option value="{{ $slot->id }}">{{ \Carbon\Carbon::parse($slot->from_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($slot->to_time)->format('h:i A') }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
                                                        <form action="#" id="couponForm" target="_blank">
                                                            @csrf
                                                            <div class="form-row row justify-content-center">
                                                                <div class="form-group col-lg-6">
                                                                    <input class="font-medium" name="coupon" id="coupon" placeholder="Enter Your Coupon">
                                                                    <span class="text-danger coupon_err"></span>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <button class="btn btn-md d-none" id="resetCoupon" type="reset"><i class="fi-rs-label mr-10"></i>Clear</button>
                                                                    <button class="btn btn-md" id="couponSubmit" {{ $cartItems->isNotEmpty() ? '' : 'disabled' }} type="submit"><i class="fi-rs-label mr-10"></i>Apply</button>
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
                                                                <td class="cart_total_amount text-danger"> <i class="ti-gift mr-5"></i> {{ number_format($serviceCharge) }}</td>
                                                            @else
                                                                <td class="cart_total_amount text-success"> <i class="ti-gift mr-5"></i> Free</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">GST Charge</td>
                                                            @if ($gstCharge)
                                                                <td class="cart_total_amount text-danger"> <i class="ti-gift mr-5"></i> -₹{{ number_format($gstCharge) }}</td>
                                                            @else
                                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> N/A</td>
                                                            @endif
                                                        </tr>
                                                        <tr class="d-none" id="couponTr">
                                                            <td class="cart_total_label">Coupon Discount</td>
                                                            <td class="cart_total_amount text-success"> <i class="ti-gift mr-5"></i> -₹<span id="couponDiscount">200</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">₹<span id="cartTotal">{{ number_format(($cartTotal+$serviceCharge+$gstCharge)) }}</span></span></strong></td>
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
                                                        <input class="form-check-input" required="" type="radio" name="payment_option" value="1" id="exampleRadios4" checked="">
                                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash Payment</label>
                                                    </div>
                                                    <div class="custome-radio">
                                                        <input class="form-check-input" required="" type="radio" name="payment_option" value="2" id="exampleRadios5" >
                                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Payment option ends --}}
                                            <button class="btn book-now" id="book-now" {{ $cartItems->isNotEmpty() ? '' : 'disabled' }}> <i class="fi-rs-box-alt mr-10"></i> Book Now</button>
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


    @push('scripts')
        <script>
            $("#book-now").click(function(e) {
                e.preventDefault();
                $("#book-now").prop('disabled', true);

                $.ajax({
                    url: '{{ route('place-order') }}',
                    type: 'POST',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'previous_address': $('input[name="previous_address"]').val(),
                        'full_address': $('input[name="full_address"]').val(),
                        'city': $('select[name="cart_location"]').val(),
                        'pincode': $('input[name="pincode"]').val(),
                        'coupon': $('input[name="coupon"]').val(),
                        'slot': $('select[name="slot"]').val(),
                        'payment_type': $('input[name="payment_option"]').val()
                    },
                    success: function(datas, textStatus, jqXHR) {

                        if (!datas.error && !datas.error2) {
                            if(datas.redirect)
                                window.location.href = datas.redirect;
                            else
                            {
                                Swal.fire({ title: "Success!", text: datas.success, icon: 'success', confirmButtonText: 'OK'})
                                    .then((result) => {
                                        window.location.href = "{{ route('home') }}";
                                    });

                            }
                        } else {
                            $("#book-now").prop('disabled', false);
                            Swal.fire({ title: "Error!", text: datas.error2, icon: 'error', confirmButtonText: 'OK'});
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        $("#book-now").prop('disabled', false);
                        Swal.fire({ title: "Error occured!", text: "Something went wrong please try again", icon: 'error', confirmButtonText: 'OK'});
                    },
                });
            });


            $("#couponForm").submit(function(e) {
                e.preventDefault();
                $("#couponSubmit").prop('disabled', true);

                var formdata = new FormData(this);
                $.ajax({
                    url: '{{ route('check-coupon') }}',
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#couponSubmit").prop('disabled', false);
                        resetErrors();
                        if (!data.error2){
                            $('#resetCoupon').removeClass('d-none');
                            $('#coupon').prop('disabled', true);
                            $('#couponSubmit').prop('disabled', true);
                            $('#couponTr').removeClass('d-none');
                            $('#couponDiscount').text(data.couponDiscount);
                            $('#cartTotal').text(data.cartTotal);
                        }
                        else
                            Swal.fire({ title: "Error!", text: data.error2, icon: 'error', confirmButtonText: 'OK'});
                    },
                    statusCode: {
                        422: function(responseObject, textStatus, jqXHR) {
                            $("#couponSubmit").prop('disabled', false);
                            resetErrors();
                            printErrMsg(responseObject.responseJSON.error);
                        },
                        500: function(responseObject, textStatus, errorThrown) {
                            $("#couponSubmit").prop('disabled', false);
                            Swal.fire({ title: "Error occured!", text: "Something went wrong please try again", icon: 'error', confirmButtonText: 'OK'});
                        }
                    }
                });

                function resetErrors() {
                    var form = document.getElementById('couponForm');
                    var data = new FormData(form);
                    for (var [key, value] of data) {
                        $('.' + key + '_err').text('');
                        $('#' + key).removeClass('is-invalid');
                        $('#' + key).addClass('is-valid');
                    }
                }

                function printErrMsg(msg) {
                    $.each(msg, function(key, value) {
                        $('.' + key + '_err').text(value);
                        $('#' + key).addClass('is-invalid');
                    });
                }
            });

            $("#resetCoupon").click(function(e){
                e.preventDefault();

                $.ajax({
                    url: '{{ route('reset-coupon') }}',
                    type: 'GET',
                    data: {
                        '_token': "{{ csrf_token() }}",
                    },
                    success: function(datas, textStatus, jqXHR) {
                        if (!datas.error && !datas.error2) {
                            $("#resetCoupon").addClass('d-none');
                            $("#couponSubmit").prop('disabled', false);
                            $("#coupon").prop('disabled', false);
                            $("#coupon").val('');
                            $('#couponTr').addClass('d-none');
                            $('#cartTotal').text(datas.cartTotal);
                        } else {
                            Swal.fire({ title: "Error!", text: datas.error2, icon: 'error', confirmButtonText: 'OK'});
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        $("#book-now").prop('disabled', false);
                        Swal.fire({ title: "Error occured!", text: "Something went wrong please try again", icon: 'error', confirmButtonText: 'OK'});
                    },
                });
            });
        </script>
    @endpush

</x-customer.layout>
