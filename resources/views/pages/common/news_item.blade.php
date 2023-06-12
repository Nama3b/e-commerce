<div class="news">
    <div class="news-img">
        <img
            src="{{$news_item['url']}}" width="100%" alt="">
    </div>
    <div class="news-info">
        <a href="{{URL::to('news-detail')}}"><h6><b>{{$news_item['title']}}</b></h6></a>
        <div class="d-flex">
            <div class="col-6"><small><i class="fa fa-user-circle mr-2"></i>Michael H</small></div>
            <div class="col-6 text-right"><small><i class="fa fa-calendar mr-2"></i>2-9-2000</small></div>
        </div>
    </div>
</div>
