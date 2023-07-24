@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="card-body pt-3">
            <div class="body-header">
                <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                        data-target="#addForm" disabled><i class="far fa-plus-square"></i> Add new
                </button>
            </div>
            <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th class="col-1">{{ $loop->iteration }}</th>
                        <th class="col-5">{{ $item['name'] }}</th>
                        <th class="col-2">{{ $item['status'] ? 'Active' : 'Inactive'}}</th>
                        <th class="col-1">
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $item['id'] }}">
                                    <i class="far fa-edit"></i>
                                </button>
                                <form action="{{ URL::to('/dashboard/product_category/delete/'.$item['id']) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-dark" disabled><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                    <div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ URL::to('/dashboard/product_category/edit/'.$item['id'])}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit form category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-input" name="name" placeholder="Category name"
                                                   value="{{ $item['name'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status">
                                                @foreach ($status as $key => $option)
                                                    <option
                                                        value="{{ $key }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addForm" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ URL::to('/dashboard/product_category/store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add new category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-input" name="name" placeholder="Category name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            @php($status_item = $item['status'])
                            <select name="status">
                                @foreach ($status as $key => $option)
                                    <option value="{{ $key }}">{{ $option }}</option>
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
