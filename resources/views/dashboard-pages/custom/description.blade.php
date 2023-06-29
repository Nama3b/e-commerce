<div class="{{$col_class}}">
    <div class="form-group">
        <label>{{__('generate.translate.group_content.description')}}@if($required)<span class="text-lightred"> *</span>@endif</label>
        <textarea id="description" name="description" class="textarea_ckeditor"></textarea>
    </div>
    <div class="select_{{$name}}"></div>
{{--    <script src="{{asset('admin/vendor/ckeditor/ckeditor.js')}}"></script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace('description', {--}}
{{--            filebrowserBrowseUrl: '/elfinder/ckeditor',--}}
{{--            filebrowserImageBrowseUrl: '/elfinder/ckeditor',--}}
{{--            language: <?= json_encode(\Illuminate\Support\Facades\App::getLocale()) ?>--}}
{{--        });--}}
{{--    </script>--}}
</div>
