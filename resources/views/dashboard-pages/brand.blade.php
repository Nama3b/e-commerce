@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="card-body pt-3">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill"
                       href="#brand">All</a>
                </li>
                @foreach($category as $cat_item)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill"
                           href="#brand{{ $cat_item['id'] }}">{{ $cat_item['name'] }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                <div id="brand" class="tab-pane active"><br>
                    <div class="body-header">
                        <button type="button" name="create" id="create" class="btn btn-outline-light"
                                data-toggle="modal"
                                data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                        </button>
                    </div>
                    <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3" id="datatables">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            @include('dashboard-pages.common.brand.brand_item')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach($category as $cat_item)
                    <div id="brand{{ $cat_item['id'] }}" class="tab-pane fade"><br>
                        <div class="body-header">
                            <button type="button" name="create" id="create" class="btn btn-outline-light"
                                    data-toggle="modal"
                                    data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                            </button>
                        </div>
                        <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3" id="datatables_{{ $loop->iteration }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item)
                                @if(in_array($cat_item['id'], $item['category_id']))
                                    @include('dashboard-pages.common.brand.brand_item')
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('dashboard-pages.common.brand.brand_modal_add')

    @foreach($data as $item)
        @include('dashboard-pages.common.brand.brand_modal_edit')
    @endforeach

@endsection
