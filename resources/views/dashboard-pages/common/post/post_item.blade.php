<tr>
    <th>{{ $loop->iteration }}</th>
    <th>
        @if(file_exists($item['image']))
            <img src="{{ asset($item['image']) }}" alt="" width="120px">
        @else
            <img src="{{ asset('/storage/public/uploads/img/'.$item['image']) }}" alt="" width="120px">
        @endif
    </th>
    <th>{{ $item['member']['full_name'] }}</th>
    <th>{{ $item['title'] }}</th>
    <th>{{ $item['post_type'] }}</th>
    <th>{{ $item['status'] }}</th>
    <th>
        <div class="d-flex">
            <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                    data-target="#editForm-{{ $item['id'] }}">
                <i class="far fa-edit"></i>
            </button>
            <form action="{{ URL::to('/dashboard/post/delete/'.$item['id']) }}"
                  method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </th>
</tr>

@include('dashboard-pages.common.post.post_modal_edit')
