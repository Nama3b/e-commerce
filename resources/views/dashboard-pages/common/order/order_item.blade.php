<tr>
    <th><img src="{{ asset($detail['image']) }}" alt="" width="120px"></th>
    <th>{{ $detail['name'] }}</th>
    <th>${{ number_format($detail['price'], 0, '', '.') }}</th>
    <th>{{ $detail['quantity'] }}</th>
    <th>
        ${{ number_format($detail['price'] * $detail['quantity'], 0, '', '.') }}</th>
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
