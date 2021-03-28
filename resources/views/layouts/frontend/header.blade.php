<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trazenet | Prevent, Burst Fraud</title>
    
    <meta name="{{optional($setting)->meta_name}}"content="{{optional($setting)->meta_des}}">
    <link rel="shortcut icon" href="{{asset('/images/'.optional($setting)->icon)}}">
    <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        /*.user-details {position: relative; padding: 0;}*/
        .user-details .user-image {
            /*position: relative;  z-index: 1; width: 100%;*/
            text-align: center;
            margin-bottom: -20px;
        }

        .user-image img {
            clear: both;
            margin: auto;
            position: relative;
            border: 2px solid green;
        }

        .user-details .user-info-block {
            width: 100%;
            /*position: absolute;*/
            top: 55px;
            background: rgb(255, 255, 255);
            z-index: 0;
            padding-top: 35px;
            border: 2px solid green;
            height: 300px;
        }

        .user-info-block .user-heading {
            width: 100%;
            text-align: center;
            margin: 10px 0 0;
        }

        .user-info-block .navigation {
            float: left;
            width: 100%;
            margin: 0;
            padding: 0;
            list-style: none;
            border-bottom: 1px solid #428BCA;
            border-top: 1px solid #428BCA;
        }

        .navigation li {
            float: left;
            margin: 0;
            padding: 0;
        }

        .navigation li a {
            padding: 20px 30px;
            float: left;
        }

        .navigation li.active a {
            background: #428BCA;
            color: #fff;
        }

        .user-info-block .user-body {
            /*float: left;*/
            padding: 5%;
            /*width: 90%;*/
        }

        .user-body .tab-content>div {
            float: left;
            width: 100%;
        }

        .user-body .tab-content h4 {
            width: 100%;
            margin: 10px 0;
            color: #333;
        }

        .tab-content h2,
        p {
            text-align: center;
        }

        .navbar-default .navbar-brand {
            margin: unset;
        }

        @media (min-width: 768px) {
            .navbar-right {
                margin-top: 8px;
            }
        }
    </style>
</head>

<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img width="65px" height="65px" src="{{asset('/images/'.optional($setting)->logo)}}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#organisations">About</a></li>
                    <li><a href="#feature">Services</a></li>
                    <li><a href="#cta-2">Contact</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="{{ route('demo') }}">Demo</a></li>

                    <!-- <li><a href="#" data-target="#login" data-toggle="modal">Log In</a></li> -->
                    <li><a href="{{ route('login') }}">Log In</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Modal box-->
    {{-- <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content no 1-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center form-title">Login</h4>
                </div>
                <div class="modal-body padtrbl">

                    <div class="login-box-body">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <div class="form-group">
                            <form name="" id="loginForm">
                                <div class="form-group has-feedback">
                                    <!----- username -------------->
                                    <input class="form-control" placeholder="Username" id="loginid" type="text"
                                        autocomplete="off" />
                                    <span
                                        style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
                                        id="span_loginid"></span>
                                    <!---Alredy exists  ! -->
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <!----- password -------------->
                                    <input class="form-control" placeholder="Password" id="loginpsw" type="password"
                                        autocomplete="off" />
                                    <span
                                        style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
                                        id="span_loginpsw"></span>
                                    <!---Alredy exists  ! -->
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkbox icheck">
                                            <label>
                                                <input type="checkbox" id="loginrem"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <a href="{{ route('login') }}" class="btn btn-green btn-block btn-flat">Sign In</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}





