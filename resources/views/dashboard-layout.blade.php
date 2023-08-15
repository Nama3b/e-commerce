<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link href="{{ asset('Dashboard/img/tab_logo.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/dashboard.css') }}">

    <!-- Bootstrap packages for dashboard -->
    <link rel="stylesheet" href="{{ asset('WebPage/resources/boostrap/bootstrap.min.js') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for dashboard -->
    <link rel="stylesheet" href="{{ asset('WebPage/resources/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('WebPage/resources/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Datatables for dashboard -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <style>
        #cke_editor {
            width: 100%;
            margin-left: 6px;
        }
    </style>
</head>
<body>

<div id="mySidebar" class="sidebar">
    @include('partials.sidebar')
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
                    <img src="{{ asset('Dashboard/img/user_logo.jpg') }}" alt="" width="90%">
                </button>
                <i class="fas fa-caret-down d-none"></i>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href=""><b>{{ $member->full_name }}</b></a></li>
                    <li><a href="{{ URL::to('dashboard/member/detail') }}">My profile</a></li>
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

    @include('partials.popup')
    @yield('main')
    @yield('content')

</div>

<script src="{{ asset('index.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('editor');

    <!-- Datatables for dashboard -->
    $(document).ready(function(){
        $('#datatables').DataTable();
        $('#datatables_1').DataTable();
        $('#datatables_2').DataTable();
        $('#datatables_3').DataTable();
        $('#datatables_4').DataTable();
    });
</script>

<!-- Datatables for dashboard -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>

</body>
