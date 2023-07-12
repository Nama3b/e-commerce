@extends('layout')
@section('content')
    <div class="h-100 order-status">
        <div class="container py-5 h-100">
            <div class="row d-block justify-content-center align-items-center h-100">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#all">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#processing">Processing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#delivering">Delivering</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#completed">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#cancelled">Cancelled</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="all" class="container tab-pane active"><br>
                        @if ($order->toArray() != null)
                            @foreach ($order as $order_item)
                                @include('pages.common.order_item')
                            @endforeach
                        @else
                            @include('pages.common.no-order-status')
                        @endif
                    </div>
                    <div id="processing" class="container tab-pane fade"><br>
                        @if ($order_processing->toArray() != null)
                            @foreach ($order_processing as $order_item)
                                @include('pages.common.order_item')
                            @endforeach
                        @else
                            @include('pages.common.no-order-status')
                        @endif
                    </div>
                    <div id="delivering" class="container tab-pane fade"><br>
                        @if ($order_delivering->toArray() != null)
                            @foreach ($order_delivering as $order_item)
                                @include('pages.common.order_item')
                            @endforeach
                        @else
                            @include('pages.common.no-order-status')
                        @endif
                    </div>
                    <div id="completed" class="container tab-pane fade"><br>
                        @if ($order_completed->toArray() != null)
                            @foreach ($order_completed as $order_item)
                                @include('pages.common.order_item')
                            @endforeach
                        @else
                            @include('pages.common.no-order-status')
                        @endif
                    </div>
                    <div id="cancelled" class="container tab-pane fade"><br>
                        @if ($order_cancelled->toArray() != null)
                            @foreach ($order_cancelled as $order_item)
                                @include('pages.common.order_item')
                            @endforeach
                        @else
                            @include('pages.common.no-order-status')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
