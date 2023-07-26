<div class="modal fade" id="addForm" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/product/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="creator" value="{{ Auth()->guard('member')->user()->id }}">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-input align-right" name="name" placeholder="Product name"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id">
                            @foreach ($category as $option)
                                <option value="{{ $loop->iteration }}">{{ $option['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label>
                        <select name="brand_id">
                            @foreach ($brand as $option)
                                <option value="{{ $loop->iteration }}">{{ $option['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" style="vertical-align: top">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4"
                                  placeholder="Product description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Price ($)</label>
                        <input type="text" class="form-input" name="price" placeholder="Product price" required>
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" class="form-input" name="quantity" placeholder="Product quantity"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Image Upload
                        </label>
                        <input id="file-upload" type="file" name="image" class="file-upload" required>
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
