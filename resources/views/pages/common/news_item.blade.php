<div class="news">
    <div class="news-img">
        <a href="{{URL::to('post-detail/'.$news_item['id'])}}">
            <img src="{{'../'.$news_item['url']}}" width="100%" alt="">
        </a>
    </div>
    <div class="news-info">
        <a href="{{URL::to('post-detail/'.$news_item['id'])}}"><h6><b>{{$news_item['title']}}</b></h6></a>
        <div class="d-flex">
            <div class="col-6"><small><i class="fa fa-user-circle mr-2"></i>{{ $author_name }}</small></div>
            <div class="col-6 text-right"><small><i class="fa fa-calendar mr-2"></i>{{ date('d-m-Y', strtotime($news_item['created_at'])) }}</small></div>
        </div>
    </div>
</div>
