<x-customer.layout>

    <main class="main">
        <section class="mt-50 mb-50">

            <div class="container">
                <div class="row p-2">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row login-card login-border-20">
                            <div class="col-lg-6 d-none d-lg-block p-0">
                                <img class="img-fluid h-100 login-border-20" src="{{ asset('customer/assets/imgs/banner/login.png') }}" alt="">
                            </div>
                            <div class="col-lg-6 col-md-8 p-md-0 pt-3 d-flex justify-content-center align-items-center">
                                <div class="widget-taber-content w-100 pe-md-3">
                                    <div class="padding_eight_all">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Forget Password</h1>
                                            <p class="mb-30">Don't have an account? <a href="{{ route('customer.register') }}">Create here</a></p>
                                        </div>

                                        <livewire:customer.forgot-password/>

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
            $("#loginForm").submit(function(e) {
                e.preventDefault();

                $("#loginFormSubmit").prop('disabled', true);
                var formdata = new FormData(this);
                $.ajax({
                    url: '{{ route('customer.signin') }}',
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (!data.error && !data.error2) {
                            if (data.user_type == 'User')
                                window.location.href = data.previous_url;
                            else
                                window.location.href = '{{ route('dashboard') }}';
                        } else {
                            $("#loginFormSubmit").prop('disabled', false);
                            if (data.error2) {
                                Swal.fire({
                                    title: "Error!",
                                    text: data.error2,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            } else {
                                resetErrors();
                                printErrMsg(data.error);
                            }
                        }
                    },
                    error: function(error) {
                        $("#loginFormSubmit").prop('disabled', false);
                        Swal.fire({
                            title: "Error occured!",
                            text: "Something went wrong please try again",
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    },
                });

                function resetErrors() {
                    var form = document.getElementById('loginForm');
                    var data = new FormData(form);
                    for (var [key, value] of data) {
                        console.log(key, value)
                        $('.' + key + '_err').text('');
                        $('#' + key).removeClass('is-invalid');
                        $('#' + key).addClass('is-valid');
                    }
                }

                function printErrMsg(msg) {
                    $.each(msg, function(key, value) {
                        console.log(key);
                        $('.' + key + '_err').text(value);
                        $('#' + key).addClass('is-invalid');
                    });
                }

            });
        </script>
    @endpush

</x-customer.layout>
