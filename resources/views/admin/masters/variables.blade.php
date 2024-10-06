<x-admin.admin-layout>
    <x-slot name="title">{{ auth()->user()->tenant_name }} - Site Settings</x-slot>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">


                <!-- Add Form -->
                <div class="row" id="addContainer">
                    <div class="col-sm-12">
                        <div class="card">
                            <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="mb-3 row">

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="small_text">Is Service Charge Enable <span class="text-danger">*</span></label>
                                            <select name="is_service_charge_enable" id="is_service_charge_enable" class="form-control">
                                                <option value="false" {{ $isServiceChargeEnable == false ? 'selected' : '' }}>No</option>
                                                <option value="true" {{ $isServiceChargeEnable == true ? 'selected' : '' }}>Yes</option>
                                            </select>
                                            <span class="text-danger error-text is_service_charge_enable_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="service_charge">Service Charge <span class="text-danger">*</span></label>
                                            <input class="form-control" name="service_charge" value="{{ $serviceCharge }}" type="number" {{ $isServiceChargeEnable == false ? 'disabled' : '' }} placeholder="Enter Service Charge">
                                            <span class="text-danger error-text service_charge_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="small_text">Is GST Enable <span class="text-danger">*</span></label>
                                            <select name="is_gst_enable" id="is_gst_enable" class="form-control">
                                                <option value="false" {{ $isGstEnable == false ? 'selected' : '' }}>No</option>
                                                <option value="true" {{ $isGstEnable == true ? 'selected' : '' }}>Yes</option>
                                            </select>
                                            <span class="text-danger error-text is_gst_enable_err"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="gst_percentage">GST Charge <span class="text-danger">*</span></label>
                                            <input class="form-control" name="gst_percentage" value="{{ $gstPercentage }}" type="number" {{ $isGstEnable == false ? 'disabled' : '' }} placeholder="Enter GST Charge">
                                            <span class="text-danger error-text gst_percentage_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="schedule_same_day_if_booked_before">Schedule Same Day If Booked Before <span class="text-danger">*</span></label>
                                            <input class="form-control" name="schedule_same_day_if_booked_before" value="{{ $scheduleSameDayIfBookedBefore->format('H:i:s') }}" type="time" placeholder="Enter GST Charge">
                                            <span class="text-danger error-text schedule_same_day_if_booked_before_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="max_discount_percent">Maximum Discount Percentage <span class="text-danger">*</span></label>
                                            <input class="form-control" name="max_discount_percent" value="{{ $maxDiscountPercent }}" type="number" placeholder="Enter Max Discont Percentage">
                                            <span class="text-danger error-text max_discount_percent_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="footer_address">Footer Address <span class="text-danger">*</span></label>
                                            <input class="form-control" name="footer_address" value="{{ $footerAddress }}" type="text" placeholder="Enter Footer Address">
                                            <span class="text-danger error-text footer_address_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="footer_phone">Footer Phone <span class="text-danger">*</span></label>
                                            <input class="form-control" name="footer_phone" value="{{ $footerPhone }}" type="text" placeholder="Enter Footer Phone">
                                            <span class="text-danger error-text footer_phone_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="footer_hours">Footer Hours <span class="text-danger">*</span></label>
                                            <input class="form-control" name="footer_hours" value="{{ $footerHours }}" type="text" placeholder="Enter Working Hours">
                                            <span class="text-danger error-text footer_hours_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="support_email">Footer Email <span class="text-danger">*</span></label>
                                            <input class="form-control" name="support_email" value="{{ $supportEmail }}" type="text" placeholder="Enter Support Email">
                                            <span class="text-danger error-text support_email_err"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label" for="header_logo">Website Logo </label>
                                            <input class="form-control" name="header_logo" type="file" accept="image/*">
                                            <span class="text-danger error-text header_logo_err"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="card mt-3 mb-0">
                                                <div class="card-body p-1">
                                                    <img src="{{ asset($headerLogo) }}" class="img-fluid" alt="logo">
                                                </div>
                                            </div>
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

            </div>
        </div>
    </div>


</x-admin.admin-layout>

{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('variables.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('variables.index') }}';
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
