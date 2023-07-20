@extends('layout')
@section('content')
    <div class="home-main">
        <div class="carousel-section">
            <div id="postCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href=""><img class="d-block w-100"
                                        src="{{'WebPage/img/poster/NikeNOCTA_HotStepAirTerra_Translated_Internal_Banners_Primary_Desktop.jpeg'}}"
                                        alt="First slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img class="d-block w-100"
                                        src="{{'WebPage/img/poster/GucciEvergreen_Internal_Banners_Primary_Desktop.webp'}}"
                                        alt="Second slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img class="d-block w-100"
                                        src="{{'WebPage/img/poster/The-Spin-3-22-Primary_Desktop-EN.jpeg'}}"
                                        alt="Third slide"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="shopping-section">
            <div class="section-item">
                <div class="container">
                    <div class="brand-section">
                        <div class="row justify-content-center">
                            <div class="d-flex">
                                @foreach($brand_all as $key => $brand_item)
                                    <div class="brand col-2">
                                        <a href="{{ URL::to('product-by-brand/'.$brand_item->id) }}"><img src="{{$brand_item->thumbnail_image}}" alt=""></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="d-flex">
                            <div class="col-6">
                                <h6><i class="far fa-star mr-2"></i>Best seller</h6>
                            </div>
                            <div class="col-6 text-right">
                                <p><a href="{{URL::to('product')}}">See all <i
                                            class="fas fa-long-arrow-alt-right"></i></a></p>
                            </div>
                        </div>
                        <div class="form-product">
                            @foreach($product_best_seller as $key => $product_item)
                                @include('pages.common.product_item')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-brand">
                <div class="container">
                    <div id="carouselbanner" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href=""><img class="d-block w-100"
                                                src="{{'WebPage/img/banner/Air-Jordan-1_s-Under-200_Primary_Desktop_EN.webp'}}"
                                                alt="First slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img class="d-block w-100"
                                                src="{{'WebPage/img/banner/Summer2023-Merch-A&AEventWear-Wedding-M-W_Primary_Desktop_EN.webp'}}"
                                                alt="Second slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img class="d-block w-100"
                                                src="{{'WebPage/img/banner/Summer2023-Sunglasses_Primary_Desktop_EN.webp'}}"
                                                alt="Third slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img class="d-block w-100"
                                                src="{{'WebPage/img/banner/Nike-Dunks-Under-$100-Evergreen-assetPrimary_Desktop.webp'}}"
                                                alt="Four slide"></a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselbanner" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselbanner" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="section-item">
                <div class="container">
                    <div class="brand-item">
                        <div class="row justify-content-center">
                            <div class="d-flex">
                                @foreach($brand_sneaker as $key => $brand_item)
                                    <div class="brand-banner">
                                        @include('pages.common.brand_item')
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
                                <p><a href="{{URL::to('/product-by-category/1')}}">See all <i
                                            class="fas fa-long-arrow-alt-right"></i></a></p>
                            </div>
                        </div>
                        <div class="form-product">
                            @foreach($product_sneakers as $key => $product_item)
                                @if($product_item['category_id'] == 1)
                                    @include('pages.common.product_item')
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="brand-item">
                        <div class="row">
                            <div class="d-flex">
                                @foreach($brand_clothes as $key => $brand_item)
                                    @include('pages.common.brand_item')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="d-flex">
                            <div class="col-6">
                                <h6><i class="far fa-star mr-2"></i>Popular clothes</h6>
                            </div>
                            <div class="col-6 text-right">
                                <p><a href="{{URL::to('/product-by-category/2')}}">See all <i
                                            class="fas fa-long-arrow-alt-right"></i></a></p>
                            </div>
                        </div>
                        <div class="form-product">
                            @foreach($product_clothes as $key => $product_item)
                                @if($product_item['category_id'] == 2)
                                    @include('pages.common.product_item')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="sale-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="sale-top">
                            <div class="col-8">
                                <a href=""><img
                                        src="{{'WebPage/img/banner/Running_Shoes_for_Summer_assetsSecondaryA.webp'}}"
                                        alt=""></a>
                            </div>
                            <div class="col-4">
                                <a href=""><img src="{{'WebPage/img/banner/Father_s-Day-editorial-01_SecondaryB.webp'}}"
                                                alt=""></a>
                            </div>
                        </div>
                        <div class="sale-bottom">
                            <div class="col-6">
                                <a href=""><img src="{{'WebPage/img/banner/sale-bottom1.png'}}" alt=""></a>
                            </div>
                            <div class="col-6">
                                <a href=""><img src="{{'WebPage/img/banner/sale-bottom2.png'}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-item">
                <div class="product-item">
                    <div class="container">
                        <div class="d-flex">
                            <div class="col-6">
                                <h6><i class="far fa-star mr-2"></i>Popular watches</h6>
                            </div>
                            <div class="col-6 text-right">
                                <p><a href="{{URL::to('/product-by-category/3')}}">See all <i
                                            class="fas fa-long-arrow-alt-right"></i></a></p>
                            </div>
                        </div>
                        <div class="form-product">
                            <div class="d-flex">
                                {{ csrf_field() }}
                                @foreach($product_watches as $key => $product_item)
                                    @if($product_item['category_id'] == 3)
                                        @include('pages.common.product_item')
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="brand-section">
                    <div class="container">
                        <h4 class="text-center"><b>Popular brands</b></h4>
                        <div id="brandCarousel" class="carousel slide" data-ride="carousel">
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
                            <div class="col-6 text-right"><h6><a href="">See all <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </h6></div>
                        </div>
                        <div class="news-section">
                            @foreach($news as $key => $news_item)
                                @include('pages.common.news_item')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="profit-item">
                <div class="container">
                    <div class="profit fade-in">
                        <div class="col-4 slide-in">
                            <i class="fas fa-money-bill-wave"></i>
                            <h4><b>Reputation guaranteed</b></h4>
                            <h6>Lorem, ipsum dolor sit amet, consectetur adipisicing.</h6>
                        </div>
                        <div class="col-4 slide-in">
                            <i class="fa fa-line-chart"></i>
                            <h4><b>Profit per day</b></h4>
                            <h6>Lorem, ipsum dolor sit, amet consectetur adipisicing.</h6>
                        </div>
                        <div class="col-4 slide-in">
                            <i class="fab fa-bitcoin"></i>
                            <h4><b>Digital occurency</b></h4>
                            <h6>Lorem ipsum dolor sit amet consectetur adipisicing.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
