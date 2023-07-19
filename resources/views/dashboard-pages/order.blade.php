@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="card-body pt-3">
            @foreach ($data as $item)
                <h4>Order#{{ $loop->iteration }}</h4>
                <div class="order-item">
                    <div class="col-8">
                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($details = $item['orderdetails'])
                            @foreach ($details as $detail)
                                <tr>
                                    <th><img src="{{ asset($detail['image']) }}" alt="" width="120px"></th>
                                    <th>{{ $detail['name'] }}</th>
                                    <th>{{ $detail['price'] }}</th>
                                    <th>{{ $detail['quantity'] }}</th>
                                    <th>
                                        $ {{ number_format($detail['price'] * $detail['quantity'], 0, '', '.') }}</th>
                                    <th>
                                        <div class="d-flex">
                                            <a href="{{ URL::to('/product-detail/'.$detail['product_id']) }}">
                                                <button class="btn btn-sm btn-outline-light mr-2">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form action="{{ URL::to('/dashboard/order/edit/'.$item['id']) }}" method="post" class="order-status">
                            @csrf
                            @method('PATCH')
                            <select name="status">
                                @foreach ($status as $key => $option)
                                    <option
                                        value="{{ $key+1 }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-outline-light">Update status</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <div class="card-user shadow-0">
                            <h5><b>Customer information</b></h5>
                            <hr>
                            <div class="user-item">
                                <div class="col-4">
                                    <img src="../{{ $item['customer']['avatar'] }}" alt="" width="120px">
                                </div>
                                <div class="client-info col-8">
                                    <div class="d-flex justify-content-between pt-2">
                                        <p class="mb-0"><b><i
                                                    class="fas fa-user-circle"></i></b> {{ $item['customer']['full_name'] }}
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0"><b><i
                                                    class="far fa-envelope"></i></b> {{ $item['email'] }}</p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0"><b><i
                                                    class="fas fa-phone-alt"></i></b> {{ $item['address'] }}</p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0"><b><i
                                                    class="fas fa-house-user"></i></b> {{ $item['phone_number'] }}</p>
                                    </div>
                                    <hr>
                                    @if ($item['notice'])
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0"><b><i
                                                        class="far fa-file-alt"></i></b> {{ $item['notice'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="order-detail">
                            <div class="d-flex justify-content-between pt-2">
                                <p class="text-muted mb-0">Payment method : 18KU-62IIK</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $0</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Shipping code: 788152</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Shipping Fee</span> $0</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Create Date : {{ $item['created_at'] }}</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between pt-2">
                                <p class="fw-bold mb-0">Total:</p>
                                <p class="mb-0">
                                    ${{ number_format($item['total'], 0, '', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
