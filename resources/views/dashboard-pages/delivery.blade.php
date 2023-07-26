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
                    <th>Payment options</th>
                    <th>Service name</th>
                    <th>Delivery Fee</th>
                    <th>Delivery Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $item['payment']['name'] }}</th>
                        <th>{{ $item['service_name'] }}</th>
                        <th>${{ number_format($item['delivery_fee'], 0, '', '.') }}</th>
                        @if ($item['delivery_time'] > 1)
                            <th>{{ $item['delivery_time'] }} days</th>
                        @else
                            <th>{{ $item['delivery_time'] }} day</th>
                        @endif
                        <th>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $loop->iteration }}">
                                    <i class="far fa-edit"></i>
                                </button>
                                <form action="{{ URL::to('/dashboard/delivery/delete/'.$item['id']) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-dark" disabled><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                    <div class="modal fade" id="editForm-{{ $loop->iteration }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ URL::to('/dashboard/delivery/edit/'.$item['id'])}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit delivery</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Payment</label>
                                            <select name="payment_option_id">
                                                @foreach ($payment as $key => $option)
                                                    <option
                                                        value="{{ $key }}" {{ $key == $item['payment_option_id'] ? 'selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Service</label>
                                            <input type="text" class="form-input" name="service_name"
                                                   placeholder="Service name"
                                                   value="{{ $item['service_name'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fee ($)</label>
                                            <input type="text" class="form-input" name="delivery_fee"
                                                   placeholder="Delivery fee"
                                                   value="{{ $item['delivery_fee'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Time (day)</label>
                                            <input type="text" class="form-input" name="delivery_time"
                                                   placeholder="Delivery time"
                                                   value="{{ $item['delivery_time'] }}" required>
                                        </div>
                                        @if ($item['description'])
                                            <div class="form-group">
                                                <label for="" style="vertical-align: top">Description</label>
                                                <textarea name="description" id="description" cols="30"
                                                          rows="4">{{ $item['description'] }}</textarea>
                                            </div>
                                        @endif
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

@endsection
