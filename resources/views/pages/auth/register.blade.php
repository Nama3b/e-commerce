@extends('auth.login')
@section('content')
    @if($email)
    <div class="body">
        <div class="container d-flex justify-content-center">
            <div class="form-input col-8 col-lg-5">
                <ul class="nav nav-tabs mb-3 mt-2 d-flex">
                    <li class="col-6 text-center"><a data-toggle="tab" href="#home">Sign In</a></li>
                    <li class="active col-6 text-center"><a data-toggle="tab" href="#menu1">Sign Up</a></li>
                </ul>
                <a href="{{ URL::to('login-google') }}">
                    <button class="btn btn-outline-dark mb-2">
                        <i class="fab fa-google mr-2"></i><b>Continue with Google</b>
                    </button>
                </a>
                <a href="{{ URL::to('login-facebook') }}">
                    <button class="btn btn-outline-primary mb-2">
                        <i class="fab fa-facebook mr-2"></i><b>Continue with Facebook</b>
                    </button>
                </a>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert text-center" style="color:red">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <form action="{{ URL::to('/login') }}" method="post">
                            @csrf
                            <div class="error-item">
                                @foreach($errors->all() as $val)
                                    <ul class="errors">
                                        <li><small>{{$val}}</small></li>
                                    </ul>
                                @endforeach
                            </div>
                            <input type="text" name="email" placeholder="Email Address" required>
                            <div class="password-input">
                                <input type="password" id="password" name="password" placeholder="Password" required>
                                <a onclick="showPassword()" title="Show Password"><i class="far fa-eye"></i></a>
                            </div>
                            <small class="text-right"><a href="{{ route('password.forgot') }}">Forgot Password?</a></small>
                            <button type="submit" class="btn btn-dark" name="login">Sign In</button>
                            <label for="policy"> <small>By signing in, you agree to the <b>Terms of Service</b>
                                    and <b>Privacy Policy</b></small></label>
                        </form>
                    </div>
                    <div id="menu1" class="tab-pane fade in active">
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
                            <span class="d-flex">Email is verified:<p class="text-success ml-2 mb-0">{{ $email }}</p></span>
                            <div class="password-input">
                                <input type="password" id="password_signup" name="password" placeholder="Password" required>
                                <a onclick="showPasswordSignup()" title="Show Password"><i class="far fa-eye"></i></a>
                            </div>
                            <div class="password-input">
                                <input type="password" id="password_repeat" name="password_confirmation" placeholder="Password confirmation" required>
                                <a onclick="showPasswordRepeat()" title="Show Password"><i class="far fa-eye"></i></a>
                            </div>
                            <input type="text" name="full_name" placeholder="Full name" required>
                            <input type="text" name="address" placeholder="Address" required>
                            <input type="text" name="phone_number" placeholder="Phone number" required>
                            <input type="date" name="birthday">
                            {{--                        <input type="file" name="avatar">--}}
                            <input type="hidden" name="avatar" value="../WebPage/img/home/logo.jpg">
                            <div class="d-flex">
                                <input type="checkbox" class="checkbox" name="policy" checked>
                                <label for="policy"> <small>By signing up, you agree to the <b>Terms of Service</b>
                                        and <b>Privacy Policy</b></small></label>
                            </div>
                            <button type="submit" class="btn btn-dark">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <body>
        <div class="d-flex align-items-center justify-content-center vh-100" style="min-height: 77vh">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                <p class="lead">
                    The page you’re looking for doesn’t exist.
                </p>
                <a href="{{ URL::to('home') }}" class="btn btn-dark">Go Home</a>
            </div>
        </div>
        </body>
    @endif
@endsection
