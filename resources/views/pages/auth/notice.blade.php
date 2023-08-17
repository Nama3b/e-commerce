@extends('auth.login')
@section('content')
    <div class="body">
        <div class="container d-flex justify-content-center">
            <div class="form-input col-8 col-lg-5">
                <ul class="nav nav-tabs mb-3 mt-2 d-flex">
                    <li class="active col-12 text-center"><a data-toggle="tab" href="#home">Sign Up</a></li>
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
                    <div id="home" class="tab-pane fade in active p-3">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert text-center" style="color:red">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                New verification link has been sent to your email address.
                            </div>
                        @endif
                        Before proceeding, please check your email for a verification link. If you did not receive the
                        email, click a link below to request another
                        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="d-inline btn btn-link p-0">
                                Resend email verify
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
