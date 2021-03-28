@extends('layouts.backend.app')
<style>
    .loading-spin{
        position: absolute;
        z-index: 9999;
        left: 22%;
        top: 33%;
        display: none;
    }
    .loading-spin img{
        height:-1%;
        width: 55%;
    }
</style>
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment Gateway</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div id="planForm" class="card" style="width: 50% !important;position: relative;">
                    <div class="card-header" style="background: #007bff">
                        <h3 class="card-title" style="color: #fff">Payment Info</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf
                            <div class='form-row row'>
                               <div class='col-xs-12 col-md-6 form-group required'>
                                  <label class='control-label'>Name on Card</label> 
                                  <input class='form-control' size='4' type='text'>
                               </div>
                               <div class='col-xs-12 col-md-6 form-group required'>
                                  <label class='control-label'>Card Number</label> 
                                  <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                               </div>                           
                            </div>                        
                            <div class='form-row row'>
                               <div class='col-xs-12 col-md-4 form-group cvc required'>
                                  <label class='control-label'>CVC</label> 
                                  <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                               </div>
                               <div class='col-xs-12 col-md-4 form-group expiration required'>
                                  <label class='control-label'>Expiration Month</label> 
                                  <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                               </div>
                               <div class='col-xs-12 col-md-4 form-group expiration required'>
                                  <label class='control-label'>Expiration Year</label> 
                                  <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                               </div>
                            </div>
                          {{-- <div class='form-row row'>
                             <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                   again.
                                </div>
                             </div>
                          </div> --}}
                            <div class="form-row row">
                               <div class="col-xs-12">
                                  <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                               </div>
                            </div>
                         </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>
@section('js')
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