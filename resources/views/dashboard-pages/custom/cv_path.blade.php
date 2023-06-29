<div class="{{$col_class}}">
    <div class="form-group custom-image">
        <label for="{{$name}}">{{$title}}@if($required)<span class="text-lightred"> *</span>@endif</label>
        <input id="{{$name}}" class="d-none" type="file" name="{{$name}}" accept="image/*" />
        <label class="d-block mb-0" for="{{$name}}">
            <div class="select-image embed-responsive embed-responsive-16by9">
                <svg class="placeholder" width="42" height="37" viewBox="0 0 42 37" fill="#E3E8F0" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.866 0.333C2.246 0.333 0.933 1.646 0.933 3.266V26.733C0.933 28.354 2.246 29.666 3.866 29.666H23.1852L27.5852 25.266H5.333V15L8.690 11.6427C10.0764 10.2567 12.3231 10.2567 13.7091 11.6427L18.493 16.4265L21.6956 19.6291C22.3145 20.2481 23.3139 20.2423 23.9328 19.6234C24.5532 19.0045 24.5532 17.998 23.9328 17.3776L22.2427 15.6903L23.3571 14.576C24.7431 13.19 27 13.19 28.3758 14.576L33.3258 19.526L39.0664 13.7854V3.266C39.0664 1.646 37.7538 0.333 36.1331 0.333H3.866ZM31.7331 4.7331C33.3538 4.7331 34.666 6.046 34.666 7.666C34.666 9.287 33.3538 10.6 31.7331 10.6C30.1124 10.6 28.8 9.287 28.8 7.666C28.8 6.046 30.1124 4.7331 31.7331 4.7331ZM38.3274 19.4C37.8771 19.4 37.4281 19.5717 37.0841 19.9156L35.8409 21.1588L40.2409 25.5588L41.4841 24.3156C42.172 23.6277 42.172 22.5141 41.4841 21.8263L39.5735 19.9156C39.2295 19.5717 38.7776 19.4 38.3274 19.4ZM34.0792 22.9206L27.0409 29.9588L28.3586 30.4L28.8 32.6L31 33.0411L31.4409 34.3588L38.4792 27.3206L34.0792 22.9206ZM25.4138 33.614L24.437 36.3841C24.436 36.386 24.4351 36.3879 24.4341 36.4V36.4C24.412 36.4453 24.4003 36.5017 24.4 36.5588C24.4 36.6168 24.4109 36.6742 24.433 36.7278C24.4552 36.7814 24.4877 36.8301 24.5286 36.8711C24.5696 36.9121 24.6183 37 24.6719 37C24.7255 37 24.7829 37 24.8409 37C24.8938 37 24.9462 37 25 36.9713H25L27.7857 36L25.4138 33.614Z" />
                </svg>
                <img class="img-fluid img_{{$name}}" src="" alt="" />
            </div>
            <div class="btn btn-sm px-0 select-text" for="{{$name}}">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.8058 3.75414C14.0658 4.01414 14.0658 4.43414 13.8058 4.69414L12.5858 5.91414L10.0858 3.41414L11.3058 2.19414C11.4304 2.0693 11.5995 1.99915 11.7758 1.99915C11.9522 1.99915 12.1213 2.0693 12.2458 2.19414L13.8058 3.75414ZM2 13.6674V11.6408C2 11.5474 2.03236 11.4674 2.09902 11.4008L9.37236 4.12744L11.8724 6.62744L4.59236 13.9C4.53236 13.9674 4.44569 14 4.35902 14H2.33236C2.14569 14 2 13.8541 2 13.6674Z" />
                </svg>
                <span class="mt-0">{{__('generate.translate.label.edit_image')}}</span>
            </div>
        </label>
    </div>
</div>
