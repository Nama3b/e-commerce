@extends('dashboard-layout')
@section('content')
    <div class="member-profile">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 mt-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ URL::to('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $member->full_name }}'s Profile
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('WebPage/img/home/logo.jpg') }}" class="rounded-circle img-fluid">
                            <input type="hidden" name="image" value="{{ $member->image }}">
                            <h5 class="my-3">{{ $member->full_name }}</h5>
                            <p class="text-muted mb-1"><i class="fas fa-user-graduate mr-2"></i>Full Stack Developer
                            </p>
                            <p class="text-muted mb-4"><i class="fas fa-house-user mr-2"></i>{{ $member->address }}
                            </p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-dark ms-1">Message</button>
                            </div>
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
                                    <input type="text" class="form-input" name="full_name"
                                           value="{{ $member->full_name }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Email <span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <input type="email" class="form-input" name="email" value="{{ $member->email }}"
                                           required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Password <span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <input type="password" class="form-input" name="password"
                                           value="{{ $member->password }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Phone number <span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-input" name="phone_number"
                                           value="{{ $member->phone_number }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Address <span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-input" name="address" value="{{ $member->address }}"
                                           required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Birthday </p>
                                </div>
                                <div class="col-9">
                                    <input type="date" class="form-input" name="birthday"
                                           value="{{ $member->birthday }}">
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
            </div>
        </div>
    </div>
@endsection
