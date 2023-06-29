{{--<div class="{{$col_class}}">--}}
{{--    <div class="form-group">--}}
{{--        <x-adminlte-select2 id="{{$name}}" name="{{$name }}" label="{{$title}}" data-placeholder="{{__('generate.translate.button.select')}}" class="select2-clear {{'select2_'. $name}}" igroup-size="lg" :config="$config">--}}
{{--            <option value="0">FEMALE</option>--}}
{{--            <option value="1">MALE</option>--}}
{{--        </x-adminlte-select2>--}}
{{--        <div class="select_{{$name}}"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="col-sm-4">
    <div class="form-group">
        <label>{{$title}}</label>
        <select name="{{$name}}" class="form-control" id="{{$name}}" >
            <option class="select" value="">--- {{__('generate.translate.button.select')}} {{$title}} ---</option>
            <option value="0">Female</option>
            <option value="1">Male</option>
        </select>
    </div>
</div>

