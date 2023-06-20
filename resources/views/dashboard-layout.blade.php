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
    <a href="{{URL::to('dashboard')}}" class="nav-item"><i class="material-icons">dashboard</i> Dashboard</a>
    <a href="{{URL::to('category-list')}}" class="nav-item"><i class="fas fa-list"></i> Category</a>
    <a href="{{URL::to('brand-list')}}" class="nav-item"><i class="fas fa-award"></i> Brand</a>
    <a href="{{URL::to('product-list')}}" class="nav-item"><i class="fas fa-box-open"></i> Product</a>
    <hr>
    <h5>Order</h5>
    <a href="{{URL::to('order-waiting')}}" class="nav-item"><i class="fas fa-shipping-fast"></i> Waiting order</a>
    <a href="{{URL::to('order-list')}}" class="nav-item"><i class="material-icons">list</i> List order</a>
    <hr>
    <h5>User manager</h5>

    <a href="{{URL::to('admin-user-manage')}}/<?php
        $admin_name = Session::get('fullname');
        if($admin_name){
            echo $admin_name;
        }
    ?>"  class="nav-item">
        <i class="fas fa-user-shield"></i> Admin user</a>
    <a href="{{URL::to('client-user-manage')}}" class="nav-item"><i class="fas fa-user-edit"></i> Client user</a>
</div>

@yield('main')
@yield('content')

<script src="{{{'public/back-end/assets/js/index.js'}}}"></script>
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
<script src="{{{'../WebPage/resources/js/index.js'}}}"></script>
</body>
