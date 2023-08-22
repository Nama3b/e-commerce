@extends('auth.login')
@section('content')
    <div class="body">
        <div class="container d-flex justify-content-center">
            <div class="form-input col-8 col-lg-5">
                <ul class="nav nav-tabs mb-3 mt-2 d-flex">
                    <li class="active col-12 text-center"><a data-toggle="tab" href="#home">Email verification</a></li>
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
                        ?>4
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                New verification link has been sent to your email address.
                            </div>
                        @endif
                        Before proceeding, please check your email for a verification link. If you did not receive the
                        email, click a link below to request another
                        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="hidden_email" value="{{ $email }}">
                            <button type="submit" class="d-inline btn btn-link p-0">
                                Resend email verify
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($success)
        <script>
            const popup = document.getElementById("popup_success");
            const popupMessage = document.getElementById("popup-message");
            popupMessage.innerHTML = "{{ $success }}";

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
@endsection
