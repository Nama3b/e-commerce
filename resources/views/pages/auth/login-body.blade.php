@extends('auth.login')
@section('content')
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
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
        <div id="menu1" class="tab-pane fade">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert text-center" style="color:red">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <form action="{{ URL::to('/email/verify') }}" method="post">
                @csrf
                <div class="error-item">
                    @foreach($errors->all() as $val)
                        <ul class="errors">
                            <li><small>{{$val}}</small></li>
                        </ul>
                    @endforeach
                </div>
                <input type="email" name="email" placeholder="Email" required>
                <div class="g-recaptcha" id="feedback-recaptcha"
                     data-sitekey="6LfHAjMnAAAAAGGa8s7BWJcKZBr_y3SiaXARnAPf"></div>
                <button type="submit" class="btn btn-dark mt-2">Verify</button>
            </form>
        </div>
    </div>
@endsection
