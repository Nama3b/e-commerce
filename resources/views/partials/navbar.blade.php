<nav class="navbar navbar-expand-sm navbar-fixed-top">
    <div class="nav-left col-xs-12 col-lg-6 fade-in">
        <button class="navbar-toggler" type ="button" data-toggle ="collapse" data-target="#colNav">
            <i class="fas fa-align-justify"></i>
        </button>
        <a class="navbar-brand" href="{{URL::to('home')}}">
            <img src="{{ asset('WebPage/img/home/project_name.png') }}" alt="">
        </a>
        <form class="form-search" method="get" action="{{ URL::to('search-product') }}">
            <label>
                <input class="form-control" name="keyword_submit" type="text" placeholder="Search product..">
            </label>
            <button type="submit" class="btn btn-sm"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="nav-right col-xs-12 col-lg-6 fade-in slide-in collapse navbar-collapse" id ="colNav">
        <ul class="navbar-nav slide-in">
            <li class="nav-item active">
                <div><a class="nav-link" href="{{ URL::to('home') }}">Home</a></div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdownProduct" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Product</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownProduct">
                        <a class="dropdown-item" href="{{ URL::to('product') }}">All</a>
                        @foreach($categories as $item)
                            <a class="dropdown-item"
                               href="{{ URL::to('product-by-category'.'/'.$item->id) }}">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdownBrand" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Brand</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownBrand">
                        @foreach($brand_all as $item)
                            <a class="dropdown-item"
                               href="{{ URL::to('product-by-brand/'.$item->id) }}">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div><a class="nav-link" href="{{ URL::to('post') }}">Post</a></div>
            </li>
            @php ($customer = Auth()->guard('customer')->user())
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-outline-dark btn-noti" type="button" data-toggle="dropdown">
                        <i class="material-icons">notifications_none</i>
                    </button>
                    <p class="count-noti">9+</p>
                    <i class="fas fa-caret-down d-none"></i>
                    <ul class="dropdown-menu dropdown-noti">
                        <li>
                            <div class="d-flex">
                                <div class="noti-item-img">
                                    <a href="">
                                        <img src="{{ asset('WebPage/img/home/logo.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="d-flex">
                                    <div class="noti-item-infor">
                                        <a href="">E Project</a>
                                        <p>Welcome to our shop!</p>
                                        <small>Now</small>
                                    </div>
                                    <div class="noti-item-remove">
                                        <a href=""><i class="fa fa-close"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-dark btn-cart" type="button" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <p class="count-cart">{{ $count_cart }}</p>
                    <i class="fas fa-caret-down d-none"></i>
                    <ul class="dropdown-menu dropdown-cart">
                        @if($cart)
                            <div class="carts">
                                @foreach($cart as $cart_item)
                                    <li>
                                        <div class="d-flex">
                                            <div class="cart-item-img col-3">
                                                <a href="{{ URL::to('/product-detail/'.$cart_item['id']) }}">
                                                    @if(file_exists($cart_item['image']))
                                                        <img src="{{ asset($cart_item['image']) }}" alt=""
                                                             height="45px">
                                                    @else
                                                        <img
                                                            src="{{ asset('/storage/public/uploads/img/'.$cart_item['image']) }}"
                                                            alt="" height="45px">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="cart-item-infor col-7">
                                                <p>
                                                    <a href="{{ URL::to('/product-detail'.'/'.$cart_item['id']) }}">{{ $cart_item['name'] }}</a>
                                                </p>
                                                <small>${{ number_format($cart_item['price'], 0, '', '.') }}
                                                    x {{ $cart_item['quantity'] }}</small>
                                            </div>
                                            <div class="cart-item-remove col-2">
                                                <form action="{{ URL::to('/remove-cart') }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if ($customer)
                                                        <input type="hidden" name="productId_hidden"
                                                               value="{{ $cart_item['cart_id'] }}">
                                                    @else
                                                        <input type="hidden" name="productId_hidden"
                                                               value="{{ $cart_item['id'] }}">
                                                    @endif
                                                    <button class="btn btn-sm" type="submit"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                @endforeach
                            </div>
                        @else
                            <div class="container d-flex justify-content-center align-item-center pt-3">
                                <img src="{{ asset('WebPage/img/shopping/no-order.png') }}" alt=""
                                     style="height: 70px">
                            </div>
                            <div class="h-100 d-flex justify-content-center align-item-center pt-3">
                                <h6><b>Don't have product yet</b></h6>
                            </div>
                        @endif
                        <div class="d-flex">
                            <a href="{{ URL::to('/my-cart') }}">
                                <button class="btn btn-sm btn-outline-dark ml-2">Cart</button>
                            </a>
                        </div>
                    </ul>
                </div>
                @if ($customer)
                    <div class="dropdown">
                        <button class="btn btn-outline-dark btn-user" type="button" data-toggle="dropdown">
                            @if(file_exists($customer->image))
                                <img src="{{ asset($customer->image) }}" width="90%">
                            @else
                                <img src="{{ asset('/storage/public/uploads/img/'.$customer->image) }}" width="90%">
                            @endif
                        </button>
                        <i class="fas fa-caret-down d-none"></i>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ URL::to('customer-profile') }}">{{ $customer->full_name }}</a></li>
                            <li><a href="{{ URL::to('order-status') }}">Order status</a></li>
                            <li><a href="{{ URL::to('saved-post') }}">Saved post</a></li>
                            <li><a href="">Setting</a></li>
                            <hr>
                            <li>
                                <form action="{{ URL::to('/logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <button class="btn btn-dark btn-signup"><a href="{{ URL::to('login') }}">Sign In</a></button>
                @endif
            </div>
        </ul>
    </div>
</nav>
