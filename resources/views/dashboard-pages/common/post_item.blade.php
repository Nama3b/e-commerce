<tr>
    <th>{{ $loop->iteration }}</th>
    <th><img src="../{{ $item['url'] }}" alt="" width="120px"></th>
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

<div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/post/edit/'.$item['id'])}}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit form post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                    <input type="hidden" name="author" value="{{ $item['author'] }}">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-input" name="title" placeholder="Post title"
                               value="{{ $item['title'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="" style="vertical-align: top; margin-right: 51px">Content</label>
                        <textarea name="content" id="content" cols="30" rows="4">{{ $item['content'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="post_type">
                            @foreach ($type as $key => $option)
                                <option
                                    value="{{ $key+1 }}" {{ $option == $item['post_type'] ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-image">
                        <label for="">Image</label>
                        <img src="../{{ $item['url'] }}" alt="" class="form-img">
                        <input type="hidden" name="url" value="{{ $item['url'] }}">
                        <input type="file" name="url" class="image">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option
                                    value="{{ $key+1 }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
