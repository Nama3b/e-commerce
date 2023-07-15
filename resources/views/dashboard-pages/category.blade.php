@extends('dashboard-layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
            <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        </div>
        <div class="container">
            <div class="row">
                <div align="right">
                    <button type="button" name="create" id="create" class="btn btn-ountline-dark"><i class="far fa-plus-square"></i> Add new</button>
                </div>
                <div class="col-12 table-responsive">
                    @csrf
                    <table class="table table-bordered table-hover category_dataTable dtr-inline text-wrap ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.category_dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/product_category",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>
@endsection
