@extends('layout')
@section('content')

    <div class="checkout-body">
        <div class="container">
            <div class="row">
                <div class="col-8 pl-0 pr-0">
                    <div class="product-cart">
                        <h6><b>Product cart</b></h6>
                        <table>
{{--                            @foreach($content as $v_content)--}}
                                <tr class="tbl-body">
                                    <td><a href="{{URL::to('/del-cart').'/'}}"><i
                                                class="fas fa-trash-alt"></i></a></td>
                                    <td><img src="{{URL::to('public/uploads/product/'.'/')}}"
                                             alt="" width="70px"></td>
                                    <td><b>name</b></td>
                                    <td>$1000</td>
                                    <td>
                                        <form action="{{URL::to('/update-cart-qty')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="d-flex">
                                                <input type="number" name="cart_quantity" min="1"
                                                       value="1" class="text-center"
                                                       style="width: 55px">
                                                <input type="hidden" class="form-control" name="rowId_cart"
                                                       value="">
                                                <input type="submit" class="btn btn-sm btn-dark" name="update_qty"
                                                       value="Update" style="width: 80px">
                                            </div>
                                        </form>
                                    </td>
                                    <td>
<!--                                            --><?php
//                                            $subtotal = $v_content->price * $v_content->qty;
//                                            echo '$' . number_format($subtotal, 0, ',', '.');
//                                            ?>
                                    </td>
                                </tr>
{{--                            @endforeach--}}
                        </table>
                    </div>
                </div>
                <div class="col-4 pl-0 pr-0">
                    <form action="{{URL::to('checkout-action')}}" method="post">
                        {{ csrf_field() }}
                        <div class="client-info">
                            <h6><b>Client info</b></h6>
                            <input type="text" name="email" placeholder="Email">
                            <input type="text" name="client_name" placeholder="Full name">
                            <input type="text" name="phonenumber" placeholder="Phonenumber">
                            <input type="text" name="address" placeholder="Address">
                            <textarea name="note" cols="29" rows="3" placeholder="Note"></textarea>
                        </div>
                        <div class="checkout-section">
                            <h6><b>Checkout</b></h6>
                            <div class="item-price">
                                <table>
                                    <tr>
                                        <td>Total:</td>
                                        <td>(price tolal)</td>
                                    </tr>
                                    <tr>
                                        <td>Ship cost:</td>
                                        <td>Freeship</td>
                                    </tr>
                                    <tr>
                                        <td>Tax cost:</td>
                                        <td>(tax)</td>
                                    </tr>
                                    <tr>
                                        <td>Total price:</td>
                                        <td><b>(total)</b></td>
                                    </tr>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-dark" name="payment">Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
