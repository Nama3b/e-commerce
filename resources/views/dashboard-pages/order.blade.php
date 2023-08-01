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
                <div id="all" class="tab-pane active"><br>
                    @if ($data)
                        @foreach($data as $item)
                            @include('dashboard-pages.common.order.order_item')
                        @endforeach
                    @else
                        @include('pages.common.no-order-status')
                    @endif
                </div>

                @foreach ($status as $status_item)
                    <div id="status{{ $loop->iteration }}" class="tab-pane fade"><br>
                        @if ($data AND implode(array_column($data, 'status')) == $status_item)
                            @foreach (collect($data)->where('status', $status_item) as $item)
                                @include('dashboard-pages.common.order.order_item')
                            @endforeach
                        @else
                            @include('pages.common.no-order-status')
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
