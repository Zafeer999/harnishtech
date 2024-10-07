<x-customer.layout>


    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Pages
                    <span></span> Account
                </div>
            </div>
        </div>

        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        {{-- <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                            {{-- <a class="nav-link" href="page-login-register.html"><i class="fi-rs-sign-out mr-10"></i>Logout</a> --}}
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    {{-- <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello Rosie! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order No.</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Time Slot</th>
                                                                <th>Service</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $order)
                                                                @foreach ($order->orderItems as $item)
                                                                    <tr>
                                                                        <td>#{{ $order->order_no }}</td>
                                                                        <td>{{ $order->created_at }}</td>
                                                                        <td>{{ $order->status }}</td>
                                                                        <td>{{ $order->timeSlot->name }}</td>
                                                                        <td>{{ $item->category['name'] }} : {{ $item->subCategory->name }}</td>
                                                                        <td>₹{{ number_format($order->total, 2) }}</td>
                                                                        <td><a href="{{ route('order-invoice', ['id' => $order->id])}}" class="btn-small d-block">View</a></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Orders tracking</h5>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                            <div class="input-style mb-20">
                                                                <label>Order ID</label>
                                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>Billing email</label>
                                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row">
                                            @foreach ($orders as $order)
                                                @foreach ($order->user->userAddress as $address)
                                                    <div class="col-lg-6">
                                                        <div class="card mb-3 mb-lg-0">
                                                            <div class="card-header">
                                                                <h5 class="mb-0">{{ $address->is_default ? 'Default Address' : 'Alternative Address' }}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <address>{{ $address->full_address }}<br>{{ $address->pincode }}</address>
                                                                <p>{{ $address->city }}</p>
                                                                <form action="{{ route('user.address.delete', $address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-small btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> --}}

                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row h-100">
                                            @foreach ($orders as $order)
                                                @foreach ($order->user->userAddress as $address)
                                                    <div class="col-lg-6">
                                                        <div class="card mb-3 mb-lg-0">
                                                            <div class="card-header">
                                                                <h5 class="mb-0">{{ $address->is_default ? 'Default Address' : 'Alternative Address' }}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <address>{{ $address->full_address }}<br>{{ $address->pincode }}</address>
                                                                <p>{{ $address->city }}</p>

                                                                <!-- Trigger the delete button -->
                                                                <button type="submit" class="btn btn-danger py-1 px-2 rem-element" data-id="{{ $address->id }}"> <i data-feather="trash-2"></i>Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>

                                            </div>
                                            <div class="card-body">
                                                {{-- <p>Already have an account? <a href="page-login-register.html">Log in instead!</a></p> --}}
                                                <form method="post" name="enq">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Full Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="name" type="text" value="{{ $user->name }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="email" type="email" value="{{ $user->email }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Mobile No. <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="mobile" type="mobile" value="{{ $user->mobile }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Current Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="password" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>New Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="npassword" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Confirm Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="cpassword" type="password">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
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
                </div>
            </div>
        </section>
    </main>


</x-customer.layout>

{{-- Delete Address --}}

<script>
    $(document).ready(function() {
        $("#address").on("click", ".rem-element", function(e) {
            e.preventDefault();

            var addressId = $(this).attr("data-id");
            console.log("Delete button clicked!", addressId); // Debugging

            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true, // Show the Cancel button
                confirmButtonText: 'Confirm', // Text for the Confirm button
                cancelButtonText: 'Cancel', // Text for the Cancel button
                reverseButtons: true, // Show the Cancel button on the left side
            }).then(function(result) {
                if (result.isConfirmed) { // Check if Confirm button was clicked
                    console.log("Confirmed delete");

                    var url = "{{ route('user.address.delete', ':id') }}".replace(':id', addressId);

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            '_method': "DELETE",
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                swal.fire("Success!", response.success, "success")
                                    .then(function() {
                                        window.location.reload();
                                    });
                            } else {
                                swal.fire("Error!", response.error, "error");
                            }
                        },
                        error: function() {
                            swal.fire("Error!", "Something went wrong. Please try again.", "error");
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swal.fire("Cancelled", "Your address is safe", "info");
                }
            });
        });
    });
</script>
