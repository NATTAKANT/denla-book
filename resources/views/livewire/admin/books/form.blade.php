<!-- Modal -->
<!-- Start FormModal -->

<div class="modal fade ft-prompt" id="FormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="FormModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div wire:ignore class="modal-header">
                <h5 class="modal-title" id="FormModal">
                    จัดการหนังสือ
                </h5>

                <input type="checkbox" id="status" wire:model.defer="form.status" />

            </div>
            <form wire:submit.prevent="submit" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="row gy-4">
                        @if ($errors->all())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="me-2">
                                    <polygon
                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                    </polygon>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                                <strong>เกิดข้อผิดพลาด!</strong> โปรดตรวจสอบข้อมูลอีกครั้ง


                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                </button>
                            </div>
                        @endif
                        <div class="col-4">
                            {{-- @if ($book->img)
                                <img class="img-fluid" src="{{ asset('storage/images/' . $book->img) }}" alt="">
                            @else --}}
                            @if ($form['img'])
                                <img class="img-fluid" src="{{ $form['img'] }}" alt=""
                                    style="width: 400px;height: 450px;">
                            @elseif(isset($form['img_preview']))
                                <img class="img-fluid" src="{{ $form['img_preview']->temporaryUrl() }}" alt=""
                                    style="width: 400px;height: 450px;">
                            @else
                                <img class="img-fluid" src="{{ asset('storage/images/product/2.jpg') }}" alt=""
                                    style="width: 400px;height: 450px;">
                            @endif

                            <div class="mx-2 mt-2" wire:ignore>
                                <input type="file" wire:model="form.img_preview" accept="image/*" id="file-1"
                                    class="form-control inputfile inputfile-1" />
                                <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="17" viewBox="0 0 20 17">
                                        <path
                                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                    </svg> <span>เลือกปกหนังสือ&hellip;</span>
                                </label>
                            </div>

                        </div>
                        <div class="col-8">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">ชื่อเรื่อง <span class="text-danger">*
                                            </span></label>
                                        <input type="text" wire:model.defer="form.title"
                                            class="form-control form-outline-danger" placeholder="ชื่อเรื่อง">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"> ชื่อหนังสืออื่นๆ</label>
                                        <input type="text" wire:model.defer="form.title_another" class="form-control"
                                            placeholder="ชื่อหนังสืออื่นๆ">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">ขื่อผู้แต่ง <span class="text-danger">*
                                            </span></label>
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
                                        <label class="form-label">สำนักพิมพ์ <span class="text-danger">*

                                            </span></label>
                                        <input type="text" wire:model.defer="form.publisher" class="form-control"
                                            placeholder="สำนักพิมพ์">
                                    </div>
                                    <div wire:ignore class="mb-3 col-md-12">
                                        <label class="form-label">หัวหนังสือ</label>


                                        <select class="form-control" id="category-dropdown"
                                            wire:model.defer="tagselect" multiple placeholder="เลือกหัวหนังสือ">

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
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">กลุ่มหนังสือ <span class="text-danger">*
                                                {{-- @error('form.collection_id')
                                                    {{ $message }}
                                                @enderror --}}
                                            </span></label>
                                        <select wire:ignore class="me-sm-2 form-control wide"
                                            wire:model.defer="form.collection_id" id="inlineFormCustomSelect">
                                            <option selected>ระบุกลุ่มหนังสือ</option>
                                            @foreach ($collections as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">ตำแหน่งหนังสือ <span class="text-danger">*
                                                {{-- @error('form.location_id')
                                                    {{ $message }}
                                                @enderror --}}
                                            </span></label>
                                        <select wire:ignore class="me-sm-2 form-control wide"
                                            wire:model.defer="form.location_id" id="inlineFormCustomSelect">
                                            <option selected>ระบุตำแหน่งหนังสือ</option>
                                            @foreach ($locations as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">ประเภทชิ้นงาน <span class="text-danger">*
                                                {{-- @error('form.material_id')
                                                    {{ $message }}
                                                @enderror --}}
                                            </span></label>
                                        <select wire:ignore class="me-sm-2 form-control wide"
                                            wire:model.defer="form.material_id" id="inlineFormCustomSelect">
                                            <option selected>ระบุประเภทชิ้นงาน</option>
                                            @foreach ($materials as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">เลขเรียกหนังสือ <span class="text-danger">*
                                                {{-- @error('form.call_number')
                                                    {{ $message }}
                                                @enderror --}}
                                            </span></label>
                                        <input type="text" wire:model.defer="form.call_number"
                                            class="form-control" placeholder="เลขเรียกหนังสือ">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">ISBN <span class="text-danger">*
                                                {{-- @error('form.ISBN')
                                                    {{ $message }}
                                                @enderror --}}
                                            </span></label>
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
                    <button type="button" wire:click="cancel" class="btn tp-btn-light btn-secondary"
                        data-bs-dismiss="modal">
                        ยกเลิก
                    </button>
                    <button type="submit" data-bs-dismiss="modal" class="btn light btn-primary">
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
        document.addEventListener('livewire:load', function() {
            Livewire.on('parameterSet', function(paramValue) {
                $(document).ready(function() {
                    $('#category-dropdown').
                    select2().
                    val(paramValue).
                    trigger('change').
                    on('change',
                        function(e) {
                            let data = $(this).val();
                            @this.set('tagselect', data);
                        });
                });
                $(function() {
                    $('#status')
                        .bootstrapToggle({
                            on: 'เผยแพร่',
                            off: 'ไม่แผยแพร่',
                            offstyle: 'danger',
                            onstyle: 'success',
                            toggle: 'toggle',
                            size: 'xs',
                            width: 100,
                        })
                })
            });
        });
        $(document).ready(function() {
            $('#category-dropdown').
            select2().
            val(paramValue).
            trigger('change').
            on('change',
                function(e) {
                    let data = $(this).val();
                    @this.set('tagselect', data);
                });
        });
        $(function() {
            $('#status')
                .bootstrapToggle({
                    on: 'เผยแพร่',
                    off: 'ไม่แผยแพร่',
                    offstyle: 'danger',
                    onstyle: 'success',
                    size: 'xs',
                    width: 100,
                });
        })
    </script>
@endpush

<!-- End FormModal -->
