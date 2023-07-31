<div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/banner/edit/'.$item['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit form banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-input" name="name" placeholder="Banner name"
                               value="{{ $item['name'] }}" required>
                    </div>
                    <div class="form-group form-image">
                        <label for="">Image</label>
                        @if(file_exists($item['image']))
                            <img src="{{ asset($item['image']) }}" alt="" width="70%" class="form-img">
                        @else
                            <img src="{{ asset('/storage/public/uploads/img/'.$item['image']) }}" width="70%" class="form-img">
                        @endif
{{--                        <label for="file-upload" class="custom-file-upload">--}}
{{--                            <i class="fa fa-cloud-upload"></i> Image Upload--}}
{{--                        </label>--}}
                        <input id="file-upload" type="file" name="image" class="file-upload">
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type">
                            @foreach ($type as $key => $option)
                                <option
                                    value="{{ $option }}" {{ $option == $item['type'] ? 'selected' : '' }}>{{ $option }}</option>
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
