<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trazenet | Registration</title>
    <link rel="shortcut icon" href="{{ asset('/images/' . optional($setting)->icon) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .loading-spin {
            position: absolute;
            z-index: 9999;
            left: 44%;
            top: 37%;
            display: none;
        }

        .loading-spin img {
            height: 100px;
            width: 100px;
        }

    </style>
</head>

<body class="hold-transition register-page">

    <div class="register-box col-md-8">
        <div class="register-logo">
            <strong style="font-weight: 700">Trazenet</strong> Register
        </div>

        <div class="card">
            <div class="loading-spin" id="spin">
                <img src="{{ asset('/loading.gif') }}" alt="">
            </div>
            <div class="card-body register-card-body" id="card-register">
                <p class="login-box-msg">Register a new account</p>

                <form id="register">
                    @csrf
                    <div class="row">

                        <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                            class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                            class="input-group mb-6">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="First name" name="f_name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div style="width:48% !important;margin-right:10px;margin-bottom:15px;" class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="Company Name" name="company">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                        </div>
                        <div style="width:48% !important;margin-bottom:15px;margin-left:20px;"
                            class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="Last name" name="l_name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                  
                        <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                            class="input-group mb-6">
                            <select class="form-control" name="price_plan_id" id="price_plan_id">
                                <option value="" selected="selected" hidden>Select service type</option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                            <input type="number" class="form-control" placeholder="Mobile number" name="phn">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group" style="width:48% !important;margin-left:20px;margin-bottom:15px;">
                            <select id="duration" name="duration" class="form-control">
                                <option value="" selected="selected" hidden>Select price plan duration</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Quarterly">Quarterly</option>
                                <option value="Annually">Annually</option>
                            </select>
                        </div>
                        {{-- <div style="width:48% !important;margin-bottom:15px;margin-right:20px;" class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="Address" name="address">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-address-card"></i>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div style="width:48% !important;margin-left:10px;margin-bottom:15px;"
                            class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="City" name="city">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-city"></i>
                                </div>
                            </div>
                        </div>
                        <div style="width:48% !important;margin-bottom:15px;margin-right:20px;" class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="State" name="state">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-flag"></i>
                                </div>
                            </div>
                        </div>
                        <div style="width:48% !important;margin-left:10px;margin-bottom:15px;"
                            class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="Country" name="country">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-flag"></i>
                                </div>
                            </div>
                        </div>
                        <div style="width:48% !important;margin-bottom:15px;margin-right:20px;" class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="Postal Code" name="post_code">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-mailbox"></i>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div style="width:48% !important;margin-bottom:15px;margin-right:20px;" class="input-group mb-6">
                            <input type="text" class="form-control" placeholder="Company Url" name="company_url">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="input-group mb-6"
                            style="width:48% !important;margin-bottom:15px;margin-left:10px;">
                            <input type="text" class="form-control" placeholder="IP number" name="ip">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-location"></span>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="input-group mb-6"
                            style="width:48% !important;margin-bottom:15px;margin-right:10px;">
                            <input type="text" class="form-control" placeholder="Position" name="position">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-location"></span>
                                </div>
                            </div>
                        </div> --}}
                        <div style="width:48% !important;margin-bottom:15px;margin-left:20px;">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <a href="{{ route('login') }}" class="text-center">I already have an account</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="payment" style="display: none;">
                <p style="font-size: 30px;padding:20px !important;" class="login-box-msg">You have to pay first.Select
                    payment gateway
                    <button type="button" onclick="stripeVisible()" class="btn btn-success">Stripe</button>
                    <button type="button" onclick="paypalVisible()" class="btn btn-primary">Paypal</button>
                </p>
                <div class="card-body" id="stripeForm" style="display: none;">
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-6 form-group required'>
                                <label class='control-label'>Username</label>
                                <input onkeyup="getVal(this.value)" name="username" placeholder="enter username"
                                    class='form-control' type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-6 form-group required'>
                                <label class='control-label'>Name Card</label>
                                <input name="c_name" placeholder="enter card name" class='form-control' size='4'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-6 form-group required'>
                                <label class='control-label'>Card Number</label>
                                <input name="c_number" placeholder="card number" autocomplete='off'
                                    class='form-control card-number' size='20' type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-6 form-group required'>
                                <label class='control-label'>CVC</label>
                                <input name="cvc" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                    size='4' type='text' required>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-6 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <input name="month" class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-6 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label>
                                <input name="year" class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' required>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='form-group col-md-12'>
                                <label class='control-label'>Package Name</label>
                                <input id="pack" name="package" placeholder="enter card name" class='form-control'
                                    readonly required>
                            </div>
                            <div class='form-group col-md-12'>
                                <label class='control-label'>Package Duration</label>
                                <input id="pack_dur" name="duration" placeholder="enter card name" class='form-control'
                                    readonly required>
                            </div>
                            <div class='form-group col-md-12'>
                                <label class='control-label'>Package Price</label>
                                <input id="pack_price" type="number" name="price" placeholder="enter card name"
                                    class='form-control' readonly required>
                            </div>
                        </div>
                        <input type="hidden" id="userId" name="userId" value="">
                        <div class="form-row row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" id="paypalForm" style="display: none;">
                    <form class="form-horizontal" method="POST" role="form" action="{{ route('paypal.post') }}">
                        @csrf
                        <div class='col-xs-12 col-md-6 form-group required'>
                            <label class='control-label'>Username</label>
                            <input onkeyup="getVal(this.value)" name="username" placeholder="enter username"
                                class='form-control' type='text' required>
                        </div>
                        <div class='form-group col-md-12'>
                            <label class='control-label'>Package Name</label>
                            <input id="p_pack" name="package" placeholder="enter card name" class='form-control'
                                readonly required>
                        </div>
                        <div class='form-group col-md-12'>
                            <label class='control-label'>Package Duration</label>
                            <input id="p_pack_dur" name="duration" placeholder="enter duration" class='form-control'
                                readonly required>
                        </div>
                        <div class='form-group col-md-12'>
                            <label class='control-label'>Package Price</label>
                            <input id="p_pack_price" name="amount" class='form-control' readonly required>
                        </div>

                        {{-- <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Enter Amount</label>
                            
                            <div class="col-md-12">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
    
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                        <input type="hidden" id="p_userId" name="userId" value="">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Pay With Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
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
            $('#register').validate({
                rules: {
                    username: {
                        required: true
                    },
                    f_name: {
                        required: true
                    },
                    l_name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phn: {
                        required: true,
                        digits: true
                    },
                    address: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    post_code: {
                        required: true
                    },
                    service_type: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
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
                    $("#card-register").css({
                        'opacity': '.4'
                    });
                    $.ajax({
                        url: "{{ route('user.store') }}",
                        method: "POST",
                        data: $('#register').serialize(),
                        success: function(res) {
                            $("#spin").hide();
                            $("#card-register").hide();
                            $("#payment").show();
                            Swal.fire({
                                icon: 'info',
                                title: 'You have must complete payment!'
                            })
                        },
                        error: function() {
                            $("#spin").hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'Email already taken',
                                text: 'Input unique email address.'
                            })
                        }
                    })
                }
            });

        });

        function getVal(value) {
            setTimeout(() => {
                $.ajax({
                    url: "{{ route('user') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        val: value
                    },
                    success: function(res) {
                        $("#pack").val(res.data.get_plan.name);
                        $("#pack_dur").val(res.data.duration);
                        $("#userId").val(res.data.id);
                        $("#p_userId").val(res.data.id);
                        $("#p_pack").val(res.data.get_plan.name);
                        $("#p_pack_dur").val(res.data.duration);

                        if (res.data.duration == 'Monthly') {
                            $("#pack_price").val(res.data.get_plan.monthly);
                            $("#p_pack_price").val(res.data.get_plan.monthly);
                        } else if (res.data.duration == 'Quarterly') {
                            $("#pack_price").val(res.data.get_plan.quarterly);
                            $("#p_pack_price").val(res.data.get_plan.quarterly);
                        } else if (res.data.duration == 'Annually') {
                            $("#pack_price").val(res.data.get_plan.annually);
                            $("#p_pack_price").val(res.data.get_plan.annually);
                        }

                    },
                    error: function() {
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Unknown Username'
                        // })
                    }
                })
            }, 3000);
        }

        function stripeVisible() {
            $("#stripeForm").show();
            $("#paypalForm").hide();
            $("#stripeForm").find(":input").prop("disabled", false);
            $("#paypalForm").find(":input").prop("disabled", true);
        }

        function paypalVisible() {
            $("#stripeForm").find(":input").prop("disabled", true);
            $("#paypalForm").find(":input").prop("disabled", false);
            $("#stripeForm").hide();
            $("#paypalForm").show()
        }

    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]',
                        'input[type=file]', 'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });

    </script>

</body>

</html>
