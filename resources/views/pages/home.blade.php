@extends('layout')
@section('content')
    {{--    <div class="category-section">--}}
    {{--        <div class="container">--}}
    {{--            <div class="d-flex justify-content-center">--}}
    {{--                <div class="cat-item">--}}
    {{--                    <a href="{{URL::to('/show-product-by-category'.'/'.$cat_item->id)}}"><b>{{$cat_item->name}}</b></a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="carousel-section">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <a href="">
                        <img
                            src="{{{'WebPage/img/poster/NikeNOCTA_HotStepAirTerra_Translated_Internal_Banners_Primary_Desktop.jpeg'}}}"
                            alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <img
                            src="{{{'WebPage/img/poster/FOGEssentialsSS22_Translated_Internal_Banners_Primary_Desktop.webp'}}}"
                            alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <img src="{{{'WebPage/img/poster/GucciEvergreen_Internal_Banners_Primary_Desktop.webp'}}}"
                             alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <img src="{{{'WebPage/img/poster/The-Spin-3-22-Primary_Desktop-EN.jpeg'}}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- shopping -->
    <div class="shopping-section">
        <div class="container">
            <div class="product-item">
                <div class="d-flex">
                    <div class="col-6">
                        <h6><i class="far fa-star mr-2"></i>Best seller</h6>
                    </div>
                    <div class="col-6 text-right">
                        <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all <i
                                    class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>
                <form action="{{URL::to('/add-cart')}}" method="post">
                    {{ csrf_field() }}
                    @foreach($best_seller as $key => $product_item)
                        @include('pages.common.product_item')
                    @endforeach
                </form>
            </div>
            <div class="brand-section">
                <div class="row justify-content-center">
                    <div class="d-flex">
                        @foreach($brands as $key => $brand_item)
                            <div class="brand col-2">
                                <a href=""><img src="{{$brand_item->thumbnail_image}}" alt=""></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="product-item">
                <div class="d-flex">
                    <div class="col-6">
                        <h6><i class="far fa-star mr-2"></i>Popular sneakers</h6>
                    </div>
                    <div class="col-6 text-right">
                        <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all <i
                                    class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>
                <form action="{{URL::to('/add-cart')}}" method="post">
                    {{ csrf_field() }}
                    @foreach($sneakers as $key => $product_item)
                        @if($product_item['category_id'] == 1)
                            @include('pages.common.product_item')
                        @endif
                    @endforeach
                </form>
            </div>
            <div class="product-item">
                <div class="d-flex">
                    <div class="col-6">
                        <h6><i class="far fa-star mr-2"></i>Popular clothes</h6>
                    </div>
                    <div class="col-6 text-right">
                        <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all<i
                                    class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>
                <form action="{{URL::to('/add-cart')}}" method="post">
                    {{ csrf_field() }}
                    @foreach($clothes as $key => $product_item)
                        @if($product_item['category_id'] == 2)
                            @include('pages.common.product_item')
                        @endif
                    @endforeach
                </form>
            </div>
            <div class="product-item">
                <div class="d-flex">
                    <div class="col-6">
                        <h6><i class="far fa-star mr-2"></i>Popular watches</h6>
                    </div>
                    <div class="col-6 text-right">
                        <p><a href="{{URL::to('/show-product-by-category'.'/')}}">See all<i
                                    class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>
                <form action="{{URL::to('/add-cart')}}" method="post">
                    <div class="d-flex">
                        {{ csrf_field() }}
                        @foreach($watches as $key => $product_item)
                            @if($product_item['category_id'] == 3)
                                @include('pages.common.product_item')
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="brand-section">
                <div class="container">
                    <h4 class="text-center"><b>Popular brands</b></h4>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row justify-content-center">
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/jordan.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/supreme_tile.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/yzy.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/ps4.webp'}}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/jordan.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/supreme_tile.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/yzy.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'WebPage/img/brand/ps4.webp'}}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fashion-news">
                <div class="container">
                    <div class="d-flex">
                        <div class="col-6"><h6><i class="far fa-star mr-2"></i>Popular news</h6></div>
                        <div class="col-6 text-right"><h6><a href="">See all <i class="fas fa-long-arrow-alt-right"></i></a>
                            </h6></div>
                    </div>
                    <div class="news-section">
                        <div class="news">
                            <img
                                src="{{{'WebPage/img/news/2022-3-7-hidden-gems-blog-hero-twitter-square-1200x1200.png'}}}"
                                width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible
                                            in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'WebPage/img/news/blog-header-8-1200x1200.jpg'}}}" width="100%"
                                 alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible
                                            in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'WebPage/img/news/Perfect-Fit-3-10-2022-blog-header-1200x1200.png'}}}"
                                 width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible
                                            in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img
                                src="{{{'WebPage/img/news/Pickoftheweek-3-10-22-banners-blog-hero-twitter-square-1200x1200.png'}}}"
                                width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible
                                            in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'WebPage/img/news/The-Rip-03-14-22-blog-header-1200x1200.jpg'}}}"
                                 width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible
                                            in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img
                                src="{{{'WebPage/img/news/2022-3-9-XboxMiniFridge-blog-hero-twitter-square-1200x1200.png'}}}"
                                width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible
                                            in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
