@extends('layout')
@section('content')
    <div class="cart-body">
        <div class="container">
            <form action="{{ URL::to('checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="product-cart col-12">
                        <h3><b>My cart</b></h3>
                        @if ($cart != null)
                            <table>
                                <tr class="tbl-header">
                                    <td></td>
                                    <td>Image</td>
                                    <td>Product</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                    <td></td>
                                </tr>
                                @foreach($cart as $cart_item)
                                    @if($cart_item['status'] == 'CART')
                                        <tr class="tbl-body">
                                            <td>
                                                <label class="container">
                                                    <input type="checkbox" name="selected[]" value="{{ $cart_item['id'] }}">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td style="width: 200px; padding: 5px">
                                                @if(file_exists($cart_item['image']))
                                                    <img src="{{ $cart_item['image'] }}" alt="" width="110px"
                                                         height="75px">
                                                @else
                                                    <img
                                                        src="{{ asset('/storage/public/uploads/img/'.$cart_item['image']) }}"
                                                        alt="" width="110px" height="75px">
                                                @endif
                                            </td>
                                            <td><b>{{ $cart_item['name'] }}</b></td>
                                            <td>${{ number_format($cart_item['price'], 0, '', '.') }}</td>
                                            <td style="width: 70px">
                                                <fieldset>
                                                    <form action="{{URL::to('/update-cart')}}" method="post" id="updateForm">
                                                        @csrf
                                                        <div class="d-flex">
                                                            <input type="number" name="quantity" min="1"
                                                                   value="{{ $cart_item['quantity'] }}"
                                                                   class="text-center">
                                                            <input type="hidden" name="productId_hidden"
                                                                   value="{{ $cart_item['cart_id'] }}">
                                                            <input type="submit" class="btn btn-sm btn-dark ml-2"
                                                                   value="Update">
                                                        </div>
                                                    </form>
                                                </fieldset>
                                            </td>
                                            <td>
                                                @php( $total = $cart_item['price'] * $cart_item['quantity'] )
                                                ${{ number_format($total, 0, '', '.') }}
                                            </td>
                                            <td style="width: 57px">
                                                <fieldset>
                                                    <form action="{{ URL::to('/remove-cart') }}" method="post" id="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="productId_hidden" value="{{ $cart_item['cart_id'] }}">
                                                        <button class="btn btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </fieldset>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        @else
                            @include('pages.common.no-cart-product')
                        @endif
                    </div>
                    <a href="{{ URL::to('product') }}">
                        <button class="btn btn-outline-dark mt-3 mr-3" name="">Back to home</button>
                    </a>
                    <a href="">
                        <button class="btn btn-dark mt-3" type="submit">Checkout</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
