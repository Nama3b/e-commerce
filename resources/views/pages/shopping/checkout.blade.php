@extends('layout')
@section('content')
    <div class="checkout-body">
        <div class="container">
            <div class="row">
                <div class="col-8 pl-0 pr-0">
                    <div class="product-cart">
                        <h3><b>My cart</b></h3>
                        @if ($cart != null)
                        <table>
                            @foreach($cart as $cart_item)
                                <tr class="tbl-body">
                                    <td><img src="{{ $cart_item['url'] }}" alt="" width="100px"></td>
                                    <td><b></b></td>
                                    <td>${{ number_format($cart_item['price'], 0, '', '.') }}</td>
                                    <td>
                                        <form action="{{URL::to('/update-cart')}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="d-flex">
                                                <div class="col-8">
                                                    x<input type="number" name="quantity" min="1" value="{{ $cart_item['quantity'] }}" class="text-center ml-2 mr-2" style="width: 55px">
                                                    <input type="hidden" name="productId_hidden" value="{{ $cart_item['id'] }}">
                                                    @php( $total = $cart_item['price'] * $cart_item['quantity'] )
                                                    <b>= ${{ number_format($total, 0, '', '.') }}</b>
                                                </div>
                                                <div class="col-4">
                                                    <input type="submit" class="btn btn-sm btn-dark ml-2" name="update_qty" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ URL::to('/remove-cart') }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="productId_hidden" value="{{ $cart_item['id'] }}">
                                            <button class="btn btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            @include('pages.common.no-cart-product')
                        @endif
                    </div>
                </div>
                <div class="col-4 pl-0 pr-0">
                    <form action="{{ URL::to('/checkout-action') }}" method="post">
                        {{ csrf_field() }}
                        <div class="client-info">
                            <h6><b>Ordering person</b></h6>
                            <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
                            <input type="text" name="name" placeholder="Full name" value="{{ $user->full_name }}" required>
                            <input type="number" name="phone_number" placeholder="Phone number" value="{{ $user->phone_number }}" required>
                            <input type="text" name="address" placeholder="Address" value="{{ $user->address }}" required>
                            <textarea name="notice" cols="28" rows="3" placeholder="Note"></textarea>
                        </div>
                        <div class="checkout-section">
                            <h6><b>Payment</b></h6>
                            <div class="item-price">
                                <table>
                                    <tr>
                                        <td>Method:</td>
                                        <td>
                                            <select name="payment_method">
                                                @php($i = 0)
                                                @foreach($payment_method as $payment)
                                                    @php($i++)
                                                    <option value="{{ $i }}">{{ $payment }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ship cost:</td>
                                        <td>Freeship</td>
                                    </tr>
                                    <tr>
                                        <td>Tax cost:</td>
                                        <td>$0</td>
                                    </tr>
                                    <tr>
                                        <td>Total:</td>
                                        <td>
                                            <b>
                                                @php($total = 0)
                                                @foreach($cart as $cart_item)
                                                    @php($total += $cart_item['price'] * $cart_item['quantity'])
                                                @endforeach
                                                ${{ number_format($total, 0, '', '.') }}
                                                <input type="hidden" name="total" value="{{ $total }}">
                                            </b>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            @if($cart != null)
                                <button type="submit" class="btn btn-dark mt-2">Order</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
