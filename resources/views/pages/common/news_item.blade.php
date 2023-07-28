<div class="news">
    <div class="news-img">
        <a href="{{URL::to('post-detail/'.$news_item['id'])}}">
            @if(file_exists($news_item['image']))
                <img src="{{ asset($news_item['image']) }}" width="100%" alt="">
            @else
                <img src="{{ asset('/storage/public/uploads/img/'.$news_item['image']) }}" alt="" width="100px">
            @endif
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
