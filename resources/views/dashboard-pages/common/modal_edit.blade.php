<form class="modal_edit" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input type='hidden' name='status'/>
    <div id="modal_edit" class="modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h4 class="modal-title"></h4>
                        <button id="reset-form" class="btn btn-blue btn-sm ml-4 reset" type="reset">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill="white"
                                      d="M13.4045 0.488615C13.1836 0.491852 12.973 0.582641 12.8191 0.741034C12.6651 0.899428 12.5803 1.11247 12.5833 1.33334V2.07065C11.315 1.08826 9.72434 0.500008 8 0.500008C3.8676 0.500008 0.5 3.86761 0.5 8.00001C0.5 12.1324 3.8676 15.5 8 15.5C12.1324 15.5 15.5 12.1324 15.5 8.00001C15.5 7.67127 15.4726 7.35927 15.4357 7.06332C15.4241 6.95311 15.3907 6.84632 15.3373 6.7492C15.2839 6.65208 15.2117 6.56657 15.1249 6.49768C15.0381 6.4288 14.9385 6.37791 14.8318 6.34801C14.7251 6.31811 14.6135 6.30978 14.5035 6.32353C14.3935 6.33727 14.2874 6.37281 14.1914 6.42806C14.0953 6.48331 14.0112 6.55716 13.944 6.6453C13.8769 6.73343 13.8279 6.83408 13.8001 6.94135C13.7723 7.04862 13.7662 7.16036 13.7821 7.27003C13.8135 7.52157 13.8333 7.76291 13.8333 8.00001C13.8333 11.2318 11.2318 13.8333 8 13.8333C4.76823 13.8333 2.16667 11.2318 2.16667 8.00001C2.16667 4.76824 4.76823 2.16667 8 2.16667C9.09794 2.16667 10.1172 2.47452 10.9907 3.00001H10.9167C10.8062 2.99845 10.6966 3.01885 10.5941 3.06003C10.4917 3.1012 10.3984 3.16234 10.3197 3.23987C10.2411 3.31741 10.1787 3.40981 10.136 3.51169C10.0934 3.61357 10.0715 3.7229 10.0715 3.83334C10.0715 3.94378 10.0934 4.05312 10.136 4.155C10.1787 4.25688 10.2411 4.34927 10.3197 4.42681C10.3984 4.50434 10.4917 4.56548 10.5941 4.60666C10.6966 4.64784 10.8062 4.66824 10.9167 4.66667H13.2035H13.4167C13.6377 4.66665 13.8496 4.57885 14.0059 4.42257C14.1622 4.2663 14.25 4.05435 14.25 3.83334V1.33334C14.2515 1.22192 14.2307 1.11132 14.1887 1.00809C14.1468 0.904866 14.0845 0.8111 14.0057 0.732344C13.9269 0.653587 13.833 0.59144 13.7298 0.549576C13.6265 0.507712 13.5159 0.486983 13.4045 0.488615Z"/>
                            </svg>
                            <span>{{__('generate.translate.button.delete-data')}}</span>
                        </button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-0">
                    <div class="row mb-2">
                        @foreach($editor as $keyEdit => $valueEdit)
                            @php ($required = isset($valueEdit['required']) ?? false)
                            @php ($col_class = isset($valueEdit['col_class']) ? $valueEdit['col_class'] : "col-sm-6")
                            @switch($valueEdit['type'])
                                @case('textarea')
                                <div class="{{$col_class}}">
                                    <div class="form-group d-flex flex-column flex-grow-1">
                                        <label for="textarea-{{$keyEdit}}">{{$valueEdit['label']}}
                                            @if($required)
                                                <span class="text-lightred"> *</span>
                                            @endif
                                        </label>
                                        <textarea id="textarea-{{$keyEdit}}" name="{{$keyEdit}}"
                                                  class="form-control flex-grow-1 select_{{$keyEdit}}"
                                                  placeholder="{{__('generate.translate.button.input')}} {{$valueEdit['label']}}"></textarea>
                                        <div class="mt-2">&nbsp;</div>
                                    </div>
                                </div>
                                @break
                                @case('include')
                                @if($valueEdit['widget'] == 'select2' || $valueEdit['widget'] == 'checkbox' )
                                    @include($valueEdit['include'], ['title'=> $valueEdit['label'], 'name'=> $keyEdit,
                                    'required' => $required, 'col_class'=> $col_class, 'options' => $options])
                                @elseif($valueEdit['widget'] == 'date_time_picker')
                                    @include($valueEdit['include'], ['title'=> $valueEdit['label'], 'name'=> $keyEdit,
                                    'required' => $required, 'col_class'=> $col_class])
                                @else
                                    @include($valueEdit['include'], ['title'=> $valueEdit['label'], 'name'=> $keyEdit,
                                    'required' => $required, 'col_class'=> $col_class])
                                @endif
                                @break
                                @default
                                <div class="{{$col_class}}">
                                    <div class="form-group has-icon">
                                        <label for="input-{{$keyEdit}}">{{$valueEdit['label']}}
                                            @if($required)
                                                <span class="text-lightred"> *</span>
                                            @endif
                                        </label>
                                        <svg class="btn-clear-input" width="20" height="20" viewBox="0 0 20 20"
                                             fill="#8A94A6" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M10 1.667C5.39169 1.667 1.667 5.39166 1.667 10C1.667 14.6083 5.39169 18.3333 10 18.3333C14.6084 18.3333 18.3334 14.6083 18.3334 10C18.3334 5.39166 14.6084 1.667 10 1.667ZM11.575 7.25L10 8.825L8.42503 7.25C8.26933 7.09395 8.05796 7.00626 7.83753 7.00626C7.61709 7.00626 7.40572 7.09395 7.25003 7.25C6.92502 7.575 6.92502 8.1 7.25003 8.425L8.82503 10L7.25003 11.575C6.92502 11.9 6.92502 12.425 7.25003 12.75C7.57503 13.075 8.1 13.075 8.42503 12.75L10 11.175L11.575 12.75C11.9 13.075 12.425 13.075 12.75 12.75C13.075 12.425 13.075 11.9 12.75 11.575L11.175 10L12.75 8.425C13.075 8.1 13.075 7.575 12.75 7.25C12.425 6.933 11.8917 6.933 11.575 7.25ZM3.333 10C3.333 13.675 6.32502 16.667 10 16.667C13.675 16.667 16.667 13.675 16.667 10C16.667 6.32499 13.675 3.333 10 3.333C6.32502 3.333 3.333 6.32499 3.333 10Z"/>
                                        </svg>
                                        <input id="input-{{$keyEdit}}"
                                               type="{{optional($valueEdit)['specific']?:'text'}}" name="{{$keyEdit}}"
                                               class="form-control"
                                               placeholder="{{__('generate.translate.button.input')}} {{$valueEdit['label']}}">
                                    </div>
                                </div>
                                @break
                            @endswitch
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer py-3 border-top-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary btn-outline-hover-brown" data-dismiss="modal"
                            aria-label="Close">キャンセル
                    </button>
                    <button class="btn btn-secondary btn-hover-brown"
                            type="submit"> {{__('generate.translate.button.save')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
