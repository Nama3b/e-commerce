<div class="col-sm-4">
    <div class="form-group">
        <label>{{$title}}</label>
        <select name="{{$name}}" class="form-control" id="{{$name}}" >
            <option class="select" value="">--- {{__('generate.translate.button.select')}} {{$title}} ---</option>
            <option class="select" value="WAITING">Waiting</option>
            <option class="select" value="ACTIVE">Active</option>
            <option class="select" value="CLOSED">Closed</option>
        </select>
    </div>
</div>
