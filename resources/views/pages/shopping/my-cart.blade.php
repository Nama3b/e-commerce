@extends('layout')
@section('content')
    <div class="cart-body">
        <div class="container">
            <div class="row">
                <div class="product-cart col-12">
                    <h6><b>Product cart</b></h6>
                    <table width="100%">
                        <tr class="tbl-header">
                            <td></td>
                            <td>Image</td>
                            <td>Product name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
{{--                        @foreach($carts as $cart_item)--}}
                            <tr class="tbl-body">
                                <td><a href="{{URL::to('/del-cart').'/'}}"><i
                                            class="fas fa-trash-alt"></i></a></td>
                                <td><img src="{{URL::to('public/uploads/product/'.'/')}}"
                                         alt="" width="90px"></td>
                                <td><b>name</b></td>
                                <td>$1000</td>
                                <td>
                                    <form action="{{URL::to('/update-cart-qty')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="d-flex">
                                            <input type="number" name="cart_quantity" min="1"
                                                   value="1" class="text-center" style="width: 55px">
                                            <input type="hidden" class="form-control" name="rowId_cart"
                                                   value="">
                                            <input type="submit" class="btn btn-sm btn-dark" name="update_qty"
                                                   value="Update" style="width: 80px">
                                        </div>
                                    </form>
                                </td>
                                <td>
                                        <?php
//                                        $subtotal = $cart_item->price * $cart_item->qty;
//                                        echo '$' . number_format($subtotal, 0, ',', '.');
//                                        ?>
                                </td>
                            </tr>
{{--                        @endforeach--}}
                    </table>
                </div>
                <a href="{{URL::to('product')}}">
                    <button class="btn btn-dark mt-3 mr-3" name="">Keep shopping</button>
                </a>
                <a href="{{URL::to('checkout')}}">
                    <button class="btn btn-outline-dark mt-3" name="">Checkout</button>
                </a>
            </div>
        </div>
    </div>

@endsection
