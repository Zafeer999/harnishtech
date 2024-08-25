<x-admin.admin-layout>
    <x-slot name="title">{{ auth()->user()->tenant_name }} - Documents</x-slot>

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
                                            <label class="col-form-label" for="name">Document Name <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter Document Name">
                                            <span class="text-danger error-text name_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="is_required">Is Required <span class="text-danger">*</span></label>
                                            <select class="form-select" name="is_required" id="is_required">
                                                <option value="">Select a option</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <span class="text-danger error-text is_required_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-select" name="status" id="status">
                                                <option value="">Select a Status</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
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
                                    <h4 class="card-title">Edit Document</h4>
                                </header>

                                <div class="card-body py-2">

                                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                                    <div class="mb-3 row">
                                        <div class="mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label" for="name">Document Name <span class="text-danger">*</span></label>
                                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter Document Name">
                                                <span class="text-danger error-text name_err"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label" for="is_required">Is Required <span class="text-danger">*</span></label>
                                                <select class="form-select" name="is_required" id="is_required">
                                                    <option value="">Select an option</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                <span class="text-danger error-text is_required_err"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label" for="status">Status <span class="text-danger">*</span></label>
                                                <select class="form-select" name="status" id="status">
                                                    <option value="">Select a status</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                <span class="text-danger error-text status_err"></span>
                                            </div>
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

                        <h3>Documents</h3>

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
                            @can('documents.create')
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
                                            <th>Document Name</th>
                                            <th>Is Required</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $document)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong> {{ $document->name }} </strong>
                                                </td>
                                                <td>
                                                    <strong> {{ $document->is_required }} </strong>
                                                </td>
                                                <td>
                                                    <strong> {{ $document->status }} </strong>
                                                </td>
                                                <td>
                                                    @can('documents.edit')
                                                        <button class="edit-element btn btn-primary px-2 py-1" title="Edit document" data-id="{{ $document->id }}"><i data-feather="edit"></i></button>
                                                    @endcan
                                                    @can('documents.delete')
                                                        <button class="btn btn-dark rem-element px-2 py-1" title="Delete document" data-id="{{ $document->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('documents.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('documents.index') }}';
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
                    var url = "{{ route('documents.destroy', ':model_id') }}";

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
        var url = "{{ route('documents.edit', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();

                if (!data.error) {
                    $("#editForm input[name='edit_model_id']").val(model_id);
                    $("#editForm input[name='timeslot_id']").val(data.document.id);
                    $("#editForm input[name='name']").val(data.document.name);
                    $("#editForm select[name='is_required']").html(data.isRequiredHTML);
                    $("#editForm select[name='status']").html(data.statusHTML);
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
            var url = "{{ route('documents.update', ':model_id') }}";
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
                            window.location.href = '{{ route('documents.index') }}';
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
