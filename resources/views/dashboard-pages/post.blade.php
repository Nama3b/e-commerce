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

    <div class="modal fade" id="addForm" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ URL::to('/dashboard/post/store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add new post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="author" value="{{ $item['author'] }}}">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-input" name="title" placeholder="Post title" required>
                        </div>
                        <div class="form-group">
                            <label for="" style="vertical-align: top; margin-right: 51px">Content</label>
                            <textarea name="content" id="content" cols="30" rows="4" placeholder="Post content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="post_type">
                                @foreach ($type as $key => $option)
                                    <option
                                        value="{{ $key+1 }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="url" class="image" style="margin-left: 0 !important">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status">
                                @foreach ($status as $key => $option)
                                    <option
                                        value="{{ $key+1 }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Add new</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
