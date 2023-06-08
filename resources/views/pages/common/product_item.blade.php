
    <form action="{{URL::to('/add-cart')}}" method="post">
        {{ csrf_field() }}
        <div class="product">
            <a href="{{URL::to('product-detail'.'/'.$product_item->id)}}"><img
                    src="{{{'uploads/product/'.$product_item->thumbnail_image}}}" alt=""></a>
            <div class="d-flex">
                <button class="btn btn-sm btn-outline-dark mr-2">
                    <a href="{{URL::to('/add-cart')}}">
                        <i class="fas fa-cart-plus"></i>
                        <input type="hidden" name="qty" min="1" value="1">
                        <input type="hidden" name="productId_hidden" value="{{$product_item->id}}">
                    </a>
                </button>
                <button class="btn btn-sm btn-outline-dark mr-2"><i class="fas fa-heartbeat"></i></button>
                <button class="btn btn-sm btn-outline-dark"><i class="fas fa-save"></i></button>
            </div>
            <div class="product-info">
                <h6>
                    <b><a href="{{URL::to('product-detail'.'/'.$product_item->id)}}">{{$product_item->name}}</a></b>
                </h6>
                <h5><b>${{$product_item->price}}</b></h5>
            </div>
        </div>
    </form>
