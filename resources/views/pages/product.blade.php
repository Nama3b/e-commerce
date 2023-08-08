@extends('layout')
@section('content')
    <div class="product-main">
        <div class="banner-product">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-5">
                        <h1><b>Products</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, quidem facere aspernatur
                            natus
                            voluptatum ex sequi doloremque molestiae, sunt inventore est exercitationem quia accusamus
                            esse
                            consectetur ipsam corporis, vitae.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-body">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-2">
                        <div class="left-item category-item">
                            <h5>Category</h5>
                            <div class="cat-ele">
                                @foreach($categories as $key => $category_item)
                                    <a href="{{URL::to('product-by-category'.'/'.$category_item->id)}}"
                                       class="">{{$category_item->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="left-item brand-item">
                            <h5>Brand</h5>
                            <div class="brand-ele">
                                @foreach($brand_all as $key => $brand_item)
                                    <a href="{{URL::to('product-by-brand'.'/'.$brand_item->id)}}"
                                       class="">{{$brand_item->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-10">
                        <div class="feature-product">
                            <div class="col-xs-12 col-lg-6 product-title">
                                <p><a href="{{ URL::to('home') }}">Home</a> / <a
                                        href="{{ URL::to('product') }}">Product</a></p>
                            </div>
                            <div class="col-xs-12 col-lg-6 text-right mb-3">
                                <select name="sort" id="">
                                    <option value="">Sort By: Feature</option>
                                    <option value="">Sort By: Most popular</option>
                                    <option value="">Sort By: Lowest Asks</option>
                                    <option value="">Sort By: Highest Bids</option>
                                </select>
                            </div>
                        </div>
                        <div class="product-section">
                            @foreach($products as $key => $product_item)
                                <form action="{{URL::to('/add-cart')}}" method="post">
                                    @csrf
                                    @include('pages.common.product_item')
                                </form>
                            @endforeach
                        </div>
                        <div class="pagination">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
