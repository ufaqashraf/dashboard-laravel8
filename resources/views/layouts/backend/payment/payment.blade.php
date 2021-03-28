@extends('layouts.backend.app')

@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="card col-md-6">
                    <div style="margin-left: 20px;" class="card-header">
                        <h3>
                            Select payment gateway
                            <button type="button" onclick="stripeVisible()" class="btn btn-success">Stripe</button>
                            <button type="button" onclick="paypalVisible()" class="btn btn-primary">Paypal</button>
                        </h3>
                    </div>
                    <div class="card-body" id="payment">
                        <div class="card-body" id="stripeForm" style="display: none;">
                            <form class="require-validation"
                                data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                id="payment-form">
                                @csrf
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-6 form-group required'>
                                        <label class='control-label'>Name Card</label>
                                        <input name="c_name" placeholder="enter card name" class='form-control' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-6 form-group required'>
                                        <label class='control-label'>Card Number</label>
                                        <input name="c_number" placeholder="card number" autocomplete='off'
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label>
                                        <input name="cvc" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                            size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label>
                                        <input name="month" class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label>
                                        <input name="year" class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='form-group col-md-12'>
                                        <label class='control-label'>Package Name</label>
                                        <input id="pack" name="package" placeholder="enter card name" class='form-control'
                                            readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label class='control-label'>Package Duration</label>
                                        <input id="pack_dur" name="duration" placeholder="enter card name" class='form-control'
                                            readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label class='control-label'>Package Price</label>
                                        <input id="pack_price" type="number" name="price" placeholder="enter card name"
                                            class='form-control' readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="userId" value="">
                                
                            </form>
                            <div class="form-row row">
                                <div class="col-xs-12">
                                    <button onclick="getNoti()" class="btn btn-primary btn-lg btn-block" type="button">Pay Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="paypalForm" style="display: none;">
                            <form class="form-horizontal">
                                @csrf
                                <div class='form-group col-md-12'>
                                    <label class='control-label'>Package Name</label>
                                    <input id="p_pack" name="package" placeholder="enter card name" class='form-control'
                                        readonly>
                                </div>
                                <div class='form-group col-md-12'>
                                    <label class='control-label'>Package Duration</label>
                                    <input id="p_pack_dur" name="duration" placeholder="enter duration" class='form-control'
                                        readonly>
                                </div>
                                <div class='form-group col-md-12'>
                                    <label class='control-label'>Package Price</label>
                                    <input id="p_pack_price" name="amount" class='form-control' readonly>
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

                                
                            </form>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button onclick="getNoti()" type="button" class="btn btn-primary">
                                        Pay With Paypal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@section('js')
    <script>
        function stripeVisible() {
            $("#stripeForm").show();
            $("#paypalForm").hide();
        }

        function paypalVisible() {
            $("#stripeForm").hide();
            $("#paypalForm").show()
        }
        
        function getNoti(){
            
            Swal.fire({
              title: 'Payment Faild!',
              text: "You have must choose any package!",
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Go to Price Plan'
            }).then((result) => {
                  window.location.href = "/price-plan";
              
            })
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
@endsection
@endsection
