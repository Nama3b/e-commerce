@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="card-body pt-3">
            <table class="table table-bordered table-hover dataTable dtr-inline text-wrap mt-3" id="datatables">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Favorite</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    @if ($item['favorites'])
                    <tr>
                        <th class="col-1">{{ $loop->iteration }}</th>
                        <th class="col-5">{{ $item['name'] }}</th>
                        <th class="col-5"><i class="fas fa-heart mr-2"></i>{{ count($item['favorites']) }}</th>
                        <th class="col-2">{{ $item['status'] ? 'Active' : 'Inactive'}}</th>
                        <th class="col-1">
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $item['id'] }}">
                                    <i class="far fa-edit"></i>
                                </button>
                            </div>
                        </th>
                    </tr>
                    <div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
                              aria-labelledby="exampleModalCenterTitle"
                              aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ URL::to('/dashboard/favorite/edit/'.$item['id'])}}" method="post">
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
                                            <input type="text" class="form-input" name="name" placeholder="Product name"
                                                   value="{{ $item['name'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Favorite</label>
                                            <input type="text" class="form-input" name="favorite" placeholder="Favorite quantity"
                                                   value="{{ count($item['favorites']) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status">
                                                @foreach ($status as $key => $option)
                                                    <option value="{{ $key }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
