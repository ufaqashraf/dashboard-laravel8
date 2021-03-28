<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trazenet | Log In</title>
    <link rel="shortcut icon" href="{{asset('/images/')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .payment-title{
            position: absolute;
            z-index: 9999;
        }
    </style>
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="row">
                    <h1 class="payment-title">Payment Successfull!</h1>
                    <h4 style="margin-top:96px;">Check You mail for account verification.</h4>
                    <img style="    margin-left: 50px;
                    position: relative;
                    height: 168px;" width="60%" src="{{asset('/success.gif')}}" alt="">
                    <a href="{{route('login')}}">Go Back To Login</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
</body>

</html>


