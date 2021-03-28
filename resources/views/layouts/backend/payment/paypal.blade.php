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
                    <h1>Payment Getway</h1>
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
                        <form class="form-horizontal" method="POST" role="form" action="{{route('paypal')}}" >
                            @csrf
    
                            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label for="amount" class="col-md-4 control-label">Enter Amount</label>
    
                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
    
                                    @if ($errors->has('amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Paywith Paypal
                                    </button>
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

@endsection
@endsection