<div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/brand/edit/'.$item['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit form brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-input" name="name" placeholder="Brand name"
                               value="{{ $item['name'] }}" required>
                    </div>
                    <div class="form-group" style="display: flow-root">
                        <label for="">Category</label>
                        <select name="category_id[]" multiple>
                            @foreach ($category as $key => $option)
                                <option value="{{ $key+1 }}" {{ $key+1 == $item['category_id'] ? 'selected' : '' }}>{{ $option['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-image">
                        <label for="">Image</label>
                        @if(file_exists($item['image']))
                            <img src="{{ asset($item['image']) }}" alt="" width="70%" class="form-img">
                        @else
                            <img src="{{ asset('/storage/public/uploads/img/'.$item['image']) }}" width="70%" class="form-img">
                        @endif
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Image Upload
                        </label>
                        <input id="file-upload" type="file" name="image" class="file-upload">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option value="{{ $key }}" {{ $key = $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
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
