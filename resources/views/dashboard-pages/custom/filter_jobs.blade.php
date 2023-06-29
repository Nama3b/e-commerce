<div class="col-sm-4">
    <div class="form-group">
        <label>{{$title}}</label>
        <select name="{{$name}}" class="form-control" id="{{$name}}" >
            <option class="select" value="">--- {{__('generate.translate.button.select')}} {{$title}} ---</option>
            @foreach($options as $keyOption => $valueOption)
                <option value="{{$valueOption}}"
                        @if(request()->filled($name) && request()->input($name) == $keyOption)
                            selected
                    @endif
                >{{$keyOption}}
                </option>
            @endforeach
        </select>
    </div>
</div>
