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
                <div id="all" class=" tab-pane active"><br>
                    @foreach ($data as $item)
                        @include('dashboard-pages.common.order_item')
                    @endforeach
                </div>
                <div id="processing" class=" tab-pane fade"><br>
                    @foreach ($data_processing as $item)
                        @include('dashboard-pages.common.order_item')
                    @endforeach
                </div>
                <div id="delivering" class=" tab-pane fade"><br>
                    @foreach ($data_delivering as $item)
                        @include('dashboard-pages.common.order_item')
                    @endforeach
                </div>
                <div id="completed" class=" tab-pane fade"><br>
                    @foreach ($data_completed as $item)
                        @include('dashboard-pages.common.order_item')
                    @endforeach
                </div>
                <div id="cancelled" class=" tab-pane fade"><br>
                    @foreach ($data_cancelled as $item)
                        @include('dashboard-pages.common.order_item')
                    @endforeach
                </div>
            </div>
        </div>
@endsection
