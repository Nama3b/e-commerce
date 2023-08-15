<div class="footer-top">
    <div class="col-xs-12 col-lg-7">
        @foreach($categories as $item)
            <button class="btn btn-outline-dark">{{ $item->name }}</button>
        @endforeach
    </div>
    <div class="col-xs-12 col-lg-5">
        <a href="" class="mr-2">FORUM</a> | <a href="" class="ml-2">ABOUT</a>
    </div>
</div>
<div class="cre">
    <div class="col-4 d-flex justify-content-center align-items-center">
        <img src="{{ asset('WebPage/img/home/project_name_sub.png') }}" alt="" width="50%">
    </div>
    <div class="cres">
        <div class="cre-item">
            <ul>
                <li class="footer-title">Customer care</li>
                <li>Help center</li>
                <li>Shopping guide</li>
                <li>Return & refunds</li>
            </ul>
        </div>
        <div class="cre-item">
            <ul>
                <li class="footer-title">About E-project</li>
                <li>About us</li>
                <li><a href="{{ URL::to('dashboard/login') }}" style="color:black">E-project</a> terms
                </li>
                <li>Contact media</li>
            </ul>
        </div>
        <div class="cre-item">
            <ul>
                <li class="footer-title">Our policy</li>
                <li>Privacy policy</li>
                <li>Recruitment</li>
                <li>Affiliate Program</li>
            </ul>
        </div>
        <div class="cre-item">
            <ul>
                <li class="footer-title">Discount rule</li>
                <li>Flash sale</li>
                <li>Seller channels</li>
                <li>Transport</li>
            </ul>
        </div>
    </div>
</div>
<div class="footer-bottom">
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
<div class="footer-desc">
    <div class="col-6"><p>Made with <i class="fa fa-keyboard-o"></i> and <i class="fa fa-hand-stop-o">.</i></p>
    </div>
    <div class="col-6"><h6>Designed by Le Thanh Long.</h6></div>
</div>
