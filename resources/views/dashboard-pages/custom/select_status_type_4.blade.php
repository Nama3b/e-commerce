<div class="col-sm-4">
    <div class="form-group">
        <label>{{$title}}</label>
        <select name="{{$name}}" class="form-control" id="{{$name}}" >
            <option class="select" value="">--- {{__('generate.translate.button.select')}} {{$title}} ---</option>
            <option class="select" value="PENDING">Waiting</option>
            <option class="select" value="TRANSPORTING">Transporting</option>
            <option class="select" value="COMPLETED"></option>
            <option class="select" value="CANCELLED">Closed</option>
        </select>
    </div>
</div>
