@extends('layouts.backend.app')
<style>
    .payment-title{
        position: absolute;
        z-index: 9999;
        margin-left: 24rem;
        margin-top: 2rem;
    }
</style>
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
            <h1 class="payment-title">Payment Successfull!</h1>
            <img style="margin-left: 195px;position: relative;" height="525" width="60%" src="{{asset('/success.gif')}}" alt="">
        </div>
    </section>
</div>
@endsection
