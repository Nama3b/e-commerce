@extends('layout')
@section('content')
    <div class="cart-body">
        <div class="container">
            <div class="row">
                <div class="product-cart col-12">
                    <h3><b>My cart</b></h3>
                    @if ($cart != null)
                    <table>
                        <tr class="tbl-header">
                            <td></td>
                            <td>Image</td>
                            <td>Product name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                        @foreach($cart as $cart_item)
                            <tr class="tbl-body">
                                <td style="width: 57px">
                                    <form action="{{ URL::to('/remove-cart') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="productId_hidden" value="{{ $cart_item['id'] }}">
                                        <button class="btn btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td style="width: 200px"><img src="{{ $cart_item['image'] }}" alt="" width="100px"></td>
                                <td><b>{{ $cart_item['name'] }}</b></td>
                                <td>${{ number_format($cart_item['price'], 0, '', '.') }}</td>
                                <td style="width: 70px">
                                    <form action="{{URL::to('/update-cart')}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-flex">
                                            <input type="number" name="quantity" min="1"
                                                   value="{{ $cart_item['quantity'] }}" class="text-center">
                                            <input type="hidden" name="productId_hidden" value="{{ $cart_item['id'] }}">
                                            <input type="submit" class="btn btn-sm btn-dark ml-2"
                                                    value="Update">
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    @php( $total = $cart_item['price'] * $cart_item['quantity'] )
                                    ${{ number_format($total, 0, '', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        @include('pages.common.no-cart-product')
                    @endif
                </div>
                <a href="{{URL::to('product')}}">
                    <button class="btn btn-outline-dark mt-3 mr-3" name="">Back to home</button>
                </a>
                @if($cart != null)
                    <a href="{{URL::to('checkout')}}">
                        <button class="btn btn-dark mt-3" name="">Checkout</button>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
