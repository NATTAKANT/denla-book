<div class="card-header d-block">
    <div class="row d-flex align-items-center">
        <div class="col-lg-6">
            <h2 class="card-title">หนังสือ</h2>
        </div>
        <div class="col-lg-6 text-end">
            {{-- <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                data-bs-target="#addUserModal">

                    <i class="fi fi-rr-plus color-primary"></i>
              เพิ่มเจ้าหน้าที่
            </button> --}}
            <label class="radio-inline me-3"><input type="radio" wire:model="mode" value="0"> ตาราง</label>
            <label class="radio-inline me-3"><input type="radio" wire:model="mode" value="1"> การ์ด</label>
            <button type="button" class="btn btn-rounded btn-secondary" data-bs-target="#FormModal">
                <img src="{{ asset('assets/admin/images/filter.png') }}">
                ค้นหาขั้นสูง
            </button>
            <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                data-bs-target="#FormModal">
                <i class="fi fi-rr-plus color-primary"></i>
                เพิ่มหนังสือ
            </button>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="basic-form">
        <div class="basic-form">
            <form>
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label class="form-label">ชื่อเรื่อง</label>
                        <input type="text" class="form-control" wire:model.debounce.1000ms="filters.title"
                            placeholder="ชื่อเรื่อง">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label class="form-label">ผู้แต่ง</label>
                        <input type="text" class="form-control" wire:model.debounce.1000ms="filters.author"
                            placeholder="ชื่อผู้แต่ง">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label class="form-label">การเผยแพร่</label>
                        <select class="me-sm-2 form-control wide" wire:model="filters.status"
                            id="inlineFormCustomSelect">
                            <option value="" selected>ทั้งหมด</option>
                            <option value="active">เผยแพร่</option>
                            <option value="inactive">ไม่เผยแพร่</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
