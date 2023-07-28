<div class="modal fade" id="addForm" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/post/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="author" value="{{ Auth()->guard('member')->user()->id }}">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-input" name="title" placeholder="Post title" required>
                    </div>
                    <div class="form-group">
                        <label for="" style="vertical-align: top; margin-right: 49px">Content</label>
                        <textarea name="content" id="editor" cols="31" rows="4" placeholder="Post content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="post_type">
                            @foreach ($type as $key => $option)
                                <option
                                    value="{{ $key+1 }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Image Upload
                        </label>
                        <input id="file-upload" type="file" name="image" class="file-upload" required>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status">
                            @foreach ($status as $key => $option)
                                <option
                                    value="{{ $key+1 }}">{{ $option }}</option>
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
