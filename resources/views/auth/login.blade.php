<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link href="{{{'../WebPage/img/home/tab_logo.png'}}}" rel="icon">
    <link rel="stylesheet" href="{{{'../WebPage/css/login.css'}}}">

    <link rel="stylesheet" href="{{'../WebPage/resources/boostrap/bootstrap.min.js'}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{{'../WebPage/resources/fontawesome/css/all.css'}}}">
    <link rel="stylesheet" href="{{{'../WebPage/resources/font-awesome-4.7.0/css/font-awesome.min.css'}}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="header">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-3">
                <a href="{{URL::to('/home')}}"><img src="{{'../WebPage/img/home/project_name.png'}}" alt="" width="100%"></a>
            </div>
            <hr>
        </div>
    </div>
</div>

<div id="popup">
    <div class="popup-content">
        <span id="popup-message"></span><i class="far fa-check-circle"></i>
    </div>
</div>

<div class="body">
    <div class="container d-flex justify-content-center">
        <div class="form-input col-5">
            <ul class="nav nav-tabs mb-3 mt-2 d-flex">
                <li class="active col-6 text-center"><a data-toggle="tab" href="#home">Sign In</a></li>
                <li class="col-6 text-center"><a data-toggle="tab" href="#menu1">Sign Up</a></li>
            </ul>
            <a href="{{URL::to('login-google')}}">
                <button class="btn btn-outline-dark mb-2">
                    <i class="fab fa-google mr-2"></i><b>Continue with Google</b>
                </button>
            </a>
            <a href="{{URL::to('login-facebook')}}">
                <button class="btn btn-outline-primary mb-2">
                    <i class="fab fa-facebook mr-2"></i><b>Continue with Facebook</b>
                </button>
            </a>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert text-center" style="color:red">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
                    <form action="{{URL::to('/login')}}" method="post">
                        @csrf
                        <div class="error-item">
                            @foreach($errors->all() as $val)
                                <ul class="errors">
                                    <li><small>{{$val}}</small></li>
                                </ul>
                            @endforeach
                        </div>
                        <input type="text" name="email" placeholder="Email Address">
                        <input type="password" name="password" placeholder="Password">
                        <small class="text-right">Forgot Password?</small>
                        <button type="submit" class="btn btn-dark" name="login">Sign In</button>
                        <label for="policy"> <small>By signing in, you agree to the <b>Terms of Service</b>
                                and <b>Privacy Policy</b></small></label>
                    </form>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert text-center" style="color:red">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
                    <form action="{{ URL::to('/signup') }}" method="post">
                        @csrf
                        <div class="error-item">
                            @foreach($errors->all() as $val)
                                <ul class="errors">
                                    <li><small>{{$val}}</small></li>
                                </ul>
                            @endforeach
                        </div>
                        <input type="email" name="email" placeholder="Email" required>

                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="password_confirmation" placeholder="Password confirmation" required>
                        <input type="text" name="full_name" placeholder="Full name" required>
                        <input type="text" name="address" placeholder="Address" required>
                        <input type="text" name="phone_number" placeholder="Phone number" required>
                        <input type="date" name="birthday">
{{--                        <input type="file" name="avatar">--}}
                        <input type="hidden" name="avatar" value="../WebPage/img/home/logo.jpg">
                        <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        <div class="d-flex">
                            <input type="checkbox" class="checkbox" name="policy" checked>
                            <label for="policy"> <small>By signing up, you agree to the <b>Terms of Service</b>
                                    and <b>Privacy Policy</b></small></label>
                        </div>
                        <a href="{{ route('verification.verify', ['id' , 'hash']) }}"><button type="submit" class="btn btn-dark">Sign Up</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        var popup = document.getElementById("popup");
        var popupMessage = document.getElementById("popup-message");
        popupMessage.innerHTML = "{{ session('success') }}";

        function showElement() {
            popup.classList.add('fade-in');
            popup.style.display = 'block';
        }

        function hideElement() {
            popup.classList.remove('fade-in');
            popup.classList.add('fade-out');
            setTimeout(() => {
                popup.style.display = 'none';
                popup.classList.remove('fade-out');
            }, 1000);
        }

        function showForDuration(duration) {
            showElement();
            setTimeout(hideElement, duration);
        }

        showForDuration(1500);
    </script>
@endif

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
<script src="{{{'../WebPage/resources/js/index.js'}}}"></script>

</body>
