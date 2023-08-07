@extends('layout')
@section('content')
    <div class="post-detail container pb50">
        <div class="row">
            <div class="col-md-9 mb40">
                <article>
                    <div class="post-img">
                        @if(file_exists($data['images'][0]['image']))
                            <img src="{{ asset($data['images'][0]['image']) }}" alt="" class="img-fluid mb30">
                        @else
                            <img src="{{ asset('/storage/public/uploads/img/'.$data['images'][0]['image']) }}" alt="" class="img-fluid mb30">
                        @endif
                    </div>
                    <div class="post-content">
                        <h3>{{ $data['title'] }}</h3>
                        <ul class="post-meta list-inline">
                            <li class="list-inline-item">
                                <i class="fa fa-user-circle-o"></i> <a href="#">{{ $author_name }}</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-calendar-o"></i> <a
                                    href="#">{{ date('d/m/Y', strtotime($data['created_at'])) }}</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-tags"></i> <a href="#">Fashionista</a>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                            ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                            consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                            arcu. In enim justo, </p>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                            eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                            nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                            Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
                            eget, arcu. In enim justo, </p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                            ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                            consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                            arcu. In enim justo, </p>
                        <div class="post-feature col-5" id="post-feature">
                            @if(Auth()->guard('customer')->user())
                                @if($data['favorites'])
                                    <form
                                        action="{{ URL::to('update-favorite').'/'.(int)implode(array_column($data['favorites'],'id')) }}"
                                        method="post">
                                        @method('PATCH')
                                        @csrf
                                        <button id="favorite-event" class="btn btn-sm btn-outline-danger"><i
                                                class="fas fa-heart"></i></button>
                                    </form>
                                @else
                                    <form action="{{ URL::to('add-favorite') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_hidden" value="{{ $data['id'] }}">
                                        <input type="hidden" name="type" value="POST">
                                        <button id="favorite-event" class="btn btn-sm btn-outline-danger"><i
                                                class="far fa-heart"></i></button>
                                    </form>
                                @endif
                            @else
                                <form action=""><button id="favorite-event" class="btn btn-sm btn-outline-danger" onclick="signup()"><i
                                        class="far fa-heart" onclick="signup1()"></i></button></form>
                            @endif
                            @if(Auth()->guard('customer')->user())
                                @if($data['postsaved'])
                                    <form
                                        action="{{ URL::to('unsave-post').'/'.(int)implode(array_column($data['postsaved'],'id')) }}"
                                        method="post">
                                        @method('PATCH')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-success"><i class="fas fa-bookmark"></i></button>
                                    </form>
                                @else
                                    <form action="{{ URL::to('save-post') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_hidden" value="{{ $data['id'] }}">
                                        <input type="hidden" name="type" value="{{ $data['post_type'] }}">
                                        <button class="btn btn-sm btn-outline-success"><i class="far fa-bookmark"></i></button>
                                    </form>
                                @endif
                            @else
                                <form><button class="btn btn-sm btn-outline-success" onclick="signup2()"><i class="far fa-bookmark"></i></button></form>
                            @endif
                            <div class="fb-share-button" data-href="{{ URL::to('/post-detail/'.$data['id']) }}" data-layout="" data-size="">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fhome&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a>
                            </div>
                        </div>
                        <hr class="mb40">
                        <h4 class="mb40 text-uppercase font400"><b>About Author</b></h4>
                        <div class="media mb40">
                            <img src="{{ asset($author_avatar) }}" alt="" width="80px" class="author-img">
                            <div class="media-body ml-3">
                                <h5 class="mt-0 font500">{{ $author_name }}</h5> Cras sit amet nibh libero, in gravida
                                nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                                vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <hr class="mb40">
                        <h5 class="mb40 text-uppercase font400"><b>Comments</b></h5>
                        <div class="media mb40">
                            <i class="d-flex mr-3 fa fa-user-circle-o fa-2x"></i>
                            <div class="media-body">
                                <h5 class="font400 clearfix">
                                    <a href="#" class="float-right">Reply</a>
                                    Marcus Rashford</h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
                                aut commodi cumque deleniti distinctio, dolorum eum incidunt laudantium maxime molestiae
                                nisi optio perspiciatis provident quibusdam reiciendis repellat sequi sint voluptatum?
                            </div>
                        </div>
                        <hr class="mb40">
                        <h5 class="mb40 text-uppercase font400"><b>Post a comment</b></h5>
                        <form role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="You name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Comment"></textarea>
                            </div>
                            <div class="clearfix float-right">
                                <button type="button" class="btn btn-dark btn-md">Submit</button>
                            </div>
                        </form>
                    </div>
                </article>

            </div>
            <div class="col-md-3 mb40">
                <div class="search-post">
                    <form class="form-search" method="post" action="{{URL::to('search-post')}}">
                        <label>
                            <input class="form-control" name="keyword_submit" type="text" placeholder="Search..">
                        </label>
                        <button type="submit" name="search" class="btn btn-sm"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="banner mt-3">
                    <a href=""><img src="{{ asset('WebPage/img/poster/poster1.jpg') }}" alt=""></a>
                </div>
                <div class="tag-post">
                    @foreach($tags as $key => $tag_item)
                        @include('pages.common.tag_item')
                    @endforeach
                </div>
                <div>
                    <h5>Newest post</h5>
                    <ul class="list-unstyled">
                        @foreach($data_latest as $item)
                            <li class="media">
                                <a href="{{ URL::to('post-detail/'.$item['id']) }}">
                                    @if(file_exists($item['image']))
                                        <img class="d-flex mr-2 img-fluid" src="{{ asset($item['image']) }}">
                                    @else
                                        <img class="d-flex mr-2 img-fluid" src="{{ asset('/storage/public/uploads/img/'.$item['image']) }}">
                                    @endif
                                </a>
                                <div class="media-body">
                                    <h5><a href="{{ URL::to('post-detail/'.$item['id']) }}">{{ $item['title'] }}</a></h5>
                                    <small><i class="fa fa-calendar-o mr-2"></i>{{ date('d/m/Y', strtotime($item['created_at'])) }}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="banner mt-3">
                    <a href=""><img src="{{ asset('WebPage/img/poster/poster2.jpg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
@endsection
