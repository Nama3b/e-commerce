@extends('layout')
@section('content')
    <div class="product-detail-main">
        <div class="container">
            <div class="row">
                @foreach($detail as $key => $detail_item)
                    <div class="product-detail">
                        <div class="product-detail-title">
                            <p><a href="{{ URL::to('home') }}">Home</a>
                                / <a
                                    href="{{ URL::to('product-by-brand/'.$detail_item['brand_id'])}}">{{$detail_item['brand']['name'] }}</a>
                                / <a
                                    href="{{ URL::to('product-detail/'.$detail_item['id'])}}">{{$detail_item['name'] }}</a>
                            </p>
                        </div>
                        <div class="product-main">
                            <div class="col-xs-12 col-lg-6 text-center">
                                <div class="tag text-left">
                                    <a href="" class="">100% Authentic</a>
                                    <a href="" class="">Condition: New</a>
                                </div>
                                <div class="img-detail">
                                    @if(file_exists($detail_item['image']))
                                        <img src="{{ asset($detail_item['image']) }}" alt="" width="100%">
                                    @else
                                        <img src="{{ asset('/storage/public/uploads/img/'.$detail_item['image']) }}"
                                             alt="" width="100%">
                                    @endif
                                </div>
                                <div class="feature d-flex">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            Share with:
                                            <a href=""><i class="fab fa-instagram"></i></a>
                                            <a href=""><i class="fab fa-twitter-square"></i></a>
                                            <div class="fb-share-button" data-href="{{ URL::to('/product-detail/'.$detail_item['id']) }}" data-layout="" data-size="">
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fhome&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <i class="fas fa-heart"></i> Liked
                                        ({{ count(array_column($favorites, 'favorites')[0]) }})
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="product-detail-title text-center">
                                    <h2><u>{{$detail_item['name']}}</u></h2>
                                    <div class="product-detail-selection">
                                        <h2><b>${{ number_format($detail_item['price'], 0, '', '.') }}</b></h2>
                                        <div class="product-detail-feature">
                                            <div class="qty-select d-flex">
                                                <div class="qty col-6 d-flex">
                                                    <p>Quantity: </p> <input type="text" name="qty" min="1" value="1">
                                                </div>
                                                <div class="col-6">
                                                    <select name="" id="">
                                                        <option value="">Size: All</option>
                                                        <option value="">Size: 43</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <form action="{{ URL::to('add-cart') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-dark"><i class="mr-2"></i>Buy
                                                </button>
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="productId_hidden"
                                                       value="{{ $detail_item['id'] }}">
                                            </form>
                                            <div class="d-flex">
                                                <button class="btn btn-outline-success mr-2">
                                                    <a href="{{ URL::to('my-cart') }}"><i
                                                            class="fas fa-shopping-cart"></i></a>
                                                </button>
                                                @if(Auth()->guard('customer')->user())
                                                    @if($detail_item['favorites'])
                                                        <form
                                                            action="{{ URL::to('update-favorite').'/'.(int)implode(array_column($detail_item['favorites'],'id')) }}"
                                                            method="post" class="mr-2" style="width: 120%">
                                                            @method('PATCH')
                                                            @csrf
                                                            <button class="btn btn-outline-danger mr-2"><i
                                                                    class="fas fa-heart"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ URL::to('add-favorite') }}" method="post"
                                                              class="mr-2" style="width: 120%">
                                                            @csrf
                                                            <input type="hidden" name="id_hidden"
                                                                   value="{{$detail_item['id']}}">
                                                            <input type="hidden" name="type" value="PRODUCT">
                                                            <button class="btn btn-outline-danger mr-2"><i
                                                                    class="far fa-heart"></i></button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <button class="btn btn-outline-danger mr-2" onclick="signup()"><i
                                                            class="far fa-heart"></i></button>
                                                @endif
                                                <button class="btn btn-outline-primary"><i
                                                        class="fas fa-share-square"></i></button>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-8 text-left">
                                                    <small>{{ $detail_item['quantity'] }}
                                                        @if($detail_item['quantity'] > 1)
                                                            items
                                                        @else
                                                            item
                                                        @endif
                                                        already had in storage</small>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <small>{{ $count }}@if($count > 1)
                                                            items
                                                        @else item
                                                        @endif
                                                        sold</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-detail-info">
                        <h4>Product Details</h4>
                        <div class="product-description">
                            <div class="col-xs-12 col-lg-6">
                                <p>{{$detail_item['description']}}
                                    Our product Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente
                                    reprehenderit nisi harum illum nihil nesciunt soluta commodi fugit officia. Non
                                    nihil
                                    ut, veritatis dicta ipsum ullam saepe aperiam, accusamus..
                                    <br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio necessitatibus
                                    alias
                                    omnis, optio.
                                </p>
                            </div>
                            <div class="col-xs-12 col-lg-6 table-info">
                                <table>
                                    <tr>
                                        <td>Style</td>
                                        <td>555088-036</td>
                                    </tr>
                                    <tr>
                                        <td>Colorway</td>
                                        <td>BLACK/WHITE-PARTICLE GREY</td>
                                    </tr>
                                    <tr>
                                        <td>Retail Price</td>
                                        <td>${{ number_format($detail_item['price'], 0, '', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Release Date</td>
                                        <td>03/12/2022</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="related-product col">
                    <h4>Related product</h4>
                    @foreach($products_relate as $key => $product_item)
                        @include('pages.common.product_item')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
