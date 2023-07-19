<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link href="{{{'../Dashboard/img/tab_logo.png'}}}" rel="icon">
    <link rel="stylesheet" href="{{{'../Dashboard/css/dashboard.css'}}}">

    <link rel="stylesheet" href="{{'../WebPage/resources/boostrap/bootstrap.min.js'}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{{'../WebPage/resources/fontawesome/css/all.css'}}}">
    <link rel="stylesheet" href="{{{'../WebPage/resources/font-awesome-4.7.0/css/font-awesome.min.css'}}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div id="mySidebar" class="sidebar">
    <div class="logo d-flex">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-angle-double-left"></i></a>
        <a href="{{URL::to('./home')}}" class="logo-img">
            <img src="{{'../Dashboard/img/admin-logo.png'}}" alt="">
        </a>
    </div>
    <hr>
    <h5>Product manager</h5>
    <a href="{{URL::to('dashboard/home')}}" class="nav-item"><i class="material-icons">dashboard</i>Dashboard</a>
    <a href="{{URL::to('dashboard/product_category')}}" class="nav-item"><i class="fas fa-list ml-1"></i>Category</a>
    <a href="{{URL::to('dashboard/brand')}}" class="nav-item"><i class="fas fa-award ml-1"></i> Brand</a>
    <a href="{{URL::to('dashboard/product')}}" class="nav-item"><i class="fas fa-box-open"></i>Product</a>
    <hr>
    <h5>Post</h5>
    <a href="{{URL::to('dashboard/post')}}" class="nav-item"><i class="far fa-newspaper mr-1"></i>Post</a>
    <hr>
    <h5>Order</h5>
    <a href="{{URL::to('dashboard/order')}}" class="nav-item"><i class="fas fa-money-check-alt"></i> Order</a>
    <a href="{{URL::to('dashboard/delivery')}}" class="nav-item"><i class="fas fa-luggage-cart"></i> Delivery</a>
    {{--    <a href="{{URL::to('dashboard/shipping')}}" class="nav-item"><i class="fas fa-shipping-fast"></i> Shipping</a>--}}
    <hr>
{{--    <h5>Resources</h5>--}}
{{--    <a href="{{URL::to('dashboard/comment')}}" class="nav-item"><i class="far fa-comment-alt"></i> Manage Comment</a>--}}
{{--    <a href="" class="nav-item"><i class="fas fa-hand-holding-heart"></i> Manage--}}
{{--        Favorite</a>--}}
{{--    <a href="{{URL::to('dashboard/image')}}" class="nav-item"><i class="far fa-images"></i> Manage Image</a>--}}
{{--    <a href="{{URL::to('dashboard/tag')}}" class="nav-item"><i class="fas fa-tags"></i> Manage Tag</a>--}}
    <hr>
    <h5>User manager</h5>
    <a href="{{URL::to('')}}" class="nav-item"><i class="fas fa-user-shield"></i> Admin user</a>
{{--    <a href="{{URL::to('')}}" class="nav-item"><i class="fas fa-users"></i> Client user</a>--}}
</div>
<div id="main">
    <div class="header-section">
        <div class="header-left col-6 d-flex">
            <button class="openbtn" onclick="openNav()">☰</button>
            <div class="form-search">
                <input type="text" placeholder="Search..." id="search">
                <i class="fas fa-search" id="search-ic"></i>
            </div>
        </div>
        @php ($member = Auth()->guard('member')->user())
        <div class="header-right col-6 d-flex">
            <a href="" class="noti-icon"><i class="material-icons">notifications_none</i></a>
            <div class="dropdown d-flex">
                <button class="btn btn-outline-dark user-btn" type="button" data-toggle="dropdown">
                    <img src="{{{'../Dashboard/img/user_logo.jpg'}}}" alt="" width="90%">
                </button>
                <i class="fas fa-caret-down d-none"></i>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="">{{$member->full_name}} !</a></li>
                    <li>My profile</li>
                    <li>Setting</li>
                    <hr>
                    <li>
                        <form action="{{URL::to('/logout')}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="popup">
        <div class="popup-content">
            <span id="popup-message"></span><i class="far fa-check-circle"></i>
        </div>
    </div>

    @yield('main')
    @yield('content')

</div>

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
    function openNav() {
        document.getElementById("mySidebar").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="{{ asset('WebPage/js/index.js') }}"></script>
<script src="{{ mix('Dashboard/js/app.js') }}"></script>

</body>
