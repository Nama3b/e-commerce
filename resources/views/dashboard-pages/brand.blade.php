@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="card-body pt-3">
            <div class="body-header">
                <div align="left">
                    <h4>Section 1</h4>
                </div>
                <div align="right">
                    <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                            data-target="#addForm1"><i class="far fa-plus-square"></i> Add new
                    </button>
                </div>
            </div>
            <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach ($data as $item)
                    <tr>
                        <th class="col-1">{{ $i++ }}</th>
                        <th class="col-3"><img src="../{{ $item['thumbnail_image'] }}" alt="" width="120px"></th>
                        <th class="col-4">{{ $item['name'] }}</th>
                        <th class="col-2">{{ $item['status'] ? 'Active' : 'Inactive'}}</th>
                        <th class="col-1">
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $item['id'] }}">
                                    <i class="far fa-edit"></i>
                                </button>
                                <form action="{{ URL::to('/dashboard/brand/delete/'.$item['id']) }}" method="post">
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body pt-3">
            <div class="body-header">
                <div align="left">
                    <h4>Section 2</h4>
                </div>
                <div align="right">
                    <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                            data-target="#addForm2"><i class="far fa-plus-square"></i> Add new
                    </button>
                </div>
            </div>
            <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach ($data_sneaker as $item)
                    <tr>
                        <th class="col-1">{{ $i++ }}</th>
                        <th class="col-3"><img src="../{{ $item['thumbnail_image'] }}" alt="" width="120px"></th>
                        <th class="col-4">{{ $item['name'] }}</th>
                        <th class="col-2">{{ $item['status'] ? 'Active' : 'Inactive'}}</th>
                        <th class="col-1">
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $item['id'] }}">
                                    <i class="far fa-edit"></i>
                                </button>
                                <form action="{{ URL::to('/dashboard/brand/delete/'.$item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body pt-3">
            <div class="body-header">
                <div align="left">
                    <h4>Section 3</h4>
                </div>
                <div align="right">
                    <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                            data-target="#addForm3"><i class="far fa-plus-square"></i> Add new
                    </button>
                </div>
            </div>
            <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach ($data_clothes as $item)
                    <tr>
                        <th class="col-1">{{ $i++ }}</th>
                        <th class="col-3"><img src="../{{ $item['thumbnail_image'] }}" alt="" width="120px"></th>
                        <th class="col-4">{{ $item['name'] }}</th>
                        <th class="col-2">{{ $item['status'] ? 'Active' : 'Inactive'}}</th>
                        <th class="col-1">
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $item['id'] }}">
                                    <i class="far fa-edit"></i>
                                </button>
                                <form action="{{ URL::to('/dashboard/brand/delete/'.$item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('dashboard-pages.common.brand_modal_add')

    @foreach ($data as $item)
        @include('dashboard-pages.common.brand_modal_edit')
    @endforeach
    @foreach ($data_sneaker as $item)
        @include('dashboard-pages.common.brand_modal_edit')
    @endforeach
    @foreach ($data_clothes as $item)
        @include('dashboard-pages.common.brand_modal_edit')
    @endforeach
@endsection
