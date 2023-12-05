<h5>Order#{{ $loop->iteration }}</h5>
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

        @if ($item['status'] == 'CANCELLED')
            <div class="order-status">
                <select name="status" disabled>
                    <option value="4">{{ $item['status'] }}</option>
                </select>
            </div>
        @elseif($item['status'] == 'DELIVERING')
            <form action="{{ URL::to('/dashboard/order/edit/'.$item['id']) }}" method="post"
                  class="order-status">
                @csrf
                @method('PATCH')
                <select name="status">
                    <option value="2" selected>DELIVERING</option>
                    <option value="3">COMPLETED</option>
                    <option value="4">CANCELLED</option>
                </select>
                <button type="submit" class="btn btn-sm btn-outline-success">Update status
                </button>
            </form>
        @elseif($item['status'] == 'PROCESSING')
            <form action="{{ URL::to('/dashboard/order/edit/'.$item['id']) }}" method="post"
                  class="order-status">
                @csrf
                @method('PATCH')
                <select name="status">
                    <option value="1" selected>PROCESSING</option>
                    <option value="2">DELIVERING</option>
                    <option value="4">CANCELLED</option>
                </select>
                <button type="submit" class="btn btn-sm btn-outline-success">Update status
                </button>
            </form>
        @else
            <form action="{{ URL::to('/dashboard/order/edit/'.$item['id']) }}" method="post"
                  class="order-status">
                @csrf
                @method('PATCH')
                <select name="status">
                    <option value="3">COMPLETED</option>
                </select>
            </form>
        @endif
    </div>
    @include('dashboard-pages.common.order.customer_info')
</div>
