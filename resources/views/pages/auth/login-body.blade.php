@extends('auth.login')
@section('content')
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
                            <div class="g-recaptcha" id="feedback-recaptcha"
                                 data-sitekey="6LfHAjMnAAAAAGGa8s7BWJcKZBr_y3SiaXARnAPf"></div>
                            <div class="d-flex">
                                <input type="checkbox" class="checkbox" name="policy" checked>
                                <label for="policy"> <small>By signing up, you agree to the <b>Terms of Service</b>
                                        and <b>Privacy Policy</b></small></label>
                            </div>
                            <a href="{{ route('verification.verify', ['id' , 'hash']) }}">
                                <button type="submit" class="btn btn-dark">Register</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection