<div class="modal fade" id="addForm1" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/brand/store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-input" name="name" placeholder="Brand name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="thumbnail_image" required>
                        <input type="hidden" name="type" value="ALL">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        @php($status_item = $item['status'])
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Add new</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addForm2" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/brand/store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-input" name="name" placeholder="Brand name">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="thumbnail_image">
                        <input type="hidden" name="type" value="SNEAKER">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        @php($status_item = $item['status'])
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Add new</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addForm3" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/brand/store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-input" name="name" placeholder="Brand name">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="thumbnail_image">
                        <input type="hidden" name="type" value="CLOTHES">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        @php($status_item = $item['status'])
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Add new</button>
                </div>
            </div>
        </form>
    </div>
</div>

