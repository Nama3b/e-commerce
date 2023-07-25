<div class="product">
    <a href="{{URL::to('product-detail'.'/'.$product_item['id'])}}"><img src="{{ asset($product_item['image']) }}" alt=""></a>
    <div class="product-feature d-flex">
        <button class="btn btn-sm btn-secondary">${{ number_format($product_item['price'], 0, '', '.') }}</button>
        <form class="form-add-cart" action="{{ URL::to('/add-cart') }}" method="post">
            {{ csrf_field() }}
            <button class="btn btn-sm btn-outline-dark">
                <i class="fas fa-cart-plus"></i>
                <input type="hidden" name="qty" min="1" value="1">
                <input type="hidden" name="productId_hidden" value="{{$product_item['id']}}">
            </button>
         </form>
        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-heartbeat"></i></button>
    </div>
    <div class="product-info">
        <small><a
                href="{{URL::to('product-by-brand'.'/'.$product_item['brand_id'])}}">{{$product_item['brand']['name']}}</a></small>
        <p><a href="{{URL::to('product-detail'.'/'.$product_item['id'])}}"><b>{{$product_item['name']}}</b></a></p>
    </div>
</div>
