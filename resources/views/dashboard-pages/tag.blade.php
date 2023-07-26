@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="card-body pt-3">
            <div class="body-header">
                <button type="button" name="create" id="create" class="btn btn-outline-light" data-toggle="modal"
                        data-target="#addForm"><i class="far fa-plus-square"></i> Add new
                </button>
            </div>
            <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Creator</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $item['member']['full_name'] }}</th>
                        <th>{{ $item['name'] }}</th>
                        <th>{{ $item['type'] }}</th>
                        <th>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $loop->iteration }}">
                                    <i class="far fa-edit"></i>
                                </button>
                                <form action="{{ URL::to('/dashboard/tag/delete/'.$item['id']) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                    <div class="modal fade" id="editForm-{{ $loop->iteration }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ URL::to('/dashboard/tag/edit/'.$item['id'])}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit tag</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-input" name="name"
                                                   value="{{ $item['name'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select name="type">
                                                @foreach ($type as $key => $option)
                                                    <option
                                                        value="{{ $option }}" {{ $option == $item['type'] ? 'selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Created at</label>
                                            <input type="text" class="form-input" name="tag_time"
                                                   placeholder="Create time"
                                                   value="{{ $item['created_at'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close
                                        </button>
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
            <form action="{{ URL::to('/dashboard/tag/store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add new tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-input" name="name"
                                       placeholder="Tag name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type">
                                    @foreach ($type as $key => $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
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
