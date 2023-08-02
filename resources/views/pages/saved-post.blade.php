@extends('layout')
@section('content')
    <div class="h-100 saved-post">
        <div class="container py-5 h-100">
            <div class="row d-block justify-content-center align-items-center h-100">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#all">All</a>
                    </li>
                    @foreach($type as $type_item)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill"
                               href="#status{{ $loop->iteration }}">{{ $type_item }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div id="all" class="container tab-pane active"><br>
                        @if ($data)
                            @foreach ($data as $post_item)
                                @include('pages.common.post_item_1')
                            @endforeach
                        @else
                            @include('pages.common.no-post')
                        @endif
                    </div>
                    @foreach($type as $type_item)
                        <div id="status{{ $loop->iteration }}" class="container tab-pane fade"><br>
                            @if ($data AND in_array($type_item, array_column($data, 'post_type')))
                                @foreach (collect($data)->where('post_type', $type_item) as $post_item)
                                    @include('pages.common.post_item_1')
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
