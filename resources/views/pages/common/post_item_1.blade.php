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
        <div class="d-flex">
            <div class="post-author col-7">
                <img src="{{$author_avatar}}" alt="">
                <div class="author-name">
                    <b>{{$author_name}}</b>
                </div>
            </div>
            <div class="post-feature col-5" id="post-feature">
                @if(Auth()->guard('customer')->user())
                    @if($post_item['favorites'])
                        <form action="{{ URL::to('update-favorite').'/'.(int)implode(array_column($post_item['favorites'],'id')) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <button id="favorite-event" class="btn btn-sm btn-outline-danger"><i class="fas fa-heart"></i></button>
                        </form>
                    @else
                        <form action="{{ URL::to('add-favorite') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_hidden" value="{{$post_item['id']}}">
                            <input type="hidden" name="type" value="POST">
                            <button id="favorite_event" class="btn btn-sm btn-outline-danger"><i class="far fa-heart"></i></button>
                        </form>
                    @endif
                @else
                    <button id="favorite-event" class="btn btn-sm btn-outline-danger" onclick="signup()"><i class="far fa-heart"></i></button>
                @endif
                <button class="btn btn-sm btn-outline-success"><i class="far fa-bookmark"></i></button>
                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-share-alt"></i></button>
            </div>
        </div>
    </div>
</div>
