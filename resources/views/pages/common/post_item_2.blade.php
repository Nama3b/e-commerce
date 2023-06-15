<div class="post-item-type-2">
    <a href="{{URL::to('post-detail'.'/'.$post_item['id'])}}"><img src="{{'../'.$post_item['url']}}" alt=""></a>
    <div class="post-feature">
        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-heartbeat"></i></button>
        <button class="btn btn-sm btn-outline-dark mr-2"><i class="fa fa-share-square-o"></i></button>
        <button class="btn btn-sm btn-secondary mr-2"><i class="fa fa-save"></i></button>
    </div>
    <div class="post-infor">
        <h5><b>Lorem ipsum dolor sit amet, consectetur adipisicing.</b></h5>
        <div class="post-author">
            <img src="{{'../WebPage/img/home/logo.jpg'}}" alt="">
            <div class="author-name">
                <div class="col-6"><small><i class="fa fa-user-circle mr-2"></i>{{$post_item['author']}}</small></div>
                <div class="col-6 text-right"><small><i class="fa fa-calendar mr-2"></i>{{$post_item['created_at']}}</small></div>
            </div>
        </div>
    </div>
</div>
