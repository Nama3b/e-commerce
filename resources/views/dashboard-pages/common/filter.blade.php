@if($filter)
    <div class="card-header border-bottom-0 py-0">
        <form id="filter">
            <div class="row">
                @foreach($filter as $key => $value)
                    @if(is_array($value))
                        @if($value['type'] == 'select')
                            @if(optional($value)['value'])
                                <div class="col-sm-3">
                                    <div class="form-group mb-0">
                                        <label for="{{$key}}">{{$value['title']}}</label>
                                        <select id="{{$key}}" name="{{$key}}" class="select2">
                                            @foreach($value['value'] as $keyOption => $valueOption)
                                                <option value="{{$keyOption}}">{{$valueOption}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @elseif(optional($value)['include'])
                                @include($value['include'], ['title'=> $value['title'], 'options' => ${$value['variable']}, 'name'=> $key])
                            @endif
                        @endif
                    @else
                        <div class="col-sm-3">
                            <div class="form-group has-icon mb-0">
{{--                                <label for="{{$key}}">{{ (url('category_news') && ($value == 'コード')) ? 'ID' : $value}}</label>--}}
                                <svg class="btn-clear-input" width="20" height="20" viewBox="0 0 20 20" fill="#8A94A6" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1.667C5.39169 1.667 1.667 5.39166 1.667 10C1.667 14.6083 5.39169 18.3333 10 18.3333C14.6084 18.3333 18.3334 14.6083 18.3334 10C18.3334 5.39166 14.6084 1.667 10 1.667ZM11.575 7.25L10 8.825L8.42503 7.25C8.26933 7.09395 8.05796 7.00626 7.83753 7.00626C7.61709 7.00626 7.40572 7.09395 7.25003 7.25C6.92502 7.575 6.92502 8.1 7.25003 8.425L8.82503 10L7.25003 11.575C6.92502 11.9 6.92502 12.425 7.25003 12.75C7.57503 13.075 8.1 13.075 8.42503 12.75L10 11.175L11.575 12.75C11.9 13.075 12.425 13.075 12.75 12.75C13.075 12.425 13.075 11.9 12.75 11.575L11.175 10L12.75 8.425C13.075 8.1 13.075 7.575 12.75 7.25C12.425 6.933 11.8917 6.933 11.575 7.25ZM3.333 10C3.333 13.675 6.32502 16.667 10 16.667C13.675 16.667 16.667 13.675 16.667 10C16.667 6.32499 13.675 3.333 10 3.333C6.32502 3.333 3.333 6.32499 3.333 10Z" />
                                </svg>
                                <input id="{{$key}}" type="text" name="{{$key}}" class="form-control input" placeholder="{{__('generate.translate.button.input')}} {{ \Illuminate\Support\Str::lower($value)}}">
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="col-sm-2">
                    <div class="form-group mb-0">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-secondary btn-hover-brown btn-hover-brown form-control search" style="height:44px">{{__('generate.translate.button.search')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif
