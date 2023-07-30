<div class="col-4">
    <div class="card-user shadow-0">
        <h5><b>Customer information</b></h5>
        <hr>
        <div class="user-item">
            <div class="col-4">
                @if(file_exists($item['customer']['image']))
                    <img src="{{ asset($item['customer']['image']) }}" alt="" width="100px" height="100px">
                @else
                    <img src="{{ asset('/storage/public/uploads/img/'.$item['customer']['image']) }}" width="100%" height="100px">
                @endif
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
            <p class="text-muted mb-0">Create Date : {{ date('H:i:s d-m-Y', strtotime($item['created_at'])) }}</p>
            <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery: </span> Free</p>
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
