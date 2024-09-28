<x-admin.admin-layout>
    <x-slot name="title">{{ auth()->user()->tenant_name }} - Orders</x-slot>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">

                <div class="row">
                    <div class="col-sm-12">
                        <h3>Orders</h3>
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

                            <div class="table-responsive">
                                <table class="table-bordered" id="datatable-tabletools">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>User Name/Mobile</th>
                                            <th>Address</th>
                                            <th>Category</th>
                                            <th>Order No.</th>
                                            <th>Amount</th>
                                            <th>Is Assigned</th>
                                            <th>Status</th>
                                            <th>Charges</th>
                                            <th>GST%</th>
                                            <th>Total</th>
                                            <th>Scheduled On</th>
                                            <th>Serviced On</th>
                                            <th>Payment Type</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->user->name }} <br> {{ $order->user->mobile }}</td>
                                                <td>{{ $order->userAddress->full_address }}</td>
                                                <td>{{ $order->category?->name }}, {{ $order->subCategory?->name }}</td>
                                                <td>{{ $order->order_no }}</td>
                                                <td>{{ $order->amount }}</td>
                                                <td>
                                                    <span class="badge rounded-pill {{ $order->is_assigned == 1 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $order->is_assigned == 1 ? 'Assigned' : 'Unassigned' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge rounded-pill bg-info">{{ $order->order_status_text }}</span>
                                                </td>
                                                {{-- <td><span class="badge rounded-pill bg-primary">{{$order->category}}</span></td> --}}
                                                <td> {{ $order->charges }}₹</td>
                                                <td> {{ $order->gst_charge }}%</td>
                                                <td> {{ $order->total }}₹</td>
                                                <td> {{ $order->scheduled_on }}</td>
                                                <td> {{ $order->serviced_on ?? 'N/A'}}</td>
                                                <td> {{ $order->payment_type == 0 ? 'Cash' : 'Online'}}</td>
                                                <td> {{ $order->payment_method == 1 ? 'Prepaid' : 'Postpaid' }}</td>
                                                <td> {{ $order->payment_status == 0 ? 'Unpaid' : ($order->payment_status == 1 ? 'Paid' : ($order->payment_status == 2 ? 'Failed' : 'N/A')) }}
                                                </td>
                                                <td>
                                                    @can('orders.transfer')
                                                        <button class="btn btn-dark assign-order px-2 py-1" title="Assign orders" data-id="{{ $order->id }}"><i data-feather="check-circle"></i> Assign Order</button>
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


    {{-- Assign Services Modal --}}
    <div class="modal fade" id="assign-order-modal" role="dialog" >
        <div class="modal-dialog" role="document">
            <form action="" id="assignOrderForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Order</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="assign_order_id" name="assign_order_id" value="">

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="name">Order No : </label>
                            <div class="col-sm-9">
                                <h6 class="pt-2">#<span id="assign_order_no"></span></h6>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="name">Service Boy : </label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single" id="service_boy" name="service_boy">
                                    <option value="">--Select Service Boy--</option>
                                </select>
                                <span class="text-danger error-text service_boy_err"></span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="assignOrderSubmit" type="submit">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-admin.admin-layout>



<!-- Open Assign Services Modal-->
<script>
    $("#datatable-tabletools").on("click", ".assign-order", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('orders.service-boys', ':model_id') }}";
        $('#assign_order_id').val(model_id);

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                if (!data.error) {
                    $("#assignOrderForm input[name='assign_order_id']").val(model_id);
                    $("#assignOrderForm #service_boy").html(data.serviceBoyHtml);
                    $("#assignOrderForm #assign_order_no").text(data.order.order_no);
                    $('#assign-order-modal').modal('show');
                } else {
                    swal("Error!", data.error, "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Some thing went wrong", "error");
            },
        });
    });
</script>


<!-- Update Service Boy Services -->
<script>
    $("#assignOrderForm").submit(function(e) {
        e.preventDefault();
        $("#assignOrderSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        formdata.append('_method', 'PUT');
        var model_id = $('#assign_order_id').val();
        var url = "{{ route('orders.assign', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#assignOrderSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        $("#assign-order-modal").modal('hide');
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#assignOrderSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#assignOrderSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

        function resetErrors() {
            var form = document.getElementById('assignOrderForm');
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
                $('#' + key).removeClass('is-valid');
            });
        }

    });
</script>
