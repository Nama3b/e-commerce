<div class="post-item-type-1">
    <div class="post-image col-4">
        <a href="{{ URL::to('post-detail/'.$post_item['id']) }}">
            @if(file_exists($post_item['image']))
                <img src="{{ asset($post_item['image']) }}" alt="">
            @else
                <img src="{{ asset('/storage/public/uploads/img/'.$post_item['image']) }}" alt="">
            @endif
        </a>
    </div>
    <div class="post-infor col-8">
        <div class="post-type d-flex">
            <div class="col-9">
                <small><b>Topic</b> - <b>Fashion</b> - {{ date('d/m/Y', strtotime($post_item['created_at'])) }}</small>
            </div>
            <div class="col-3 text-right">
                <small>{{ count($post_item['favorites']) }} liked</small>
            </div>
        </div>
        <div class="post-title">
            <b><a href="">{{ $post_item['title'] }}</a></b>
        </div>
        <div class="post-description">
            <p>{{ $post_item['content'] }}</p>
        </div>
        <div class="d-flex">
            <div class="post-author col-7">
                <img src="{{ $author_avatar }}" alt="">
                <div class="author-name">
                    <b>{{ $author_name }}</b>
                </div>
            </div>
            <div class="post-feature col-5" id="post-feature">
                @if(Auth()->guard('customer')->user())
                    @if($post_item['favorites'])
                        <form
                            action="{{ URL::to('update-favorite').'/'.(int)implode(array_column($post_item['favorites'],'id')) }}"
                            method="post">
                            @method('PATCH')
                            @csrf
                            <button id="favorite-event" class="btn btn-sm btn-outline-danger"><i
                                    class="fas fa-heart"></i></button>
                        </form>
                    @else
                        <form action="{{ URL::to('add-favorite') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_hidden" value="{{ $post_item['id'] }}">
                            <input type="hidden" name="type" value="POST">
                            <button id="favorite-event" class="btn btn-sm btn-outline-danger"><i
                                    class="far fa-heart"></i></button>
                        </form>
                    @endif
                @else
                    <button id="favorite-event" class="btn btn-sm btn-outline-danger" onclick="signup()"><i
                            class="far fa-heart" onclick="signup1()"></i></button>
                @endif
                @if(Auth()->guard('customer')->user())
                    @if($post_item['postsaved'])
                        <form
                            action="{{ URL::to('unsave-post').'/'.(int)implode(array_column($post_item['postsaved'],'id')) }}"
                            method="post">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-sm btn-outline-success"><i class="fas fa-bookmark"></i></button>
                        </form>
                    @else
                        <form action="{{ URL::to('save-post') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_hidden" value="{{ $post_item['id'] }}">
                            <input type="hidden" name="type" value="{{ $post_item['post_type'] }}">
                            <button class="btn btn-sm btn-outline-success"><i class="far fa-bookmark"></i></button>
                        </form>
                    @endif
                @else
                    <button class="btn btn-sm btn-outline-success" onclick="signup2()"><i class="far fa-bookmark"></i></button>
                @endif
                <form action="">
                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-share-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
