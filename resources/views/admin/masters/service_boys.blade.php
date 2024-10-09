<x-admin.admin-layout>
    <x-slot name="title">{{ auth()->user()->tenant_name }} - Service Boy</x-slot>

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
                                        <!-- Name -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                            <input class="form-control" name="name" type="text" required>
                                            <span class="text-danger error-text name_err"></span>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" name="email" type="email" required>
                                            <span class="text-danger error-text email_err"></span>
                                        </div>

                                        <!-- Mobile -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                                            <input class="form-control" name="mobile" type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                                            <span class="text-danger error-text mobile_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Password -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                            <input class="form-control" name="password" type="password" required>
                                            <span class="text-danger error-text password_err"></span>
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                            <input class="form-control" name="confirm_password" type="confirm_password" required>
                                            <span class="text-danger error-text confirm_password_err"></span>
                                        </div>

                                        <!-- Employee Code -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="emp_code">Employee Code <span class="text-danger">*</span></label>
                                            <input class="form-control" name="emp_code" type="text" required>
                                            <span class="text-danger error-text emp_code_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Gender -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="gender">Gender <span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <span class="text-danger error-text gender_err"></span>
                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="dob">Date of Birth <span class="text-danger">*</span></label>
                                            <input class="form-control" name="dob" type="date" required>
                                            <span class="text-danger error-text dob_err"></span>
                                        </div>

                                        <!-- Date of Joining -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="doj">Date of Joining <span class="text-danger">*</span></label>
                                            <input class="form-control" name="doj" type="date" required>
                                            <span class="text-danger error-text doj_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Address -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="address">Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="address" rows="3" required></textarea>
                                            <span class="text-danger error-text address_err"></span>
                                        </div>
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
                                    <h4 class="card-title">Edit Service Boy</h4>
                                </header>

                                <div class="card-body py-2">
                                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">


                                    <div class="mb-3 row">
                                        <!-- Name -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="name">Name</label>
                                            <input class="form-control" name="name" type="text">
                                            <span class="text-danger error-text name_err"></span>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="email">Email</label>
                                            <input class="form-control" name="email" type="email">
                                            <span class="text-danger error-text email_err"></span>
                                        </div>

                                        <!-- Mobile -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="mobile">Mobile</label>
                                            <input class="form-control" name="mobile" type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10">
                                            <span class="text-danger error-text mobile_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Employee Code -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="emp_code">Employee Code</label>
                                            <input class="form-control" name="emp_code" type="text">
                                            <span class="text-danger error-text emp_code_err"></span>
                                        </div>
                                        <!-- Gender -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="gender">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <span class="text-danger error-text gender_err"></span>
                                        </div>
                                        <!-- Date of Birth -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="dob">Date of Birth</label>
                                            <input class="form-control" name="dob" type="date">
                                            <span class="text-danger error-text dob_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Date of Joining -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="doj">Date of Joining</label>
                                            <input class="form-control" name="doj" type="date">
                                            <span class="text-danger error-text doj_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <span class="text-danger error-text status_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Address -->
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="address">Address</label>
                                            <textarea class="form-control" name="address" rows="3" style="resize: none"> </textarea>
                                            <span class="text-danger error-text address_err"></span>
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
                        <h3>Service Boy</h3>
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
                            @can('service_boys.create')
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Employee Code</th>
                                            <th>Gender</th>
                                            <th>Date Of Birth</th>
                                            <th>Date Of Join</th>
                                            <th>Rating</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Assign Category</th>
                                            <th>Assign Pincodes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($serviceBoys as $serviceBoy)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <p> {{ ucfirst($serviceBoy->name) }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $serviceBoy->email }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $serviceBoy->mobile }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $serviceBoy->serviceBoy->emp_code ?? 'Null' }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ ucfirst($serviceBoy->serviceBoy->gender ?? 'Null') }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $serviceBoy->serviceBoy->dob ?? 'Null' }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $serviceBoy->serviceBoy->doj ?? 'Null' }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $serviceBoy->serviceBoy->avg_rating ?? 'Null' }} </p>
                                                </td>
                                                <td>
                                                    <p>{{ Str::limit($serviceBoy->serviceBoy->address ?? 'Null', 80) }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $serviceBoy->serviceBoy ? ($serviceBoy->serviceBoy->status == 1 ? 'Active' : 'Inactive') : 'Null' }}</p>
                                                </td>
                                                <td style="min-width:130px">
                                                    <button class="assign-services btn btn-warning px-2 py-1" title="Assign Services" data-id="{{ $serviceBoy->id }}"><i data-feather="award"></i>Add Service</button>
                                                </td>
                                                <td style="min-width:130px">
                                                    <button class="assign-pincodes btn btn-success px-2 py-1" title="Assign Pincodes" data-id="{{ $serviceBoy->id }}"><i data-feather="check-circle"></i>Add Pincode</button>
                                                </td>
                                                <td>
                                                    @can('service_boys.edit')
                                                        <button class="edit-element btn btn-primary px-2 py-1" title="Edit service_boys" data-id="{{ $serviceBoy->id }}"><i data-feather="edit"></i></button>
                                                    @endcan
                                                    @can('service_boys.delete')
                                                        <button class="btn btn-dark rem-element px-2 py-1" title="Delete service_boys" data-id="{{ $serviceBoy->id }}"><i data-feather="trash-2"></i> </button>
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
    <div class="modal fade" id="assign-services-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="assignServicesForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Services</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="service_user_id" name="service_user_id" value="">

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="name">Service Boy Name : </label>
                            <div class="col-sm-9">
                                <h6 id="role_user_name" class="pt-2"></h6>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="name">Services : </label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single" id="services" multiple name="services[]">
                                    <option value="">--Select Services--</option>
                                </select>
                                <span class="text-danger error-text services_err"></span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="assignServicesSubmit" type="submit">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- Assign Pincodes Modal --}}
    <div class="modal fade" id="assign-pincodes-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="assignPincodesForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Pincodes</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="pincode_user_id" name="pincode_user_id" value="">

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="name">Pincode Boy Name : </label>
                            <div class="col-sm-9">
                                <h6 id="pincode_user_name" class="pt-2"></h6>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="name">Pincodes : </label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single" id="pincodes" multiple name="pincodes[]">
                                    <option value="">--Select Pincodes--</option>
                                </select>
                                <span class="text-danger error-text pincodes_err"></span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="assignPincodesSubmit" type="submit">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-admin.admin-layout>

<!-- Open Assign Services Modal-->
<script>
    $("#datatable-tabletools").on("click", ".assign-services", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('service_boys.show-services', ':model_id') }}";
        $('#services_user_id').val(model_id);

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                if (!data.error) {
                    $("#assignServicesForm input[name='service_user_id']").val(model_id);
                    $('#assignServicesForm #services').val([/* array of values */]).trigger('change');

                    $("#assignServicesForm #services").html(data.servicesHtml);
                    $("#assignServicesForm #role_user_name").text(data.user.name);
                    $('#assign-services-modal').modal('show');
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
    $("#assignServicesForm").submit(function(e) {
        e.preventDefault();
        $("#assignServicesSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        formdata.append('_method', 'PUT');
        var model_id = $('#service_user_id').val();
        var url = "{{ route('service_boys.update-services', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#assignServicesSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        $("#assign-services-modal").modal('hide');
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#assignServicesSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#assignServicesSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

        function resetErrors() {
            var form = document.getElementById('assignServicesForm');
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


<!-- Open Assign Pincodes Modal-->
<script>
    $("#datatable-tabletools").on("click", ".assign-pincodes", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('service_boys.edit', ':model_id') }}";
        $('#pincodes_user_id').val(model_id);

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                if (!data.error) {
                    $("#assignPincodesForm input[name='pincode_user_id']").val(model_id);
                    $("#assignPincodesForm #pincodes").html(data.pincodesHtml);
                    $("#assignPincodesForm #pincode_user_name").text(data.serviceBoy.name);
                    $('#assign-pincodes-modal').modal('show');
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


<!-- Update Service Boy Pincodes -->
<script>
    $("#assignPincodesForm").submit(function(e) {
        e.preventDefault();
        $("#assignPincodesSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        formdata.append('_method', 'PUT');
        var model_id = $('#pincode_user_id').val();
        var url = "{{ route('service_boys.update-pincode', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#assignPincodesSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        $("#assign-pincodes-modal").modal('hide');
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#assignPincodesSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#assignPincodesSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

        function resetErrors() {
            var form = document.getElementById('assignPincodesForm');
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


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('service_boys.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('service_boys.index') }}';
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
                    var url = "{{ route('service_boys.destroy', ':model_id') }}";

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
{{-- <script>
    $("#datatable-tabletools").on("click", ".edit-element", function(e) {
        e.preventDefault();
        $(".edit-element").show();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('service_boys.edit', ':model_id') }}";

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
                    $("#editForm [name='ctasection_id']").val(data.serviceBoy.id);
                    $("#editForm #edit_image_section").html(data.crtImgHtml);
                    $("#editForm [name='small_text']").val(data.serviceBoy.small_text);
                    $("#editForm [name='main_text']").val(data.serviceBoy.main_text);
                    $("#editForm [name='button_text']").val(data.serviceBoy.button_text);
                    $("#editForm [name='button_color']").val(data.serviceBoy.button_color);
                    $("#editForm [name='button_link']").val(data.serviceBoy.button_link);
                    $("#editForm [name='status']").val(data.serviceBoy.status);
                } else {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script> --}}

<script>
    $("#datatable-tabletools").on("click", ".edit-element", function(e) {
        e.preventDefault();
        $(".edit-element").show();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('service_boys.edit', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();

                if (!data.error) {
                    // Populate form with the returned data
                    $("#editForm [name='edit_model_id']").val(data.serviceBoy.id); // Hidden field
                    $("#editForm [name='name']").val(data.serviceBoy.name);
                    $("#editForm [name='email']").val(data.serviceBoy.email);
                    $("#editForm [name='mobile']").val(data.serviceBoy.mobile);
                    $("#editForm [name='emp_code']").val(data.serviceBoy.service_boy.emp_code);
                    $("#editForm [name='dob']").val(data.serviceBoy.service_boy.dob);
                    $("#editForm [name='doj']").val(data.serviceBoy.service_boy.doj);
                    $("#editForm [name='status']").val(data.serviceBoy.service_boy.status);
                    $("#editForm [name='address']").val(data.serviceBoy.service_boy.address);
                    $("#editForm [name='gender']").replaceWith(data.genderHtml);
                } else {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Something went wrong");
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
            var url = "{{ route('service_boys.update', ':model_id') }}";
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
                            window.location.href = '{{ route('service_boys.index') }}';
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
