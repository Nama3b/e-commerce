@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">BANNER MANAGEMENT</h2>
        </div>
        <div class="card-body pt-3">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill"
                       href="#banner">All</a>
                </li>
                @foreach($type as $key => $type_item)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill"
                           href="#banner{{ $key }}">{{ $type_item }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                <div id="banner" class="tab-pane active"><br>
                    <div class="body-header">
                        <button type="button" name="create" id="create" class="btn btn-outline-light"
                                data-toggle="modal"
                                data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                        </button>
                    </div>
                    <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            @include('dashboard-pages.common.banner.banner_item')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach($type as $key => $type_item)
                    <div id="banner{{ $key }}" class="tab-pane fade"><br>
                        <div class="body-header">
                            <button type="button" name="create" id="create" class="btn btn-outline-light"
                                    data-toggle="modal"
                                    data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                            </button>
                        </div>
                        <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($data)->where('type', $type_item) as $item)
                                @include('dashboard-pages.common.banner.banner_item')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('dashboard-pages.common.banner.banner_modal_add')

    @foreach($data as $item)
        @include('dashboard-pages.common.banner.banner_modal_edit')
    @endforeach

@endsection
