<div class="modal fade ft-prompt" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addUserModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModal">
                    <i class="fi fi-rr-plus me-2"></i>เพิ่มผู้ใช้งาน
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">
                    <div class="row gy-4">
                        
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">คำนำหน้า</label>
                                 <div wire:ignore>
                                    <select class="default-select  form-control wide"
                                        onchange="">
                                        <option selected>เลือกคำนำหน้า</option>
                                      
                                            <option value=""></option>
                                       
                                    </select>
                                </div>
                                
                                    <div class="text-danger"></div>
                            
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">ชื่อ</label>
                               <input type="text" class="form-control" wire:model.defer="firstname"
                                    placeholder="กรุณากรอกชื่อ">
                                @error('firstname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">นามสกุล</label>
                               <input type="text" class="form-control" wire:model.defer="lastname"
                                    placeholder="กรุณากรอกนามสกุล">
                                @error('lastname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" wire:model.defer="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" wire:model.defer="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" wire:model.defer="password_confirmation">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">เบอร์โทรศัพท์</label>
                                <input type="tel" class="form-control" wire:model.defer="phone">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">ตำแหน่ง</label>
                                <div wire:ignore>
                                    <select class="default-select  form-control wide"
                                        onchange="">
                                        <option value="">เลือกตำแหน่ง</option>
                                       
                                            <option value=""></option>
                                      
                                    </select>
                                </div>
                                
                                    <div class="text-danger"></div>
                                
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">กลุ่มผู้ใช้งาน</label>
                                 <div wire:ignore>
                                    <select class="default-select  form-control wide"
                                        onchange="">
                                        <option value="">เลือกกลุ่มผู้ใช้งาน</option>
                                        
                                            <option value=""></option>
                                 
                                    </select>
                                </div>
                               
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <div>
                                <label class="form-label">สถานะ</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="activeStatus"
                                        wire:model.defer="status" value="active" name="status">
                                    <label class="form-check-label" for="activeStatus">
                                        ปกติ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="suspendStatus"
                                        wire:model.defer="status" value="suspend" name="status">
                                    <label class="form-check-label" for="suspendStatus">
                                        ระงับการใช้งาน
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn tp-btn-light btn-secondary"
                        data-bs-dismiss="modal">ยกเลิก</button>
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
@push('scripts')
    <script>
        Livewire.on('addUser', data => {
            if (data.hide == true) {
                $('#addUserModal').modal('hide');
                $('#user-title').val('').niceSelect('update')
                $('#user-agency').val('').niceSelect('update')
                $('#user-position').val('').niceSelect('update')
                $('#user-role').val('').niceSelect('update')
            }
        });
    </script>
@endpush
