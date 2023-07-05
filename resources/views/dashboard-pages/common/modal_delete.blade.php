<form class="modal_delete" method="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div id="modal_delete" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h4 class="modal-title">{{__('generate.translate.button.delete')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    {{__('generate.translate.button.confirm-delete')}}
                </div>
                <div class="modal-footer py-3 border-top-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary btn-outline-hover-brown" data-dismiss="modal">{{__('generate.translate.button.cancel')}}</button>
                    <button type="submit" class="btn btn-secondary btn-hover-brown">{{__('generate.translate.button.delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>