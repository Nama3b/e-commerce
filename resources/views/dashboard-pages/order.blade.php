@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="card-body pt-3">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#all">All</a>
                </li>
                @foreach ($status as $status_item)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill"
                           href="#status{{$loop->iteration}}">{{ $status_item }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                <div id="all" class="tab-pane active">
                    @foreach($data as $item)
                        <h4>Order#</h4>
                        <div class="order-item">
                            <div class="col-8">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($item['orderdetails'] as $detail)
                                        @include('dashboard-pages.common.order.order_item')
                                    @endforeach
                                    </tbody>
                                </table>
                                @if ($item['status'] != 'CANCELLED')
                                    <form action="{{ URL::to('/dashboard/order/edit/'.$item['id']) }}" method="post"
                                          class="order-status">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status">
                                            @foreach ($status as $key => $option)
                                                <option
                                                    value="{{ $key+1 }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-outline-success">Update status
                                        </button>
                                    </form>
                                @else
                                    <div class="order-status">
                                        <select name="status">
                                            <option value="4">{{ $item['status'] }}</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            @include('dashboard-pages.common.order.customer_info')
                        </div>
                    @endforeach
                </div>

                @foreach ($status as $status_item)
                    <div id="status{{ $loop->iteration }}" class="tab-pane active"><br>
                        @foreach (collect($data)->where('status', $status_item) as $item)
                            <h4>Order#{{ $loop->iteration }}</h4>
                            <div class="order-item">
                                <div class="col-8">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($item['orderdetails'] as $detail)
                                            @include('dashboard-pages.common.order.order_item')
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if ($item['status'] != 'CANCELLED')
                                        <form action="{{ URL::to('/dashboard/order/edit/'.$item['id']) }}" method="post"
                                              class="order-status">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status">
                                                @foreach ($status as $key => $option)
                                                    <option
                                                        value="{{ $key+1 }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-outline-success">Update status
                                            </button>
                                        </form>
                                    @else
                                        <div class="order-status">
                                            <select name="status">
                                                <option value="4">{{ $item['status'] }}</option>
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                @include('dashboard-pages.common.order.customer_info')
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
