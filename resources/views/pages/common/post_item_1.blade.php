<div class="post-item-type-1">
    <div class="post-image col-4">
        <a href="{{URL::to('post-detail/'.$post_item['id'])}}">
            @if(file_exists($post_item['image']))
                <img src="{{ asset($post_item['image']) }}" alt="">
            @else
                <img src="{{ asset('/storage/public/uploads/img/'.$post_item['image']) }}" alt="">
            @endif
        </a>
    </div>
    <div class="post-infor col-8">
        <div class="post-type">
            <small><b>Topic</b> - <b>Fashion</b> - {{ date('d/m/Y', strtotime($post_item['created_at'])) }}</small>
        </div>
        <div class="post-title">
            <b><a href="">{{$post_item['title']}}</a></b>
        </div>
        <div class="post-description">
            <p>{{$post_item['content']}}</p>
        </div>
        <div class="post-author">
            <img src="{{$author_avatar}}" alt="">
            <div class="author-name">
                <b>{{$author_name}}</b>
            </div>
        </div>
    </div>
</div>
