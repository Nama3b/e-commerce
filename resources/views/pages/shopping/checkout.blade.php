@extends('layout')
@section('content')
    <div class="checkout-body">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-8 pl-0 pr-0">
                    <div class="product-cart">
                        <h3><b>My cart</b></h3>
                        @if ($checkout)
                            <table>
                                @foreach($checkout as $key => $cart_item)
                                    <tr class="tbl-body">
                                        <td>
                                            @if(file_exists($cart_item['image']))
                                                <a href="{{ URL::to('product-detail/'.$cart_item['id']) }}">
                                                    <img src="{{ $cart_item['image'] }}" alt="" width="110px" height="75px">
                                                </a>
                                            @else
                                                <a href="{{ URL::to('product-detail/'.$cart_item['id']) }}">
                                                    <img src="{{ asset('/storage/public/uploads/img/'.$cart_item['image']) }}"
                                                    alt="" width="110px" height="75px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>${{ number_format($cart_item['price'], 0, '', '.') }}</td>
                                        <td>
                                            <fieldset>
                                                <form action="{{ URL::to('/update-checkout') }}" method="post">
                                                    @csrf
                                                    <div class="d-flex">
                                                        <div class="col-8">
                                                            x<input type="number" name="quantity" min="1"
                                                                    value="{{ $cart_item['quantity'] }}"
                                                                    class="text-center ml-2 mr-2" style="width: 55px">
                                                            <input type="hidden" name="productId_hidden"
                                                                   value="{{ $key }}">
                                                            @php( $total = $cart_item['price'] * $cart_item['quantity'] )
                                                            <b>= ${{ number_format($total, 0, '', '.') }}</b>
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="submit" class="btn btn-sm btn-dark ml-2"
                                                                   name="update_qty" value="Update">
                                                        </div>
                                                    </div>
                                                </form>
                                            </fieldset>
                                        </td>
                                        <td>
                                            <fieldset>
                                                <form action="{{ URL::to('/remove-checkout') }}" method="post"
                                                      id="deleteForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="productId_hidden"
                                                           value="{{ $key }}">
                                                    <button class="btn btn-sm" type="submit"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </fieldset>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            @include('pages.common.no-cart-product')
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 pl-0 pr-0">
                    <form action="{{ URL::to('/checkout-action') }}" method="post">
                        @csrf
                        <div class="client-info">
                            <h6><b>Ordering person</b></h6>
                            <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
                            <input type="text" name="name" placeholder="Full name" value="{{ $user->full_name }}"
                                   required>
                            <input type="number" name="phone_number" placeholder="Phone number"
                                   value="{{ $user->phone_number }}" required>
                            <input type="text" name="address" placeholder="Address" value="{{ $user->address }}"
                                   required>
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
                                                @if ($checkout)
                                                    @php($total = 0)
                                                    @foreach($checkout as $cart_item)
                                                        @php($total += $cart_item['price'] * $cart_item['quantity'])
                                                    @endforeach
                                                    ${{ number_format($total, 0, '', '.') }}
                                                    <input type="hidden" name="total" value="{{ $total }}">
                                                @endif
                                            </b>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            @if ($checkout)
                                <button type="submit" class="btn btn-dark mt-2">Order</button>
                            @endif
                        </div>
                    </form>
                </div>
                <a href="{{ URL::to('/my-cart') }}" class="back-to-cart"><button class="btn btn-dark mt-3 ml-3">Back to cart</button></a>
            </div>
        </div>
    </div>

@endsection
