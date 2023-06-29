@extends('dashboard-layout')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
        <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        @if($create)
            @include('admin.custom.create_button')
        @endif
    </div>
    @include('admin.common.filter')
    <div class="card-body pt-3">
        {{$dataTable->table(['class' => 'table table-bordered table-hover dataTable dtr-inline text-wrap '], true)}}
    </div>
</div>
@endsection
