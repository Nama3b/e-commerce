<div class="col-sm-4">
    <div class="form-group">
        <label>{{$title}}</label>
        <select name="{{$name}}" class="form-control" id="{{$name}}" >
            <option class="select" value="">--- {{__('generate.translate.button.select')}} {{$title}} ---</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>
</div>
