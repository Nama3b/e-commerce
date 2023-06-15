@extends('layout')
@section('content')
    <div class="carousel-section">
        <div id="posterCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <a href="">
                        <img src="{{{'WebPage/img/poster/browse-header-collectibles-new.png'}}}" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <img src="{{{'WebPage/img/poster/browse-headersSneakers.png'}}}" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <img src="{{{'WebPage/img/poster/browse-headersStreetwear.png'}}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <div class="popular-post">
                <form action="">
                    @include('pages.common.post_item_1')
                </form>
            </div>

            <div class="carousel-post">
                <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="">
                                <img src="{{{'WebPage/img/poster/browse-header-collectibles-new.png'}}}" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <img src="{{{'WebPage/img/poster/browse-headersSneakers.png'}}}" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <img src="{{{'WebPage/img/poster/browse-headersStreetwear.png'}}}" alt="">
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="newest-post">
                <div class="product-item">
                    <div class="d-flex">
                        <div class="col-6">
                            <h6><i class="far fa-star mr-2"></i>Newest post</h6>
                        </div>
                        <div class="col-6 text-right">
                            <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all <i
                                        class="fas fa-long-arrow-alt-right"></i></a></p>
                        </div>
                    </div>
                    <form action="{{URL::to('/save')}}" method="post">
                        {{ csrf_field() }}
{{--                        @foreach($product_sneakers as $key => $product_item)--}}
                            @include('pages.common.post_item_2')
{{--                        @endforeach--}}
                    </form>
                </div>
            </div>

            <div class="suggest-post">
                <div class="product-item">
                    <div class="d-flex">
                        <div class="col-6">
                            <h6><i class="far fa-star mr-2"></i>Suggest post</h6>
                        </div>
                        <div class="col-6 text-right">
                            <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all <i
                                        class="fas fa-long-arrow-alt-right"></i></a></p>
                        </div>
                    </div>
                    <form action="{{URL::to('/save')}}" method="post">
                        {{ csrf_field() }}
{{--                        @foreach($product_sneakers as $key => $product_item)--}}
                            @include('pages.common.post_item_2')
{{--                        @endforeach--}}
                    </form>
                </div>
            </div>

            <div class="main-post">
                <div class="col-9">
                    <div class="nav-tab">
                        @include('pages.common.post_item_1')
                    </div>
                    <div class="pagination">

                    </div>
                </div>
                <div class="col-3">
                    <div class="search-post">

                    </div>
                    <div class="tag-post">

                    </div>
                    <div class="banner">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
