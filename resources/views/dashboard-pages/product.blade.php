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
                @foreach ($category as $item)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill"
                           href="#category{{$loop->iteration}}">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                <div id="all" class=" tab-pane active"><br>
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
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            @include('dashboard-pages.common.product_item')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach($category as $cat_item)
                    <div id="category{{ $cat_item['id'] }}" class=" tab-pane fade"><br>
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
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($data)->where('category_id', $cat_item['id']) as $item)
                                @include('dashboard-pages.common.product_item')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <div id="accessory" class=" tab-pane fade"><br>
                    <div class="container text-center">
                        <img src="{{ asset('WebPage/img/shopping/coming-soon.avif') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addForm" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ URL::to('/dashboard/product/store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add new product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="creator" value="{{ Auth()->guard('member')->user()->id }}">
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id">
                                @foreach ($category as $option)
                                    <option
                                        value="{{ $loop->iteration }}">{{ $option['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <select name="brand_id">
                                @foreach ($brand as $option)
                                    <option
                                        value="{{ $loop->iteration }}">{{ $option['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-input align-right" name="name" placeholder="Product name"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="" style="vertical-align: top">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4"
                                      placeholder="Product description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price ($)</label>
                            <input type="text" class="form-input" name="price" placeholder="Product price" required>
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="text" class="form-input" name="quantity" placeholder="Product quantity"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="url">
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
