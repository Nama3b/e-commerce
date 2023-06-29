@php( $configDate = [ 'format' => 'YYYY-MM-DD HH:mm', 'maxDate' => 'js:moment()', ])

<div class="{{$col_class}}">
    <label>
        <input type="date" name="{{$name}}" placeholder="Chọn thời gian" class="datetimepicker-input" label="{{$title}}" style="width: 100% !important;">
    </label>
</div>

