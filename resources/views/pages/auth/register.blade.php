@extends('auth.login')
@section('content')
    @if($email)
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
    @else
        @include('pages.common.expired-page')
    @endif
@endsection
