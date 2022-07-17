 <!-- Delete Modal -->
 <div class="modal fade zoomIn" id="deleteModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/gsqxdxog.json"
                        trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548"
                        style="width:100px;height:100px"
                    >
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-1 mx-sm-3">
                        @if( config('app.locale') == 'ch')
                            <h4 class="text-muted mx-3 mb-0" id="text">您确定要删除此记录吗？</h4>
                        @elseif( config('app.locale') == 'jp')
                            <h4 class="text-muted mx-3 mb-0" id="text">このレコードを削除してもよろしいですか？</h4>
                        @elseif( config('app.locale') == 'sp')
                            <h4 class="text-muted mx-3 mb-0" id="text">¿Estás segura de que quieres eliminar este registro?
                            </h4>
                        @elseif( config('app.locale') == 'hi')
                            <h4 class="text-muted mx-3 mb-0" id="text">क्या आप वाकई इस रिकॉर्ड को हटाना चाहते हैं?</h4>
                        @else
                            <h4 class="text-muted mx-3 mb-0" id="text">Are you Sure You want to Remove this Record ?</h4>
                        @endif
                    </div>
                </div>

                <form action="#" id="modal_del_form" method="post">
                    @csrf
                    @method('delete')

                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                        <button type="submit" class="btn w-sm btn-danger " id="delete-record">{{ __('main.yes-delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- Activate Modal -->
<div class="modal fade zoomIn" id="activeModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/inrunzby.json"
                        trigger="loop"
                        olors="primary:#f7b84b,secondary:#f06548"
                        style="width:100px;height:100px"
                    >
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-1 mx-sm-3">
                        <h4 class="text-muted mx-3 mb-0" id="text"></h4>
                    </div>
                </div>

                <form action="#" id="modal_activate_form" method="post">
                    @csrf
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">
                            {{ __('main.no')}}
                        </button>
                        <button type="submit" class="btn w-sm btn-danger">
                            {{ __('main.yes')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- Topup Modal -->
<div class="modal fade zoomIn" id="topupModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/inrunzby.json"
                        trigger="loop"
                        olors="primary:#f7b84b,secondary:#f06548"
                        style="width:100px;height:100px"
                    >
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-1 mx-sm-3">
                        <h4 class="text-muted mx-3 mb-0" id="text"></h4>
                    </div>
                </div>

                <form action="#" id="modal_topup_form" method="post">
                    @csrf
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn w-sm btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- Invest Modal -->
<div class="modal fade zoomIn" id="investModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/inrunzby.json"
                        trigger="loop"
                        olors="primary:#f7b84b,secondary:#f06548"
                        style="width:100px;height:100px"
                    >
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-1 mx-sm-3">
                        <h4 class="text-muted mx-3 mb-0" id="text"></h4>
                    </div>
                </div>
                <form action="#" id="modal_invest_form" method="post">
                    @csrf
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('main.no') }}</button>
                        <button type="submit" class="btn w-sm btn-danger">{{ __('main.yes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- Withdrawl Modal -->
<div class="modal fade zoomIn" id="withdrawlModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/inrunzby.json"
                        trigger="loop"
                        olors="primary:#f7b84b,secondary:#f06548"
                        style="width:100px;height:100px"
                    >
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-1 mx-sm-3">
                        <h4 class="text-muted mx-3 mb-0" id="text"></h4>
                    </div>
                </div>

                <form action="#" id="modal_withdrawl_form" method="post">
                    @csrf
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">
                            {{ __('main.no') }}
                        </button>
                        <button type="submit" class="btn w-sm btn-danger">
                            {{ __('main.yes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- Identity Modal -->
<div class="modal fade zoomIn" id="identityModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/inrunzby.json"
                        trigger="loop"
                        olors="primary:#f7b84b,secondary:#f06548"
                        style="width:100px;height:100px"
                    >
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-1 mx-sm-3">
                        <h4 class="text-muted mx-3 mb-0" id="text"></h4>
                    </div>
                </div>

                <form action="#" id="modal_identity_form" method="post">
                    @csrf
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">
                            {{ __('main.no') }}
                        </button>
                        <button type="submit" class="btn w-sm btn-danger">
                            {{ __('main.yes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal -->
