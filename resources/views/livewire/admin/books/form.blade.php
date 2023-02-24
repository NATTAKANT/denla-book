<!-- Modal -->
<!-- Start FormModal -->

<div class="modal fade ft-prompt" id="FormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="FormModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FormModal">
                    {{-- <i class="fi fi-rr-plus me-2"></i> --}}
                    จัดการหนังสือ
                </h5>
                <button type="button" class="btn-close btn-primary" onclick="window.location.reload()"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">
                    <div class="row gy-4">

                        <div class="col-4">
                            {{-- @if ($book->img)
                                <img class="img-fluid" src="{{ asset('storage/images/' . $book->img) }}" alt="">
                            @else --}}
                            <img class="img-fluid" src="{{ asset('storage/images/product/2.jpg') }}" alt=""
                                width="570" height="650">
                            {{-- @endif --}}

                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn tp-btn-light btn-secondary" onclick="window.location.reload()"
                        data-bs-dismiss="modal">
                        ยกเลิก
                    </button>
                    <button type="submit" class="btn light btn-primary" wire:target="submit"
                        wire:loading.attr="disabled">
                        <i class="fi fi-rr-disk me-2" wire:loading.class="d-none"></i>
                        <i class="fi fi-rr-loading d-none" wire:loading.class.remove="d-none"></i>
                        ยืนยัน
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End FormModal -->
