<div class="post-item-type-1">
    <a href="{{URL::to('post-detail'.'/'.$post_item['id'])}}"><img src="{{'../'.$post_item['url']}}" alt=""></a>
    <div class="post-infor">
        <div class="post-type">
            <span>Topic</span> -
            <span>Fashion</span> -
            <small>4 mins</small>
        </div>
        <div class="post-title">
            <b>{{$post_item['title']}}</b>
        </div>
        <div class="post-description">
            <p>{{$post_item['description']}}</p>
        </div>
        <div class="post-author">
            <img src="{{'../WebPage/img/home/logo.jpg'}}" alt="">
            <div class="author-name">
                <b>{{$post_item['author']}}</b>
            </div>
        </div>
    </div>
</div>
