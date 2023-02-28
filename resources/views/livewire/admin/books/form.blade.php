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
                {{-- <button type="button" class="btn-close btn-primary" onclick="window.location.reload()"
                data-bs-dismiss="modal" aria-label="Close">
            </button> --}}

                <input type="checkbox" wire:model="status" checked data-toggle="toggle" data-on="เผยแพร่"
                    data-off="ไม่แผยแพร่" data-width="100" data-onstyle="success" data-size="xs" data-offstyle="danger">


            </div>
            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                <div wire:ignore class="modal-body">
                    <div class="row gy-4">

                        <div class="col-4">
                            {{-- @if ($book->img)
                                <img class="img-fluid" src="{{ asset('storage/images/' . $book->img) }}" alt="">
                            @else --}}
                            @if (array_key_exists('img', $form))
                                <img class="img-fluid" src="{{ $form['img']->temporaryUrl() }}" alt=""
                                    style="width: 400px;height: 450px;">
                            @else
                                <img class="img-fluid" src="{{ asset('storage/images/product/2.jpg') }}" alt=""
                                    style="width: 400px;height: 450px;">
                            @endif

                            <div class="mx-2 mt-2" wire:ignore>
                                <input type="file" wire:model="form.img" accept="image/*" id="file-1"
                                    class="form-control inputfile inputfile-1" />
                                <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="17" viewBox="0 0 20 17">
                                        <path
                                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                    </svg> <span>Choose a file&hellip;</span>
                                </label>
                            </div>



                            {{-- <div class="input-group mt-3">
                                <span class="input-group-text bg-white">Upload</span>
                                <div class="form-file">
                                    <input type="file" wire:model="form.img" accept="image/*"
                                        class="form-file-input form-control">
                                </div>
                            </div> --}}
                            {{-- @endif --}}

                        </div>
                        <div class="col-8">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">ชื่อเรื่อง <span class="text-danger">*</span></label>
                                        <input type="text" wire:model.defer="form.title" class="form-control"
                                            placeholder="ชื่อเรื่อง">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"> ชื่อหนังสืออื่นๆ</label>
                                        <input type="text" wire:model.defer="form.title_another" class="form-control"
                                            placeholder="ชื่อหนังสืออื่นๆ">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">ขื่อผู้แต่ง <span class="text-danger">*</span></label>
                                        <input type="text" wire:model.defer="form.author" class="form-control"
                                            placeholder="ขื่อผู้แต่ง">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">ผู้แต่งร่วม</label>
                                        <input type="text" wire:model.defer="form.author_co" class="form-control"
                                            placeholder="ผู้แต่งร่วม">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">ผู้แปล</label>
                                        <input type="text" wire:model.defer="form.responsibility"
                                            class="form-control" placeholder="ผู้แปล">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">สำนักพิมพ์ </label>
                                        <input type="text" wire:model.defer="form.publisher" class="form-control"
                                            placeholder="สำนักพิมพ์">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">หัวหนังสือ</label>


                                        <select class="form-control" id="category-dropdown" wire:model="tagselect"
                                            multiple placeholder="เลือกหัวหนังสือ">

                                            {{-- <option value="" selected>เลือกหัวหนังสือ</option> --}}
                                            @foreach ($tags as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">จำนวนหน้า</label>
                                        <input type="number" min="0" wire:model.defer="form.page"
                                            class="form-control" placeholder="จำนวนหน้า">

                                    </div>
                                    <div wire:ignore class="mb-3 col-md-3">
                                        <label class="form-label">กลุ่มหนังสือ <span
                                                class="text-danger">*</span></label>
                                        <select class="me-sm-2 form-control wide" wire:model="form.collection_id"
                                            id="inlineFormCustomSelect">
                                            <option value="" selected>ระบุกลุ่มหนังสือ</option>
                                            @foreach ($collections as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div wire:ignore class="mb-3 col-md-3">
                                        <label class="form-label">ตำแหน่งหนังสือ <span
                                                class="text-danger">*</span></label>
                                        <select class="me-sm-2 form-control wide" wire:model="form.location_id"
                                            id="inlineFormCustomSelect">
                                            <option value="" selected>ระบุตำแหน่งหนังสือ</option>
                                            <option value="active">เผยแพร่</option>
                                            <option value="inactive">ไม่เผยแพร่</option>
                                        </select>
                                    </div>
                                    <div wire:ignore class="mb-3 col-md-3">
                                        <label class="form-label">ประเภทชิ้นงาน <span
                                                class="text-danger">*</span></label>
                                        <select class="me-sm-2 form-control wide" wire:model="form.material_id"
                                            id="inlineFormCustomSelect">
                                            <option value="" selected>ระบุประเภทชิ้นงาน</option>
                                            @foreach ($materials as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">เลขเรียกหนังสือ <span
                                                class="text-danger">*</span></label>
                                        <input type="text" wire:model.defer="form.call_number"
                                            class="form-control" placeholder="เลขเรียกหนังสือ">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">ISBN <span class="text-danger">*</span></label>
                                        <input type="text" wire:model.defer="form.ISBN" class="form-control"
                                            placeholder="ISBN">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">ISSN</label>
                                        <input type="text" wire:model.defer="form.ISSN" class="form-control"
                                            placeholder="ISSN">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">DOI</label>
                                        <input type="text" wire:model.defer="form.DOI" class="form-control"
                                            placeholder="DOI">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">เรื่องย่อ</label>
                                        <textarea class="form-control" wire:model.defer="form.synopsis" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn tp-btn-light btn-secondary" onclick="window.location.reload()"
                        data-bs-dismiss="modal">
                        ยกเลิก
                    </button>
                    <button wire:click="submit" class="btn light btn-primary">
                        {{-- <i class="fi fi-rr-disk me-2" wire:loading.class="d-none"></i>
                        <i class="fi fi-rr-loading d-none" wire:loading.class.remove="d-none"></i> --}}
                        ยืนยัน
                    </button>
                    {{-- <button type="submit" class="btn light btn-primary" wire:target="submit"
                        wire:loading.attr="disabled">
                        <i class="fi fi-rr-disk me-2" wire:loading.class="d-none"></i>
                        <i class="fi fi-rr-loading d-none" wire:loading.class.remove="d-none"></i>
                        ยืนยัน
                    </button> --}}
                </div>
            </form>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#category-dropdown').select2();
            $('#category-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('tagselect', data);
            });

        });
        $(function() {
            $('#toggle-status').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        })
    </script>
@endpush

<!-- End FormModal -->
