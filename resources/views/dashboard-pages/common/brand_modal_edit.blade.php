<div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/brand/edit/'.$item['id'])}}" method="post">
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
                    <div class="form-group form-image">
                        <label for="">Image</label>
                        <img src="{{ asset($item['thumbnail_image']) }}" alt="" width="70%" class="form-img">
                        <input type="hidden" name="thumbnail_image" value="{{ $item['thumbnail_image'] }}">
                        <input type="file" name="thumbnail_image1" class="image">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        @php($status_item = $item['status'])
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option value="{{ $key }}" {{ $key = $status_item ? 'selected' : '' }}>{{ $option }}</option>
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
