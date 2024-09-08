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
                            {{-- @can('orders.create')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="">
                                            <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                            <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            @endcan --}}
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
                                                <td>{{ $order->category->name }}, {{ $order->subCategory->name }}</td>
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
                                                    {{-- @can('orders.edit')
                                                        <button class="edit-element btn btn-primary px-2 py-1" title="Edit orders" data-id="{{ $query->id }}"><i data-feather="edit"></i></button>
                                                    @endcan --}}
                                                    @can('orders.delete')
                                                        <button class="btn btn-dark rem-element px-2 py-1" title="Delete orders" data-id="{{ $order->id }}"><i data-feather="trash-2"></i> </button>
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

{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('orders.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('orders.index') }}';
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });


    });
</script>


<!-- Delete -->
<script>
    $("#datatable-tabletools").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
                title: "Are you sure to delete this category?",
                // text: "Make sure if you have filled Vendor details before proceeding further",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((justTransfer) => {
                if (justTransfer) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('orders.destroy', ':model_id') }}";

                    $.ajax({
                        url: url.replace(':model_id', model_id),
                        type: 'POST',
                        data: {
                            '_method': "DELETE",
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


<!-- Edit -->
<script>
    $("#datatable-tabletools").on("click", ".edit-element", function(e) {
        e.preventDefault();
        $(".edit-element").show();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('orders.edit', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();

                if (!data.error) {
                    $("#editForm [name='edit_model_id']").val(model_id);
                    $("#editForm [name='ctasection_id']").val(data.query.id);
                    $("#editForm #edit_image_section").html(data.crtImgHtml);
                    $("#editForm [name='small_text']").val(data.query.small_text);
                    $("#editForm [name='main_text']").val(data.query.main_text);
                    $("#editForm [name='button_text']").val(data.query.button_text);
                    $("#editForm [name='button_color']").val(data.query.button_color);
                    $("#editForm [name='button_link']").val(data.query.button_link);
                    $("#editForm [name='status']").val(data.query.status);
                } else {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script>


<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('orders.update', ':model_id') }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('orders.index') }}';
                        });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

            function resetErrors() {
                var form = document.getElementById('editForm');
                var data = new FormData(form);
                for (var [key, value] of data) {
                    var field = key.replace('[]', '');
                    $('.' + field + '_err').text('');
                    $('#' + field).removeClass('is-invalid');
                    $('#' + field).addClass('is-valid');
                }
            }

            function printErrMsg(msg) {
                $.each(msg, function(key, value) {
                    var field = key.replace('[]', '');
                    $('.' + field + '_err').text(value);
                    $('#' + field).addClass('is-invalid');
                });
            }

        });
    });
</script>
