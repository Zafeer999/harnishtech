<x-admin.admin-layout>
    <x-slot name="title">{{ auth()->user()->tenant_name }} - Banner Slider</x-slot>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">


                <!-- Add Form -->
                <div class="row" id="addContainer" style="display:none;">
                    <div class="col-sm-12">
                        <div class="card">
                            <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="image">Image <span class="text-danger">*</span></label>
                                            <input class="form-control" name="image" type="file" accept="image/*">
                                            <span class="text-danger error-text image_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="small_text">Small Text</label>
                                            <input class="form-control" name="small_text" type="text" placeholder="Enter Small Text">
                                            <span class="text-danger error-text small_text_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="main_black_text">Main Black Text <span class="text-danger">*</span></label>
                                            <input class="form-control" name="main_black_text" type="text" placeholder="Enter Main Black Text">
                                            <span class="text-danger error-text main_black_text_err"></span>
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="button_text">Button Text <span class="text-danger">*</span></label>
                                            <input class="form-control" name="button_text" type="text" placeholder="Enter Button Text">
                                            <span class="text-danger error-text button_text_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="button_link">Button Link</label>
                                            <input class="form-control" name="button_link" type="url" placeholder="Enter Button Link">
                                            <span class="text-danger error-text button_link_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <span class="text-danger error-text status_err"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                {{-- Edit Form --}}
                <div class="row" id="editContainer" style="display:none;">
                    <div class="col">
                        <form class="form-horizontal form-bordered" method="post" id="editForm">
                            @csrf
                            <section class="card">
                                <header class="card-header">
                                    <h4 class="card-title">Edit Banner Slider</h4>
                                </header>

                                <div class="card-body py-2">
                                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                                    <div class="mb-3 row">
                                        <div class="col-md-3">
                                            <label class="col-form-label" for="image">Image <span class="text-danger">*</span></label>
                                            <input class="form-control" name="image" type="file" accept="image/*">
                                            <span class="text-danger error-text image_err"></span>
                                        </div>
                                        <div class="col-md-1" id="edit_image_section"></div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="small_text">Small Text</label>
                                            <input class="form-control" name="small_text" type="text" placeholder="Enter Small Text">
                                            <span class="text-danger error-text small_text_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="main_black_text">Main Black Text <span class="text-danger">*</span></label>
                                            <input class="form-control" name="main_black_text" type="text" placeholder="Enter Main Black Text">
                                            <span class="text-danger error-text main_black_text_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="main_color_text">Main Color Text <span class="text-danger">*</span></label>
                                            <input class="form-control" name="main_color_text" type="text" placeholder="Enter Main Color Text">
                                            <span class="text-danger error-text main_color_text_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="offer_text">Offer Text</label>
                                            <input class="form-control" name="offer_text" type="text" placeholder="Enter Offer Text">
                                            <span class="text-danger error-text offer_text_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="button_text">Button Text <span class="text-danger">*</span></label>
                                            <input class="form-control" name="button_text" type="text" placeholder="Enter Button Text">
                                            <span class="text-danger error-text button_text_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="button_link">Button Link</label>
                                            <input class="form-control" name="button_link" type="url" placeholder="Enter Button Link">
                                            <span class="text-danger error-text button_link_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <span class="text-danger error-text status_err"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" id="editSubmit">Submit</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <h3>Banner Slider</h3>
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
                                            <th>Customer Details</th>
                                            <th>Service</th>
                                            <th>Is Assigned</th>
                                            <th>Timeslot</th>
                                            <th>Status</th>
                                            <th>Charges</th>
                                            <th>Scheduled On</th>
                                            <th>Serviced On</th>
                                            <th>Payment Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendingOrders as $pendingOrder)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <p>#{{ $pendingOrder->order_no }} </p>
                                                </td>
                                                <td>
                                                    <p>{{ $pendingOrder->user->name }}<br> +91{{ $pendingOrder->user->mobile }}<br> {{ $pendingOrder->user->email }}</p>
                                                </td>
                                                <td style="min-width: 150px">
                                                    @foreach ($pendingOrder->orderItems as $item)
                                                        <p>{{ $item->category->name }} :- {{ $item->subCategory->name }}</p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <p>{{ $pendingOrder->is_assigned == 1 ? "Assigned" : "Unassigned"}}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $pendingOrder->timeSlot->name }}</p>
                                                </td>
                                                <td>
                                                    <span class="badge bg-{{$pendingOrder->order_status_color}}"> {{ ucfirst($pendingOrder->order_status_text) }}</span>
                                                </td>
                                                <td style="min-width: 150px">
                                                    <p> Charges: ₹{{ $pendingOrder->charges }} <br> Service Chargebr: ₹{{ $pendingOrder->service_charge }} <br> GST Charge: ₹{{ $pendingOrder->gst_charge }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $pendingOrder->scheduled_no ?? "-" }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $pendingOrder->serviced_no ?? "-"}}</p>
                                                </td>
                                                <td style="min-width: 150px">
                                                    <p>Payment Type: {{ $pendingOrder->payment_type == 1 ? "Postpaid" : "Prepaid" }} <br> Payment Method: {{ $pendingOrder->payment_method == 1 ? "Online" : "Cash"}} <br> Payment Status:{{ $pendingOrder->payment_text}} </p>
                                                </td>
                                                <td>
                                                    @can('banner_sliders.edit')
                                                        <button class="edit-element btn btn-primary px-2 py-1" title="Edit bannerslider" data-id="{{ $bannerSlider->id }}"><i data-feather="edit"></i></button>
                                                    @endcan
                                                    @can('banner_sliders.delete')
                                                        <button class="btn btn-dark rem-element px-2 py-1" title="Delete bannerslider" data-id="{{ $bannerSlider->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('banner_sliders.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('banner_sliders.index') }}';
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
                title: "Are you sure to delete this address?",
                // text: "Make sure if you have filled Vendor details before proceeding further",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((justTransfer) => {
                if (justTransfer) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('banner_sliders.destroy', ':model_id') }}";

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
        var url = "{{ route('banner_sliders.edit', ':model_id') }}";

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
                    $("#editForm [name='bannerslider_id']").val(data.completedOrder.id);
                    $("#editForm #edit_image_section").html(data.bannerImgHtml);
                    $("#editForm [name='small_text']").val(data.completedOrder.small_text);
                    $("#editForm [name='main_black_text']").val(data.completedOrder.main_black_text);
                    $("#editForm [name='main_color_text']").val(data.completedOrder.main_color_text);
                    $("#editForm [name='text_color']").html(data.textColorHTML);
                    $("#editForm [name='offer_text']").val(data.completedOrder.offer_text);
                    $("#editForm [name='button_text']").val(data.completedOrder.button_text);
                    $("#editForm [name='button_color']").val(data.completedOrder.button_color);
                    $("#editForm [name='button_link']").val(data.completedOrder.button_link);
                    $("#editForm [name='status']").val(data.completedOrder.status);
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
            var url = "{{ route('banner_sliders.update', ':model_id') }}";
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
                            window.location.href = '{{ route('banner_sliders.index') }}';
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
