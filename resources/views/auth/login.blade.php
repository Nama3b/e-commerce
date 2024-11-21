<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link href="{{ asset('WebPage/img/home/tab_logo.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('WebPage/css/login.css') }}">

    <link rel="stylesheet" href="{{ asset('WebPage/resources/boostrap/bootstrap.min.js') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('WebPage/resources/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('WebPage/resources/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xs-6 col-lg-3">
                <a href="{{URL::to('/home')}}"><img src="{{ asset('WebPage/img/home/project_name.png') }}" alt="" width="100%"></a>
            </div>
            <hr>
        </div>
    </div>
</div>

@include('partials.popup')

<div class="body">
    <div class="container d-flex justify-content-center">
        <div class="form-input col-8 col-lg-5">
            <ul class="nav nav-tabs mb-3 mt-2 d-flex">
                <li class="col-6 text-center"><a data-toggle="tab" href="#signin">Sign In</a></li>
                <li class="col-6 text-center"><a data-toggle="tab" href="#signup">Sign Up</a></li>
            </ul>
            <a href="{{ URL::to('google/redirect') }}">
                <button class="btn btn-outline-dark mb-2">
                    <i class="fab fa-google mr-2"></i><b>Login with Google</b>
                </button>
            </a>
            <a href="{{ URL::to('login-facebook') }}">
                <button class="btn btn-outline-primary mb-2">
                    <i class="fab fa-facebook mr-2"></i><b>Login with Facebook</b>
                </button>
            </a>
            @yield('content')
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{ asset('index.js') }}"></script>

</body>
