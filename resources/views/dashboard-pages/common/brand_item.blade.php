<tr>
    <th>{{ $loop->iteration }}</th>
    <th>
        <img src="{{ asset($item['thumbnail_image']) }}" alt="" width="120px" id="thumbnail_img_1">
        <img src="{{ asset('/storage/public/uploads/img/'.$item['thumbnail_image']) }}" alt="" width="120px" id="thumbnail_img_2"></th>
    <th>{{ $item['name'] }}</th>
    <th>{{ $item['status'] ? 'Active' : 'Inactive'}}</th>
    <th>
        <div class="d-flex">
            <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                    data-target="#editForm-{{ $item['id'] }}">
                <i class="far fa-edit"></i>
            </button>
            <form action="{{ URL::to('/dashboard/brand/delete/'.$item['id']) }}"
                  method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </th>
</tr>
