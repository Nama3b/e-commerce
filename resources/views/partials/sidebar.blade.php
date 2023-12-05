<div class="logo d-flex">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-angle-double-left"></i></a>
    <a href="{{ URL::to('./home') }}" class="logo-img">
        <img src="{{ asset('Dashboard/img/admin-logo.png') }}" alt="">
    </a>
</div>
<hr>
<h5>Product manager</h5>
<a href="{{ URL::to('dashboard/home') }}" class="nav-item"><i class="material-icons">dashboard</i>Dashboard</a>
<a href="{{ URL::to('dashboard/product_category') }}" class="nav-item"><i class="fas fa-list ml-1"></i>Category</a>
<a href="{{ URL::to('dashboard/brand') }}" class="nav-item"><i class="fas fa-award ml-1"></i> Brand</a>
<a href="{{ URL::to('dashboard/product') }}" class="nav-item"><i class="fas fa-box-open"></i>Product</a>
<hr>
<h5>Post</h5>
<a href="{{ URL::to('dashboard/post') }}" class="nav-item"><i class="far fa-newspaper mr-1"></i>Post</a>
<hr>
<h5>Order</h5>
<a href="{{ URL::to('dashboard/order') }}" class="nav-item"><i class="fas fa-money-check-alt"></i> Order</a>
<a href="{{ URL::to('dashboard/delivery') }}" class="nav-item"><i class="fas fa-luggage-cart"></i> Delivery</a>
{{--    <a href="{{ URL::to('dashboard/shipping') }}" class="nav-item"><i class="fas fa-shipping-fast"></i> Shipping</a>--}}
<hr>
<h5>Resources</h5>
{{--    <a href="{{ URL::to('dashboard/comment') }}" class="nav-item"><i class="far fa-comment-alt"></i> Manage Comment</a>--}}
{{--    <a href="{{ URL::to('dashboard/image') }}" class="nav-item"><i class="far fa-images"></i> Manage Image</a>--}}
<a href="{{ URL::to('dashboard/favorite') }}" class="nav-item"><i class="fas fa-hand-holding-heart"></i> Product Favorite</a>
<a href="{{ URL::to('dashboard/banner') }}" class="nav-item"><i class="far fa-images"></i> Banner</a>
<a href="{{ URL::to('dashboard/tag') }}" class="nav-item"><i class="fas fa-tags"></i> Tag</a>
<hr>
<h5>User manager</h5>
<a href="{{ URL::to('dashboard/member/detail') }}" class="nav-item"><i class="fas fa-user-shield"></i> Admin
    user</a>
{{--    <a href="{{ URL::to('') }}" class="nav-item"><i class="fas fa-users"></i> Client user</a>--}}

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
