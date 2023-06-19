<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link href="{{{'../WebPage/img/home/tab_logo.png'}}}" rel="icon">
    <link rel="stylesheet" href="{{{'../WebPage/css/login.css'}}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{{'public/front-end/assets/fontawesome/css/all.css'}}}">
    <link rel="stylesheet" href="{{{'../WebPage/resources/font-awesome-4.7.0/css/font-awesome.min.css'}}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="header">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-3">
                <img src="{{'../WebPage/img/home/project_name.png'}}" alt="" width="100%">
            </div>
            <hr>
        </div>
    </div>
</div>

<div class="body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="form-input">
                    <ul class="nav nav-tabs mb-3 d-flex">
                        <li class="active col-6 text-center"><a data-toggle="tab" href="#home">Sign Up</a></li>
                        <li class="col-6 text-center"><a data-toggle="tab" href="#menu1">Log In</a></li>
                    </ul>
                    <a href="{{URL::to('login-google')}}">
                        <button class="btn btn-outline-dark mb-2">
                            <i class="fab fa-google mr-2"></i>Continue with Google
                        </button>
                    </a>
                    <a href="{{URL::to('login-facebook')}}">
                        <button class="btn btn-outline-dark mb-2">
                            <i class="fab fa-facebook mr-2"></i>Continue with Facebook
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
                            <form method="post" action="{{URL::to('/create-client')}}">
                                {{csrf_field()}}
                                <div class="error-item">
                                    @foreach($errors->all() as $val)
                                        <ul class="errors">
                                            <li><small>{{$val}}</small></li>
                                        </ul>
                                    @endforeach
                                </div>
                                <input type="text" name="client_fullname" placeholder="Client name">
                                <input type="text" name="client_email" placeholder="Email">
                                <input type="password" name="password" placeholder="Password">
                                <input type="text" name="client_phonenumber" placeholder="Phonenumber">
                                <input type="text" name="client_address" placeholder="Address">
                                <div class="d-flex">
                                    <input type="checkbox" class="checkbox" name="policy" value="">
                                    <label for="policy"> <small>By signing up, you agree to the <b>Terms of Service</b>
                                            and <b>Privacy Policy</b></small></label>
                                </div>
                                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                <br/>
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block">
                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                    </span>
                                @endif
                                <button type="submit" class="btn btn-dark">Sign Up</button>
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
                            <form action="{{URL::to('/login-client')}}" method="post">
                                {{csrf_field()}}
                                <div class="error-item">
                                    @foreach($errors->all() as $val)
                                        <ul class="errors">
                                            <li><small>{{$val}}</small></li>
                                        </ul>
                                    @endforeach
                                </div>
                                <input type="text" name="client_email" placeholder="Email Address">
                                <input type="password" name="password" placeholder="Password">
                                <small class="text-right">Forgot Password?</small>
                                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                <br/>
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block">
                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                    </span>
                                @endif
                                <button class="btn btn-dark" name="login">Sign Up</button>
                                <small>By signing up, you agree to the <b>Terms of Service</b> and <b>Privacy Policy</b></small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
