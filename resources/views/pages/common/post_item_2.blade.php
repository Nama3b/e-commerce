<div class="post">
    <a href="{{URL::to('post-detail'.'/')}}"><img src="{{'../'}}" alt=""></a>
    <div class="post-feature">
        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-heartbeat"></i></button>
        <button class="btn btn-sm btn-outline-dark mr-2"><i class="fa fa-share-square-o"></i></button>
        <button class="btn btn-sm btn-secondary mr-2"><i class="fa fa-save"></i></button>
    </div>
    <div class="post-info">
        <small>{{$product_item['brand']['name']}}</small>
        <p><a href="{{URL::to('product-detail'.'/'.$product_item['id'])}}"><b>{{$product_item['name']}}</b></a></p>
    </div>
</div>
