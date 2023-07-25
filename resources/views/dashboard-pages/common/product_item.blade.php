<tr>
    <th>{{ $loop->iteration }}</th>
    <th>
        @if(file_exists($item['image']))
            <img src="{{ asset($item['image']) }}" alt="" width="120px">
        @else
            <img src="{{ asset('/storage/public/uploads/img/'.$item['image']) }}" alt="" width="120px">
        @endif
    </th>
    <th>{{ $item['category']['name'] }}</th>
    <th>{{ $item['brand']['name'] }}</th>
    <th>{{ $item['name'] }}</th>
    <th>${{ $item['price'] }}</th>
    <th>{{ $item['quantity'] }}</th>
    <th>{{ $item['status'] }}</th>
    <th>
        <div class="d-flex">
            <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                    data-target="#editForm-{{ $item['id'] }}">
                <i class="far fa-edit"></i>
            </button>
            <form action="{{ URL::to('/dashboard/product/delete/'.$item['id']) }}"
                  method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </th>
</tr>

@include('dashboard-pages.common.product_modal_edit')
