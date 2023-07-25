@extends('layout')
@section('content')
    <div class="post-detail container pb50">
        <div class="row">
            <div class="col-md-9 mb40">
                <article>
                    <div style="height: 450px; overflow: hidden;">
                        <img src="{{ asset($data['images'][0]['image']) }}" alt="" class="img-fluid mb30"></div>
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
                        <ul class="list-inline share-buttons">
                            <li class="list-inline-item">Share Post:</li>
                            <li class="list-inline-item">
                                <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                                    <button class="btn btn-sm btn-outline-primary"><i class="fa fa-facebook"></i>
                                    </button>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round">
                                    <button class="btn btn-sm btn-outline-primary"><i class="fa fa-twitter"></i>
                                    </button>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-icon-sm si-dark si-colored-linkedin si-gray-round">
                                    <button class="btn btn-sm btn-outline-primary"><i class="fa fa-linkedin"></i>
                                    </button>
                                </a>
                            </li>
                        </ul>
                        <hr class="mb40">
                        <h4 class="mb40 text-uppercase font500">About Author</h4>
                        <div class="media mb40">
                            <img src="{{ $author_avatar }}" alt="" width="100px" class="author-img">
                            <div class="media-body ml-3">
                                <h5 class="mt-0 font700">{{ $author_name }}</h5> Cras sit amet nibh libero, in gravida
                                nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                                vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <hr class="mb40">
                        <h4 class="mb40 text-uppercase font500">Comments</h4>
                        <div class="media mb40">
                            <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                            <div class="media-body">
                                <h5 class="mt-0 font400 clearfix">
                                    <a href="#" class="float-right">Reply</a>
                                    Marcus Rashford</h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
                                aut commodi cumque deleniti distinctio, dolorum eum incidunt laudantium maxime molestiae
                                nisi optio perspiciatis provident quibusdam reiciendis repellat sequi sint voluptatum?
                            </div>
                        </div>
                        <div class="media mb40">
                            <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                            <div class="media-body">
                                <h5 class="mt-0 font400 clearfix">
                                    <a href="#" class="float-right">Reply</a>
                                    Antony Martial</h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
                                aspernatur at culpa, deleniti dolore ipsa magnam maxime nam praesentium voluptates?
                            </div>
                        </div>
                        <hr class="mb40">
                        <h5 class="mb40 text-uppercase font500">Post a comment</h5>
                        <form role="form">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="You name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
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
                    <h4 class="sidebar-title">Latest News</h4>
                    <ul class="list-unstyled">
                        @foreach($data_latest as $item)
                            <li class="media">
                                <a href="{{ URL::to('post-detail/'.$item['id']) }}">
                                    <img class="d-flex mr-3 img-fluid" width="64" src="{{ asset($item['image']) }}">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><a href="{{ URL::to('post-detail/'.$item['id']) }}">{{ $item['title'] }}</a></h5>
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
