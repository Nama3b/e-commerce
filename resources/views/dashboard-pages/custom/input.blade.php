<div class="{{$col_class}}">
    <div class="form-group">
        <label>{{__('generate.translate.group_home.title')}}@if($required)<span class="text-lightred"> *</span>@endif</label>
        <textarea id="title" name="title" class="textarea_ckeditor"></textarea>
    </div>
    <div class="select_{{$name}}"></div>
    <script src="{{asset('dashboard-pages/vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('title', {
            filebrowserBrowseUrl: '/elfinder/ckeditor',
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            language: <?= json_encode(\Illuminate\Support\Facades\App::getLocale()) ?>
        });
    </script>
</div>
