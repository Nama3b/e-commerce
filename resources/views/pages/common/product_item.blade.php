<div class="product">
    <a href="{{URL::to('product-detail'.'/'.$product_item['id'])}}">
        @if(file_exists($product_item['image']))
            <img src="{{ asset($product_item['image']) }}" alt="">
        @else
            <img src="{{ asset('/storage/public/uploads/img/'.$product_item['image']) }}" alt="">
        @endif
    </a>
    <div class="product-feature d-flex">
        <button class="btn btn-sm btn-secondary">${{ number_format($product_item['price'], 0, '', '.') }}</button>
        <form class="form-add-cart" action="{{ URL::to('/add-cart') }}" method="post">
            @csrf
            <button class="btn btn-sm btn-outline-success">
                <i class="fas fa-cart-plus"></i>
                <input type="hidden" name="qty" min="1" value="1">
                <input type="hidden" name="productId_hidden" value="{{$product_item['id']}}">
            </button>
         </form>
        @if(Auth()->guard('customer')->user())
            @if($product_item['favorites'])
                <form action="{{ URL::to('update-favorite').'/'.(int)implode(array_column($product_item['favorites'],'id')) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-heart"></i></button>
                </form>
            @else
                <form action="{{ URL::to('add-favorite') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_hidden" value="{{$product_item['id']}}">
                    <input type="hidden" name="type" value="PRODUCT">
                    <button class="btn btn-sm btn-outline-danger"><i class="far fa-heart"></i></button>
                </form>
            @endif
        @else
            <button class="btn btn-sm btn-outline-danger" onclick="signup()"><i class="far fa-heart"></i></button>
        @endif
    </div>
    <div class="product-info">
        <small>
            <a href="{{URL::to('product-by-brand'.'/'.$product_item['brand_id'])}}">{{$product_item['brand']['name']}}</a>
        </small>
        <a href="{{URL::to('product-detail'.'/'.$product_item['id'])}}">{{$product_item['name']}}</a>
    </div>
</div>

<script>
    function signup() {
        alert("Please sign in to add favorite!");
    }
</script>
