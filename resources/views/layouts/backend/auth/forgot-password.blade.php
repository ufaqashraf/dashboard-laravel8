<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trazenet | Forgot Password</title>
    <link rel="shortcut icon" href="#">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <style>
    .loading-spin {
        position: absolute;
        z-index: 9999;
        left: 44%;
        top: 43%;
        display: none;
    }

    .loading-spin img {
        height: 50px;
        width: 50px;
    }

</style>
</head>

<body class="hold-transition login-page">

    <div class="login-box">

        <div class="login-logo">
            <a href="#"><b style="font-weight: 700">Forgot Password</b></a>
        </div>
        <div class="card">
            <div class="loading-spin" id="spin">
                <img src="{{ asset('/loading.gif') }}" alt="">
            </div>
            <div class="card-body login-card-body" id="card">

                <form id="forgot-password">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="enter your Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Update Now</button>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center">Back To Login</a>
                </p>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

    </script>
    <script>
        $(document).ready(function() {
            $('#forgot-password').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $("#spin").show();
                    $("#card").css({
                        'opacity': '.4'
                    });
                    $.ajax({
                        url: "{{ route('reset.pass.email.verify') }}",
                        method: "POST",
                        data: $('#forgot-password').serialize(),
                        success: function(res) {
                            
                            $("#spin").hide();
                            window.location.href = '/login';
                            Swal.fire({
                                icon: 'success',
                                title: 'Check Email',
                                text: 'Password Reset Link send to your email'
                            })
                        },
                        error: function() {
                            $("#spin").hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'Email Not Match',
                                text: 'Input correct email'
                            })
                        }
                    })
                }
            })

        });

    </script>
</body>

</html>
