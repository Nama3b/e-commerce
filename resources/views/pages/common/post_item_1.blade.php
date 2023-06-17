<div class="post-item-type-1">
    <div class="post-image col-4">
        <a href="{{URL::to('post-detail'.'/'.$post_item['id'])}}"><img src="{{'../'.$post_item['url']}}" alt=""></a>
    </div>
    <div class="post-infor col-8">
        <div class="post-type">
            <small><b>Topic</b> - <b>Fashion</b> - 4 mins</small>
        </div>
        <div class="post-title">
            <b>{{$post_item['title']}}</b>
        </div>
        <div class="post-description">
            <p>{{$post_item['content']}}</p>
        </div>
        <div class="post-author">
            <img src="{{'../WebPage/img/home/logo.jpg'}}" alt="">
            <div class="author-name">
                <b>{{$post_item['author']}}</b>
            </div>
        </div>
    </div>
</div>
