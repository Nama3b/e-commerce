@extends('auth.login')
@section('content')
    <div class="body">
        <div class="container d-flex justify-content-center">
            <div class="form-input col-8 col-lg-5">
                <ul class="nav nav-tabs mb-3 mt-2 d-flex">
                    <li class="active col-12 text-center"><a data-toggle="tab" href="#home">Reset password</a></li>
                </ul>
                <a href="{{ URL::to('login-google') }}">
                    <button class="btn btn-outline-dark mb-2">
                        <i class="fab fa-google mr-2"></i><b>Login with Google</b>
                    </button>
                </a>
                <a href="{{ URL::to('login-facebook') }}">
                    <button class="btn btn-outline-primary mb-2">
                        <i class="fab fa-facebook mr-2"></i><b>Login with Facebook</b>
                    </button>
                </a>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active p-3">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert text-center" style="color:red">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <p class="mb-0">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                        <form action="{{ route('password.verify') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="email" name="email" placeholder="Email address">
                            <button type="submit" class="btn btn-md btn-dark mt-2">
                                Next
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection