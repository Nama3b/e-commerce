@extends('dashboard-layout')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between border-bottom-0">
        <h2 class="card-title my-2">{{ __('generate.'.Request::segment(2).'.title') }}</h2>
        @if($create)
            @include('dashboard-pages.custom.create_button')
        @endif
    </div>
    @include('dashboard-pages.common.filter')
    <div class="card-body pt-3">
        {{$dataTable->table(['class' => 'table table-bordered table-hover dataTable dtr-inline text-wrap '], true)}}
    </div>
</div>

@push('js')
    {{$dataTable->scripts()}}
    <script>
        const editor = <?= json_encode($editor, true) ?>;
        let routeName = <?= json_encode(request()->route()->getPrefix() . "/" . request()->route()->getName()) ?>;
        routeName = routeName.startsWith('/') ? routeName.slice(0) : routeName;
        const routerPath = $('meta[name=app_url]').attr('content') + `/${routeName}`;
        const lang = {
            button: {
                add: '<?= __('generate.translate.button.add'); ?>',
                deleteText: '<?= __('generate.translate.button.delete') ?>',
                confirmDelete: '<?= __('generate.translate.button.confirm-delete') ?>',
                confirmDeleteMulti: '<?= __('generate.translate.button.confirm-delete-multi') ?>',
                update: '<?= __('generate.translate.button.update'); ?>',
            },
            text: {
                copy: "コピ",
            }
        }
    </script>
    <script src="{{ mix('Dashboard/js/app.js') }}"></script>
@endpush
@endsection
