<x-admin.admin-layout>
    <x-slot name="title">{{ auth()->user()->tenant_name }} - Main Categories</x-slot>

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
                                            <label class="col-form-label" for="category_id">Select Category <span class="text-danger">*</span></label>
                                            <select class="form-select" name="category_id" id="category_id">
                                                <option value="">Select a category</option>
                                                @foreach ($categories as $category)
                                                    <option class="dropdown-item" value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text category_id_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="name">SubCategory Name <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter Category Name">
                                            <span class="text-danger error-text name_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="image">SubCategory Image <span class="text-danger">*</span></label>
                                            <input class="form-control" id="image" name="image" type="file" placeholder="Choose Category Image">
                                            <span class="text-danger error-text image_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="min_price">Min Price <span class="text-danger">*</span></label>
                                            <input class="form-control" id="min_price" name="min_price" type="number" placeholder="Enter Minimum Price">
                                            <span class="text-danger error-text min_price_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <label class="col-form-label" for="description">SubCategory Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                            <span class="text-danger error-text description_err"></span>
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
                                    <h4 class="card-title">Edit SubCategory</h4>
                                </header>

                                <div class="card-body py-2">
                                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="category_id">Select Category <span class="text-danger">*</span></label>
                                            <select class="form-select" name="category_id" id="category_id">
                                                <option value="">Select a category</option>
                                                @foreach ($categories as $category)
                                                    <option class="dropdown-item" value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text category_id_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="name">SubCategory Name <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter Category Name">
                                            <span class="text-danger error-text name_err"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-form-label" for="image">SubCategory Image <span class="text-danger">*</span></label>
                                            <input class="form-control" id="image" name="image" type="file" placeholder="Choose Category Image">
                                            <span class="text-danger error-text image_err"></span>
                                        </div>
                                        <div class="col-md-1" id="edit_image_section">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="min_price">Min Price <span class="text-danger">*</span></label>
                                            <input class="form-control" id="min_price" name="min_price" type="number" placeholder="Enter Minimum Price">
                                            <span class="text-danger error-text min_price_err"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <label class="col-form-label" for="edit_description">SubCategory Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="edit_description" id="edit_description" cols="30" rows="10"></textarea>
                                            <span class="text-danger error-text edit_description_err"></span>
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

                        <h3>SubCategories</h3>

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
                            @can('categories.create')
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
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <p> {{ $subcategory->category->name }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $subcategory->name }} </p>
                                                </td>
                                                <td>
                                                    <p> {{ $subcategory->min_price }} </p>
                                                </td>
                                                <td>
                                                    <img src="{{ $subcategory->image }}" style="max-width: 100px; max-height: 100px;" alt="subcategory_img">
                                                </td>
                                                <td>
                                                    <p> {{ Str::limit(htmlspecialchars_decode($subcategory->description), 80) }} </p>
                                                </td>
                                                <td>
                                                    @can('categories.edit')
                                                        <button class="edit-element btn btn-primary px-2 py-1" title="Edit category" data-id="{{ $subcategory->id }}"><i data-feather="edit"></i></button>
                                                    @endcan
                                                    @can('categories.delete')
                                                        <button class="btn btn-dark rem-element px-2 py-1" title="Delete category" data-id="{{ $subcategory->id }}"><i data-feather="trash-2"></i> </button>
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
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('subcategories.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('subcategories.index') }}';
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
                    var url = "{{ route('subcategories.destroy', ':model_id') }}";

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
        var url = "{{ route('subcategories.edit', ':model_id') }}";

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
                    $("#editForm select[name='category_id']").html(data.categoryHtml);
                    $("#editForm input[name='subcategory_id']").val(data.subcategory.id);
                    $("#editForm input[name='name']").val(data.subcategory.name);
                    $("#editForm #edit_image_section").html(data.subcategoryImgHtml);
                    CKEDITOR.instances['edit_description'].setData(data.subcategory.description);
                    $("#editForm input[name='min_price']").val(data.subcategory.min_price);

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
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('subcategories.update', ':model_id') }}";
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
                            window.location.href = '{{ route('subcategories.index') }}';
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


<script>
    let categoryId = $('#addForm ')
    var editor = CKEDITOR.replace('description', {
        extraPlugins: 'filebrowser',
        extraPlugins: 'youtube',
        filebrowserBrowseUrl: 'browser?type=Images',
        filebrowserUploadMethod: "form",
        filebrowserUploadUrl: "{{ route('upload-ck-image', ['_token' => csrf_token()]) }}"
    });

    var editor = CKEDITOR.replace('edit_description', {
        extraPlugins: 'filebrowser',
        extraPlugins: 'youtube',
        filebrowserBrowseUrl: 'browser.php?type=Images',
        filebrowserUploadMethod: "form",
        filebrowserUploadUrl: "{{ route('upload-ck-image', ['_token' => csrf_token()]) }}"
    });
</script>
