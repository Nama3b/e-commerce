@extends('layout')
@section('content')
    <div class="customer-profile">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 mt-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ URL::to('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->full_name }}'s Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <form action="{{ URL::to('update-customer-profile').'/'.$user->id }}" method="post" class="form-control">
                    {{ csrf_field() }}
                    @method('PATCH')
                    <div class="col-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ $user->avatar }}"
                                     alt="avatar"
                                     class="rounded-circle img-fluid">
                                <input type="hidden" name="avatar" value="{{ $user->avatar }}">
                                <h5 class="my-3">{{ $user->full_name }}</h5>
                                <p class="text-muted mb-1"><i class="fas fa-user-graduate mr-2"></i>Full Stack Developer
                                </p>
                                <p class="text-muted mb-4"><i class="fas fa-house-user mr-2"></i>{{ $user->address }}
                                </p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-outline-dark ms-1">Message</button>
                                    <button type="submit" class="btn btn-dark ml-2">Edit profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg" style="color: #bad0dd;"></i>
                                        <p class="mb-0"><a href="">nama3b.io/namaeb-de-creative</a></p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <p class="mb-0"><a href="https://github.com/Nama3b">github.com/Nama3b</a></p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0"><a href="https://twitter.com/home">twitter.com/home</a></p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0"><a
                                                href="https://www.instagram.com/nam4eb/">instagram.com/nam4eb/</a></p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0"><a href="https://www.facebook.com/lethanhlong8151">facebook.com/lethanhlong8151</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <p class="mb-0">Full Name <span>*</span></p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-input" name="full_name" value="{{ $user->full_name }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="mb-0">Email <span>*</span></p>
                                    </div>
                                    <div class="col-9">
                                        <input type="email" class="form-input" name="email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="mb-0">Password <span>*</span></p>
                                    </div>
                                    <div class="col-9">
                                        <input type="password" class="form-input" name="password" value="{{ $user->password }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="mb-0">Phone number <span>*</span></p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-input" name="phone_number" value="{{ $user->phone_number }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="mb-0">Address <span>*</span></p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-input" name="address" value="{{ $user->address }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="mb-0">Birthday </p>
                                    </div>
                                    <div class="col-9">
                                        <input type="date" class="form-input" name="birthday" value="{{ $user->birthday }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><b>Active time</b></p>
                                        <p class="mb-1">July</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                 aria-valuenow="80"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1">June</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                 aria-valuenow="72"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1">May</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                 aria-valuenow="89"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1">April</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar" style="width: 55%"
                                                 aria-valuenow="55"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1">March</p>
                                        <div class="progress rounded mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"
                                                 aria-valuenow="66"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><b>Order frequency</b></p>
                                        <p class="mb-1">Sneaker</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar"
                                                 aria-valuenow="80"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1">Clothes</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                 aria-valuenow="72"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1">Watches</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar" style="width: 35%"
                                                 aria-valuenow="89"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1">Accessory</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar" role="progressbar" style="width: 60%"
                                                 aria-valuenow="55"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
