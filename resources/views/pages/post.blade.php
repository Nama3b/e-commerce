@extends('layout')
@section('content')
    <div class="post-main">
        <div class="carousel-section">
            <div id="posterCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href=""><img class="d-block w-100"
                                        src="{{'WebPage/img/poster/browse-header-collectibles-new.png'}}"
                                        alt="First slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img class="d-block w-100"
                                        src="{{'WebPage/img/poster/browse-headersSneakers.jpg'}}"
                                        alt="Second slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img class="d-block w-100"
                                        src="{{'WebPage/img/poster/browse-headersStreetwear.jpg'}}"
                                        alt="Third slide"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="popular-post">
                <div class="d-flex">
                    <div class="col-6">
                        <h6><i class="far fa-star mr-2"></i>Popular post</h6>
                    </div>
                    <div class="col-6 text-right">
                        <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all <i
                                    class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>
                <div class="form">
                    @foreach($popular_post as $key => $post_item)
                        @include('pages.common.post_item_1')
                    @endforeach
                </div>
            </div>

            <div class="carousel-post">
                <div id="carouselpost" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href=""><img class="d-block w-100"
                                            src="{{'WebPage/img/poster/browse-headersSneakers.jpg'}}"
                                            alt="First slide"></a>
                        </div>
                        <div class="carousel-item">
                            <a href=""><img class="d-block w-100"
                                            src="{{'WebPage/img/poster/browse-header-collectibles-new.png'}}"
                                            alt="Second slide"></a>
                        </div>
                        <div class="carousel-item">
                            <a href=""><img class="d-block w-100"
                                            src="{{'WebPage/img/poster/browse-headersStreetwear.jpg'}}"
                                            alt="Third slide"></a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselpost" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselpost" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="newest-post">
                <div class="post-item">
                    <div class="d-flex">
                        <div class="col-6">
                            <h6><i class="far fa-star mr-2"></i>Newest post</h6>
                        </div>
                        <div class="col-6 text-right">
                            <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all <i
                                        class="fas fa-long-arrow-alt-right"></i></a></p>
                        </div>
                    </div>
                    <div class="news-section">
                        @foreach($newest_post as $key => $post_item)
                            @include('pages.common.post_item_2')
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="suggest-post">
                <div class="post-item">
                    <div class="d-flex">
                        <div class="col-6">
                            <h6><i class="far fa-star mr-2"></i>Suggest post</h6>
                        </div>
                        <div class="col-6 text-right">
                            <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all <i
                                        class="fas fa-long-arrow-alt-right"></i></a></p>
                        </div>
                    </div>
                    <div class="news-section">
                        @foreach($suggest_post as $key => $post_item)
                            @include('pages.common.post_item_2')
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
            <div class="body-post">
                <div class="col-xs-12 col-lg-9">
                    <div class="nav-tab">
                        @foreach($post_all as $key => $post_item)
                            @include('pages.common.post_item_1')
                        @endforeach
                    </div>
                    <div class="pagination">

                    </div>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <div class="search-post">
                        <form class="form-search" method="get" action="{{URL::to('search-post')}}">
                            <label>
                                <input class="form-control" name="keyword" type="text" placeholder="Search post..">
                            </label>
                            <button type="submit" class="btn btn-sm"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="banner">
                        <a href=""><img src="{{'WebPage/img/poster/poster1.jpg'}}" alt=""></a>
                    </div>
                    <div class="tag-post">
                        @foreach($tags as $key => $tag_item)
                            @include('pages.common.tag_item')
                        @endforeach
                    </div>
                    <div class="banner">
                        <a href=""><img src="{{'WebPage/img/poster/poster2.png'}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
