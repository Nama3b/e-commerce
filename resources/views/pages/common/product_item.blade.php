<div class="product">
    <a href="{{URL::to('product-detail'.'/'.$product_item['id'])}}"><img
            src="{{'../'.$image}}"
            alt=""></a>
    <div class="product-feature">
        <button class="btn btn-sm btn-secondary mr-2">${{$product_item['price']}}</button>
        <button class="btn btn-sm btn-outline-dark mr-2">
            <a href="{{URL::to('/add-cart')}}">
                <i class="fas fa-cart-plus"></i>
                <input type="hidden" name="qty" min="1" value="1">
                <input type="hidden" name="productId_hidden" value="{{$product_item['id']}}">
            </a>
        </button>
        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-heartbeat"></i></button>
    </div>
    <div class="product-info">
        <small>{{$product_item['brand']['name']}}</small>
        <p><a href="{{URL::to('product-detail'.'/'.$product_item['id'])}}"><b>{{$product_item['name']}}</b></a></p>
    </div>
</div>
