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
            @foreach ($item['orderdetails'] as $detail)
                <tr>
                    <th>
                        @if(file_exists($detail['image']))
                            <img src="{{ asset($detail['image']) }}" alt="" width="120px">
                        @else
                            <img src="{{ asset('/storage/public/uploads/img/'.$detail['image']) }}" width="120px">
                        @endif
                    </th>
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
            @endforeach
            </tbody>
        </table>
        @if ($item['status'] != 'CANCELLED')
            <form action="{{ URL::to('/dashboard/order/edit/'.$item['id']) }}" method="post"
                  class="order-status">
                @csrf
                @method('PATCH')
                <select name="status">
                    @foreach ($status as $key => $option)
                        <option
                            value="{{ $key+1 }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-outline-success">Update status
                </button>
            </form>
        @else
            <div class="order-status">
                <select name="status">
                    <option value="4">{{ $item['status'] }}</option>
                </select>
            </div>
        @endif
    </div>
    @include('dashboard-pages.common.order.customer_info')
</div>
