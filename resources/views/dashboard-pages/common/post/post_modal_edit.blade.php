<div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/post/edit/'.$item['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content" >
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
                        <label for="" style="vertical-align: top; margin-right: 49px">Content</label>
                        <textarea name="content" id="editor" cols="31" rows="4" placeholder="{{ $item['content'] }}"></textarea>
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
                        @if(file_exists($item['image']))
                            <img src="{{ asset($item['image']) }}" alt="" width="70%" class="form-img">
                        @else
                            <img src="{{ asset('/storage/public/uploads/img/'.$item['image']) }}" class="form-img">
                        @endif
{{--                        <label for="file-upload" class="custom-file-upload">--}}
{{--                            <i class="fa fa-cloud-upload"></i> Image Upload--}}
{{--                        </label>--}}
                        <input id="file-upload" type="file" name="image" class="file-upload">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option
                                    value="{{ $option }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
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
