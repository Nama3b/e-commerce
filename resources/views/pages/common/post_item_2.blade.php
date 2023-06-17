{{--<div class="post-item-type-2">--}}
{{--    <div class="post-image">--}}
{{--        <a href="{{URL::to('post-detail'.'/'.$post_item['id'])}}"><img src="{{'../'.$post_item['url']}}" alt=""></a>--}}
{{--    </div>--}}
{{--    <div class="post-feature">--}}
{{--        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-heartbeat"></i></button>--}}
{{--        <button class="btn btn-sm btn-outline-dark"><i class="fa fa-share-square-o"></i></button>--}}
{{--        <button class="btn btn-sm btn-outline-dark mr-2"><i class="fa fa-save"></i></button>--}}
{{--    </div>--}}
{{--    <div class="post-infor">--}}
{{--        <h6><b>Lorem ipsum dolor sit amet, consectetur adipisicing.</b></h6>--}}
{{--        <div class="post-author">--}}
{{--            <img src="{{'../WebPage/img/home/logo.jpg'}}" alt="">--}}
{{--            <div class="author-name">--}}
{{--                <div class="col-6"><small>{{$post_item['author']}}</small></div>--}}
{{--                <div class="col-6 text-right"><small><i class="fa fa-calendar mr-2"></i>{{$post_item['created_at']}}--}}
{{--                    </small></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="news">
    <div class="news-img">
        <a href="{{URL::to('news-detail'.'/'.$post_item['id'])}}">
            <img src="{{'../'.$post_item['url']}}" width="100%" alt="">
        </a>
    </div>
    <div class="news-info">
        <a href="{{URL::to('news-detail'.'/'.$post_item['id'])}}"><h6><b>{{$post_item['title']}}</b></h6></a>
        <div class="d-flex">
            <div class="col-6"><small><i class="fa fa-user-circle mr-2"></i>{{$post_item['author']}}</small></div>
            <div class="col-6 text-right"><small><i class="fa fa-calendar mr-2"></i>{{$post_item['created_at']}}</small></div>
        </div>
    </div>
</div>
