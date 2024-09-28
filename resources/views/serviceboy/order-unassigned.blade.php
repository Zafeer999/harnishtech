<x-admin.admin-layout>
    <x-slot name="title">{{ auth()->user()->tenant_name }} - Unassigned Order</x-slot>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">



                <div class="row">
                    <div class="col-sm-12">
                        <h3>Unassigned Order</h3>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid support-ticket">
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            @can('banner_sliders.create')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="">
                                            <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                            <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <div class="table-responsive">
                                <table class="table-bordered" id="datatable-tabletools">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Order No</th>
                                            <th>Customer</th>
                                            <th>Services</th>
                                            <th>Is Assigned</th>
                                            <th>Timeslot</th>
                                            <th>Status</th>
                                            <th>Charges</th>
                                            <th>Scheduled On</th>
                                            <th>Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unassignedOrders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <p>#{{ $order->order_no }} </p>
                                                </td>
                                                <td>
                                                    <p>{{ $order->user->name }}<br> +91{{ $order->user->mobile }}<br> {{ $order->user->email }}</p>
                                                </td>
                                                <td style="min-width: 150px">
                                                    @foreach ($order->orderItems as $item)
                                                        <p>{{ $item->category->name }} :- {{ $item->subCategory->name }}</p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <p>{{ $order->is_assigned == 1 ? "Assigned" : "Unassigned"}}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $order->timeSlot->name }}</p>
                                                </td>
                                                <td>
                                                    <span class="badge bg-{{$order->order_status_color}}"> {{ ucfirst($order->order_status_text) }}</span>
                                                </td>
                                                <td style="min-width: 150px">
                                                    <p> Charges: <strong>₹{{ $order->charges }}</strong> <br> Service Chargebr: <strong>₹{{ $order->service_charge }}</strong> <br> GST Charge: <strong>₹{{ $order->gst_charge }}</strong></p>
                                                </td>
                                                <td>
                                                    <p>{{ $order->scheduled_on ?? "-" }}</p>
                                                </td>
                                                <td style="min-width: 150px">
                                                    <p>Payment Type: <strong>{{ $order->payment_type == 1 ? "Postpaid" : "Prepaid" }}</strong> <br> Payment Method: <strong>{{ $order->payment_method == 1 ? "Online" : "Cash"}}</strong> <br> Payment Status: <strong>{{ $order->payment_text}}</strong> </p>
                                                </td>
                                                <td>
                                                    @can('sb-orders.claim')
                                                        <button class="claim-order btn btn-danger px-2 py-1" title="Claim Order" data-id="{{ $order->id }}"><i data-feather="anchor"></i> Claim Order</button>
                                                        @endcan
                                                    @can('orders.transfer')
                                                        <button class="assign-order btn btn-danger px-2 py-1" title="Assign Order" data-id="{{ $order->id }}"><i data-feather="anchor"></i> Assign Order</button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Container-fluid Ends -->
    </div>


</x-admin.admin-layout>


<!-- Delete -->
<script>
    $("#datatable-tabletools").on("click", ".claim-order", function(e) {
        e.preventDefault();
        swal({
                title: "Are you sure you want to claim this order?",
                // text: "Make sure if you have filled Vendor details before proceeding further",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((yesDoThis) => {
                if (yesDoThis) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('orders.claim', ':model_id') }}";

                    $.ajax({
                        url: url.replace(':model_id', model_id),
                        type: 'POST',
                        data: {
                            '_method': "PUT",
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function(data, textStatus, jqXHR) {
                            if (!data.error && !data.error2) {
                                swal("Success!", data.success, "success")
                                    .then((action) => {
                                        window.location.reload();
                                    });
                            } else {
                                if (data.error) {
                                    swal("Error!", data.error, "error");
                                } else {
                                    swal("Error!", data.error2, "error");
                                }
                            }
                        },
                        error: function(error, jqXHR, textStatus, errorThrown) {
                            swal("Error!", "Something went wrong", "error");
                        },
                    });
                }
            });
    });
</script>


