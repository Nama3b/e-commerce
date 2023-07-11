@extends('layout')
@section('content')

    <div class="payment-body">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1><b>THANK YOU FOR SHOPPING IN OUR SERVICE!</b></h1>
                    <h4><b>Order successfully !</b></h4>
                    <i class="far fa-check-circle" style="font-size: 50px; color: green"></i>
                </div>
                <a href="{{URL::to('/product')}}">
                    <button class="btn btn-dark">Continue to shopping</button>
                </a>
            </div>
        </div>
    </div>

@endsection
