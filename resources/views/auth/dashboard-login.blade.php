<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Login</title>
    <link href="{{{'../Dashboard/img/tab_logo.png'}}}" rel="icon">
    <link rel="stylesheet" href="{{{'../Dashboard/css/dashboard-login.css'}}}">

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
                <a href="{{URL::to('/home')}}"><img src="{{'../WebPage/img/home/project_name.png'}}" alt="" width="100%"></a>
            </div>
            <hr>
        </div>
    </div>
</div>

<div class="body">
    <div class="container d-flex justify-content-center">
        <div class="col-4">
            <form action="{{URL::to('dashboard/login')}}" method="post" class="form-input">
                {{ csrf_field() }}
                <h6><u>Warning:</u> Do not continue if you don't have a permission in here!</h6>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert text-center" style="color:red">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <input type="text" name="email" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <small class="text-right">Forgot Password?</small>
                <button class="btn btn-dark" type="submit" name="login">Sign Up</button>
                <small>By signing up, you agree to the <b>Terms of Service</b> and <b>Privacy Policy</b></small>
            </form>
        </div>
    </div>
</div>
</body>
