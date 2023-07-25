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
                    <a class="nav-link" data-toggle="pill" href="#news">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#blog">Blog</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="all" class=" tab-pane active"><br>
                    <div class="body-header">
                        <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                                data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                        </button>
                    </div>
                    <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            @include('dashboard-pages.common.post_item')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="news" class=" tab-pane fade"><br>
                    <div class="body-header">
                        <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                                data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                        </button>
                    </div>
                    <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data_news as $item)
                            @include('dashboard-pages.common.post_item')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="blog" class=" tab-pane fade"><br>
                    <div class="body-header">
                        <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                                data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                        </button>
                    </div>
                    <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data_blog as $item)
                            @include('dashboard-pages.common.post_item')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard-pages.common.post_modal_add')
@endsection
