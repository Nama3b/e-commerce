<div class="d-flex">
    <div class="col-8">
        @php($order_detail = $order_item->orderdetails)
        @foreach ($order_detail as $order_detail_item)
            <div class="card shadow-0 border mb-1">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="../{{ $order_detail_item->image }}" class="img-fluid" alt="Phone">
                        </div>
                        <div class="col-md-4 row-item">
                            <p class="text-muted mb-0">{{ $order_detail_item->name }}</p>
                        </div>
                        <div class="col-md-2 row-item">
                            <p class="text-muted mb-0 small">
                                ${{ number_format($order_detail_item->price, 0, '', '.') }}</p>
                        </div>
                        <div class="col-md-1 row-item">
                            <p class="text-muted mb-0 small">x {{ $order_detail_item->quantity }}</p>
                        </div>
                        <div class="col-md-2 row-item">
                            <p class="text-muted mb-0 small">${{ number_format($order_detail_item->price * $order_detail_item->quantity, 0, '', '.') }}</p>
                        </div>
                    </div>
                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2">
                            <p class="text-muted mb-0 small">Track Order</p>
                        </div>
                        <div class="col-md-10">
                            <div class="progress" style="height: 6px; border-radius: 16px;">
                                <div class="progress-bar" role="progressbar"
                                     style="width: 65%; border-radius: 16px; background-color: #a8729a;"
                                     aria-valuenow="65"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-around mb-1">
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-4">
        <div class="card-user shadow-0">
            <div class="client-info">
                <h6><b>Ordering person</b></h6>
                <hr>
                <div class="d-flex justify-content-between pt-2">
                    <p class="text-muted mb-0"><b><i class="fas fa-user-circle"></i></b> {{ $order_item->name }}</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <p class="text-muted mb-0"><b><i class="far fa-envelope"></i></b> {{ $order_item->email }}</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <p class="text-muted mb-0"><b><i class="fas fa-phone-alt"></i></b> {{ $order_item->phone_number }}</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <p class="text-muted mb-0"><b><i class="fas fa-house-user"></i></b> {{ $order_item->address }}</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <p class="text-muted mb-0"><b><i class="far fa-file-alt"></i></b> {{ $order_item->notice }}</p>
                </div>
            </div>
        </div>
        <div class="order-detail">
            <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Payment method : 18KU-62IIK</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $19.00</p>
            </div>
            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Shipping code: 788152</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Shipping Fee</span> $123</p>
            </div>
            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Create Date : 22 Dec,2019</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
            </div>
            <hr>
            <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Total:</p>
                <p class="text-muted mb-0">
                    @php($total = 0)
                    @foreach($order_item->orderdetails as $order_ele)
                        @php($total += $order_ele->price * $order_ele->quantity)
                    @endforeach
                    ${{ number_format($total, 0, '', '.') }}
                </p>
            </div>
        </div>
    </div>
</div>
