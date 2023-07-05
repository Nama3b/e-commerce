<div class="{{$col_class}}">
    <div class="form-group">
        <select id="{{$name}}" name="{{$name}}" label="{{$title}}"
                            data-placeholder="{{__('generate.translate.button.select')}}.."
                            class="select2-clear {{'select2_'. $name}}" igroup-size="lg" :config="$config" >
            @foreach($options as $key => $value )
                <option value="{{$value}}">{{$key}}</option>
            @endforeach
        </select>
        <div class="select_{{$name}}"></div>
    </div>
</div>
