@extends('auth.login')
@section('content')
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
            <a href="{{ URL::to("/login") }}" style="float:right; margin-top:9px; font-size:15px"><i class="material-icons" style="font-size:18px">keyboard_return</i>Back</a>
        </div>
    </div>
@endsection
