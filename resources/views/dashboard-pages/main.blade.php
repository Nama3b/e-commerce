@extends('dashboard-layout')
@section('main')
    <div id="main">
        <div class="header-section">
            <div class="header-left col-6 d-flex">
                <button class="openbtn" onclick="openNav()">☰</button>
                <div class="form-search">
                    <input type="text" placeholder="Search..." id="search">
                    <i class="fas fa-search" id="search-ic"></i>
                </div>
            </div>
            <div class="header-right col-6 d-flex">
                <a href="" class="noti-icon"><i class="material-icons">notifications_none</i></a>
                <div class="dropdown d-flex">
                    <button class="btn btn-outline-dark" type="button" data-toggle="dropdown">
                        <img src="{{{'../Dashboard/img/user_logo.jpg'}}}" alt="" width="90%">
                    </button>
                    <i class="fas fa-caret-down d-none"></i>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="">Heyy mate!</a></li>
                        <li><a href="#">My profile</a></li>
                        <li><a href="#">Setting</a></li>
                        <hr>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="body-section">
            <div class="container">
                <div class="row">
                    <div class="jumbotron">
                        <h2><b>E-COMMERCE ADMIN DASHBOARD</b></h2>
                        <small><u>Namaeb De Creator.</u></small>
                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio autem quo obcaecati deleniti,
                            nostrum nemo nobis libero placeat exercitationem culpa illum vel, sapiente odit labore earum
                            tempore recusandae itaque magni a blanditiis impedit! Suscipit modi, quia cum?</h6>
                        <p>Made with <i class="fas fa-keyboard"></i> and <i class="far fa-hand-paper"></i></p>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="inner-item">
                                <div class="d-flex">
                                    <i class="fas fa-shoe-prints mr-2"></i>
                                    <h5>Sneaker</h5>
                                </div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, doloremque!</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="inner-item">
                                <div class="d-flex">
                                    <i class="fas fa-tshirt mr-2"></i>
                                    <h5>Clothes</h5>
                                </div>
                                <p>Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Itaque, fuga.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="inner-item">
                                <div class="d-flex">
                                    <i class="material-icons mr-2">watch</i>
                                    <h5>Watches</h5>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, tempora!</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="inner-item">
                                <div class="d-flex">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    <h5>Capitalization char</h5>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, sed michaelh.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="inner-item">
                                <div class="d-flex">
                                    <i class="far fa-comments mr-2"></i>
                                    <h5>Contact</h5>
                                </div>
                                <p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Earum, consequatur.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="inner-item">
                                <div class="d-flex">
                                    <i class="material-icons mr-2"> settings</i>
                                    <h5>Setting</h5>
                                </div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Eius, similique.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
