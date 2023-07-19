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
                @php($i = 1)
                @foreach ($data as $item)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <th><img src="../{{ $item['url'] }}" alt="" width="120px"></th>
                        <th>{{ $item['category']['name'] }}</th>
                        <th>{{ $item['brand']['name'] }}</th>
                        <th>{{ $item['name'] }}</th>
                        <th>${{ $item['price'] }}</th>
                        <th>{{ $item['quantity'] }}</th>
                        <th>{{ $item['status'] }}</th>
                        <th>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal"
                                        data-target="#editForm-{{ $item['id'] }}">
                                    <i class="far fa-edit"></i>
                                </button>
                                <form action="{{ URL::to('/dashboard/product/delete/'.$item['id']) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>

                    <div class="modal fade" id="editForm-{{ $item['id'] }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ URL::to('/dashboard/product/edit/'.$item['id'])}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit form product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <input type="hidden" name="creator" value="{{ $item['creator'] }}">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="category_id">
                                                @foreach ($category as $key => $option)
                                                    <option
                                                        value="{{ $key+1 }}" {{ $key+1 == $item['category_id'] ? 'selected' : '' }}>{{ $option['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Brand</label>
                                            <select name="brand_id">
                                                @foreach ($brand as $key => $option)
                                                    <option
                                                        value="{{ $key+1 }}" {{ $key+1 == $item['brand_id'] ? 'selected' : '' }}>{{ $option['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-input" name="name" placeholder="Product name"
                                                   value="{{ $item['name'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" style="vertical-align: top">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="4" placeholder="Product description">{{ $item['description'] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Price ($)</label>
                                            <input type="text" class="form-input" name="price" placeholder="Product price"
                                                   value="{{ $item['price'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quantity</label>
                                            <input type="text" class="form-input" name="quantity" placeholder="Product quantity"
                                                   value="{{ $item['quantity'] }}" required>
                                        </div>
                                        <div class="form-group form-image">
                                            <label for="">Image</label>
                                            <img src="../{{ $item['url'] }}" alt="" class="form-img">
                                            <input type="hidden" name="url" value="{{ $item['url'] }}">
                                            <input type="file" name="url" class="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status">
                                                @foreach ($status as $key => $option)
                                                    <option
                                                        value="{{ $key+1 }}" {{ $option == $item['status'] ? 'selected' : '' }}>{{ $option }}</option>
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
                                @php($i = 1)
                                @foreach ($category as $option)
                                    <option
                                        value="{{ $i++ }}">{{ $option['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <select name="brand_id">
                                @foreach ($brand as $option)
                                    <option
                                        value="{{ $i++ }}">{{ $option['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-input align-right" name="name" placeholder="Product name" required>
                        </div>
                        <div class="form-group">
                            <label for="" style="vertical-align: top">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4" placeholder="Product description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price ($)</label>
                            <input type="text" class="form-input" name="price" placeholder="Product price" required>
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="text" class="form-input" name="quantity" placeholder="Product quantity" required>
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
