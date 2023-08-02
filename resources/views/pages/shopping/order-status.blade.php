@extends('layout')
@section('content')
    <div class="h-100 order-status">
        <div class="container py-5 h-100">
            <div class="row d-block justify-content-center align-items-center h-100">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#all">All</a>
                    </li>
                    @foreach($status as $status_item)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill"
                               href="#status{{ $loop->iteration }}">{{ $status_item }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div id="all" class="container tab-pane active"><br>
                        @if ($order->toArray())
                            @foreach ($order as $order_item)
                                @include('pages.common.order_item')
                            @endforeach
                        @else
                            @include('pages.common.no-post')
                        @endif
                    </div>
                    @foreach($status as $status_item)
                        <div id="status{{ $loop->iteration }}" class="container tab-pane fade"><br>
                            @if ($order->toArray() AND in_array($status_item, array_column($order->toArray(), 'status')))
                                @foreach (collect($order)->where('status', $status_item)->toArray() as $order_item)
                                    @include('pages.common.order_item')
                                @endforeach
                            @else
                                @include('pages.common.no-post')
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
