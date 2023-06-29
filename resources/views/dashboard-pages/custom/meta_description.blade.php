<div class="{{$col_class}}">
    <div class="form-group">
        <label>{{__('generate.translate.group_content.meta_description')}}@if($required)<span class="text-lightred"> *</span>@endif</label>
        <textarea id="meta_description" name="meta_description" class="textarea_ckeditor"></textarea>
    </div>
    <div class="select_{{$name}}"></div>
    <script src="{{asset('admin/vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('meta_description', {
            filebrowserBrowseUrl: '/elfinder/ckeditor',
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            language: <?= json_encode(\Illuminate\Support\Facades\App::getLocale()) ?>
        });
    </script>
</div>
