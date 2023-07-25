<div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ URL::to('/dashboard/product/edit/'.$item['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit form product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                    <input type="hidden" name="creator" value="{{ $item['creator'] }}">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-input" name="name" placeholder="Product name"
                               value="{{ $item['name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id">
                            @foreach ($category as $key => $option)
                                <option
                                    value="{{ $key+1 }}" {{ $key+1 == $item['category_id'] ? 'selected' : '' }}>{{ $option['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label>
                        <select name="brand_id">
                            @foreach ($brand as $key => $option)
                                <option
                                    value="{{ $key+1 }}" {{ $key+1 == $item['brand_id'] ? 'selected' : '' }}>{{ $option['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" style="vertical-align: top">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" placeholder="Product description">{{ $item['description'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Price ($)</label>
                        <input type="text" class="form-input" name="price" placeholder="Product price"
                               value="{{ $item['price'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" class="form-input" name="quantity" placeholder="Product quantity"
                               value="{{ $item['quantity'] }}" required>
                    </div>
                    <div class="form-group form-image">
                        <label for="">Image</label>
                        @if(file_exists($item['image']))
                            <img src="{{ asset($item['image']) }}" alt="" width="70%" class="form-img">
                        @else
                            <img src="{{ asset('/storage/public/uploads/img/'.$item['image']) }}" width="70%" class="form-img">
                        @endif
                        <input type="file" name="image" class="image">
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
