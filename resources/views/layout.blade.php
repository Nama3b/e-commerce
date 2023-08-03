<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eProject</title>
    <link href="{{ asset('WebPage/img/home/tab_logo.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('WebPage/css/index.css') }}">

    <link rel="stylesheet" href="{{ asset('WebPage/resources/boostrap/bootstrap.min.js') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('WebPage/resources/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('WebPage/resources/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<header id="header" class="header-section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-fixed-top">
            <div class="nav-left col-6 fade-in">
                <a class="navbar-brand" href="{{URL::to('home')}}">
                    <img src="{{ asset('WebPage/img/home/project_name.png') }}" alt="">
                </a>
                <form class="form-search" method="get" action="{{URL::to('search-product')}}">
                    <label>
                        <input class="form-control" name="keyword_submit" type="text" placeholder="Search product..">
                    </label>
                    <button type="submit" class="btn btn-sm"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="nav-right col-6 fade-in slide-in collapse navbar-collapse">
                <ul class="navbar-nav slide-in">
                    <li class="nav-item active">
                        <div><a class="nav-link" href="{{URL::to('home')}}">Home</a></div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdownProduct" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Product</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownProduct">
                                <a class="dropdown-item" href="{{URL::to('product')}}">All</a>
                                @foreach($categories as $key => $category_item)
                                    <a class="dropdown-item"
                                       href="{{URL::to('product-by-category'.'/'.$category_item->id)}}">{{$category_item->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdownBrand" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Brand</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownBrand">
                                @foreach($brand_all as $key => $brand_item)
                                    <a class="dropdown-item"
                                       href="{{URL::to('product-by-brand'.'/'.$brand_item->id)}}">{{$brand_item->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div><a class="nav-link" href="{{URL::to('post')}}">Post</a></div>
                    </li>
                    @php ($customer = Auth()->guard('customer')->user())
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
                                            <img src="../WebPage/img/home/logo.jpg" alt="">
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
                                @foreach($cart as $cart_item)
                                    <li>
                                        <div class="d-flex">
                                            <div class="cart-item-img">
                                                <a href="{{ URL::to('/product-detail/'.$cart_item['id']) }}">
                                                    @if(file_exists($cart_item['image']))
                                                        <img src="{{ asset($cart_item['image']) }}" alt="" height="45px">
                                                    @else
                                                        <img src="{{ asset('/storage/public/uploads/img/'.$cart_item['image']) }}" alt="" height="45px">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="d-flex">
                                                <div class="cart-item-infor">
                                                    <p>
                                                        <a href="{{ URL::to('/product-detail'.'/'.$cart_item['id']) }}">{{ $cart_item['name'] }}</a>
                                                    </p>
                                                    <small>${{ number_format($cart_item['price'], 0, '', '.') }}
                                                        x {{ $cart_item['quantity'] }}</small>
                                                </div>
                                                <div class="cart-item-remove">
                                                    <form action="{{ URL::to('/remove-cart') }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="productId_hidden"
                                                               value="{{$cart_item['id']}}">
                                                        <button class="btn btn-sm" type="submit"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                @endforeach
                            @else
                                <div class="container d-flex justify-content-center align-item-center pt-3">
                                    <img src="../WebPage/img/shopping/no-order.png" alt="" style="height: 70px">
                                </div>
                                <div class="h-100 d-flex justify-content-center align-item-center pt-3">
                                    <h6><b>Don't have product yet</b></h6>
                                </div>
                            @endif
                            <div class="d-flex">
                                <a href="{{ URL::to('/my-cart') }}">
                                    <button class="btn btn-sm btn-outline-dark ml-2">Cart</button>
                                </a>
                                <a href="{{URL::to('/checkout')}}">
                                    <button class="btn btn-sm btn-dark ml-2">Checkout</button>
                                </a>
                            </div>
                        </ul>
                    </div>
                    @if ($customer == null)
                        <button class="btn btn-dark btn-signup"><a href="{{URL::to('login')}}">Sign In</a></button>
                    @else
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
                                <li><a href="{{ URL::to('customer-profile') }}">{{$customer->full_name}}</a></li>
                                <li><a href="{{ URL::to('order-status') }}">Order status</a></li>
                                <li><a href="{{ URL::to('saved-post') }}">Saved post</a></li>
                                <li><a href="">Setting</a></li>
                                <hr>
                                <li>
                                    <form action="{{URL::to('/logout')}}" method="post">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

<div id="popup">
    <div class="popup-content">
        <span id="popup-message"></span><i class="far fa-check-circle"></i>
    </div>
</div>

@yield('content')

<footer>
    <div class="container-fluid">
        <div class="d-flex">
            <div class="col-7 d-flex">
                <button class="btn btn-outline-dark favorite" name="favorite">Sneaker</button>
                <button class="btn btn-outline-dark">Clothes</button>
                <button class="btn btn-outline-dark">Watches</button>
                <button class="btn btn-outline-dark">Accessory</button>
            </div>
            <div class="col-5 d-flex">
                <a href="" class="mr-2">FORUM</a> | <a href="" class="ml-2">ABOUT</a>
            </div>
        </div>
        <div class="d-flex cre">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset('WebPage/img/home/project_name_sub.png') }}" alt="" width="70%">
            </div>
            <div class="col-2">
                <ul>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Venam blandis reprehderit, assumeda.</li>
                    <li>Obcaecati ure quaerat?</li>
                    <li>Voluptate adipisci stiae vel.</li>
                </ul>
            </div>
            <div class="col-2">
                <ul>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Deleniti possmus volptate, repuandae.</li>
                    <li><a href="{{URL::to('dashboard/login')}}" style="color:black">Qui</a> officia architecto nobis?
                    </li>
                    <li>Dignissimos fuga vitae sit!</li>
                </ul>
            </div>
            <div class="col-2">
                <ul>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Optio, ipsam quos nobis?</li>
                    <li>Atque aspernatur maiores voluptas.</li>
                    <li>Aperiam vitae cum iste!</li>
                </ul>
            </div>
            <div class="col-2">
                <ul>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Reprehedeit voluptate perspiatis ut.</li>
                    <li>Est pariatur ipsam, ad.</li>
                    <li>Itaque, tempore officis!</li>
                </ul>
            </div>
        </div>
        <div class="d-flex text-center">
            <div class="col-4">
                <h6>Credit with</h6>
                <div class="d-flex justify-content-center">
                    <a href=""><i class="fab fa-cc-mastercard"></i></a>
                    <a href=""><i class="fab fa-cc-amazon-pay"></i></a>
                    <a href=""><i class="fab fa-cc-paypal"></i></a>
                </div>
            </div>
            <div class="col-4">
                <h6>Share with</h6>
                <div class="d-flex justify-content-center">
                    <a href=""><i class="fab fa-facebook-square"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter-square"></i></a>
                </div>
            </div>
            <div class="col-4">
                <h6>Download with</h6>
                <div class="d-flex justify-content-center">
                    <a href=""><i class="fab fa-app-store-ios"></i></a>
                    <a href=""><i class="fab fa-google-play"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex text-center mt-2">
            <div class="col-6"><p>Made with <i class="fa fa-keyboard-o"></i> and <i class="fa fa-hand-stop-o">.</i></p>
            </div>
            <div class="col-6"><h6>Designed by Le Thanh Long.</h6></div>
        </div>
    </div>
</footer>

@if(session('success'))
    <script>
        var popup = document.getElementById("popup");
        var popupMessage = document.getElementById("popup-message");
        popupMessage.innerHTML = "{{ session('success') }}";

        function showElement() {
            popup.classList.add('fade-in');
            popup.style.display = 'block';
        }

        function hideElement() {
            popup.classList.remove('fade-in');
            popup.classList.add('fade-out');
            setTimeout(() => {
                popup.style.display = 'none';
                popup.classList.remove('fade-out');
            }, 1000);
        }

        function showForDuration(duration) {
            showElement();
            setTimeout(hideElement, duration);
        }

        showForDuration(1500);
    </script>
@endif

<script>
    $(document).ready(function () {
        const itemsMainDiv = ('.MultiCarousel');
        const itemsDiv = ('.MultiCarousel-inner');
        let itemWidth = "";
        $('.leftLst, .rightLst').click(function () {
            const condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });
        ResCarouselSize();
        $(window).resize(function () {
            ResCarouselSize();
        });
        function ResCarouselSize() {
            let incno = 0;
            const dataItems = ("data-items");
            const itemClass = ('.item');
            let id = 0;
            let btnParentSb = '';
            let itemsSplit = '';
            const sampwidth = $(itemsMainDiv).width();
            const bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                const itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);
                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });
                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");
            });
        }
        function ResCarousel(e, el, s) {
            const leftBtn = ('.leftLst');
            const rightBtn = ('.rightLst');
            let translateXval = '';
            const divStyle = $(el + ' ' + itemsDiv).css('transform');
            const values = divStyle.match(/-?[\d\.]+/g);
            const xds = Math.abs(values[4]);
            if (e === 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");
                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e === 1) {
                const itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");
                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }
        function click(ell, ee) {
            const Parent = "#" + $(ee).parent().attr("id");
            const slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{ asset('index.js') }}"></script>

</body>
</html>
