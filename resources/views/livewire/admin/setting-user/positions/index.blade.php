<div>
            <div class="card-body">
                <div class="row g-3">
                    
                    <div class="col-md-4 col-lg-6" wire:ignore>
                        <select class="form-control wide" wire:model="status"
                            onchange="@this.set('status',$(this).val())">
                            <option value="">สถานะทั้งหมด</option>
                            <option value="active">ปกติ</option>
                            <option value="inactive">ระงับการใช้งาน</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-6">
                        <input wire:model="search" class="form-control" type="text" placeholder="ค้นหาชื่อ - นามสกุล">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อตำแหน่ง</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($position as $key => $rows)


                            <tr>
                                <th>{{ $loop->iteration ?? '-' }}</th>
                                <td class="color-primary">{{ $rows->name ?? '-' }}</td>
                                <td>
                                <span class="badge badge-primary light">
                                    {{ $rows->status ?? '-' }}
                                  </span>
                                </td>

                                <td class="color-primary">

                                    <button  wire:click="edit_show({{ $rows->id }})"
                                    type="button" class="btn btn-warning shadow btn-sm sharp me-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editUserModal"

                              >
                                        <i class="fa fa-pencil"></i>
                                    </button>

                            </td>

                            </tr>
                            @empty
                            <td colspan="7" class="text-center">
                                <h5 class="text-danger">ไม่พบข้อมูล</h5>
                            </td>
                        </tr>
                        @endforelse

                        </tbody>
                    </table>
                    {{ $position->links() }}
                </div>
            </div>

        <!-- /# card -->

<!-- Start addUserModal -->

 <!-- <div class="modal fade ft-prompt" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="addUserModalLabel" aria-hidden="true" wire:ignore.self>
 <div class="modal-dialog modal-lg">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="addUserModal" >
                 <i class="fi fi-rr-plus me-2"></i>เพิ่มผู้ใช้งาน
             </h5>
             <button type="button" class="btn-close"
                     onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent="create">
             <div class="modal-body">
                 <div class="row gy-4">

                     <div class="col-md-5">
                         <div>
                             <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" wire:model.defer="firstname"
                                 placeholder="กรุณากรอกชื่อ">
                             @error('firstname')
                                 <div class="text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-md-5">
                         <div>
                             <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" wire:model.defer="lastname"
                                 placeholder="กรุณากรอกนามสกุล">
                             @error('lastname')
                                 <div class="text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>

                     <div class="col-md-4">
                         <div>
                             <label class="form-label">Email</label>
                             <input type="email" class="form-control" wire:model.defer="email">
                             @error('email')
                                 <div class="text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>

                     <div class="col-md-4">
                         <div>
                             <label class="form-label">Password</label>
                             <input type="password" class="form-control" wire:model.defer="password">
                             @error('password')
                                 <div class="text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div>
                             <label class="form-label">Confirm Password</label>
                             <input type="password" class="form-control" wire:model.defer="password_confirmation">
                             @error('password_confirmation')
                                 <div class="text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>

                     <div class="col-md-4">
                         <div>
                             <label class="form-label">ตำแหน่ง</label>
                              <div wire:ignore>
                                 <select class="form-control wide" onchange="@this.set('position_id',$(this).val(),true)" >
                                     <option selected>เลือก</option>
                                     @foreach ($position as $rows)
                                         <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                                    @endforeach
                                 </select>
                             </div>
                          @error('position_id')
                             <div class="text-danger">{{ $message }}</div>
                         @enderror

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
                                     wire:model.defer="status" value="inactive" name="status">
                                 <label class="form-check-label" for="suspendStatus">
                                     ระงับการใช้งาน
                                 </label>
                             </div>
                             @error('status')
                             <div class="text-danger">{{ $message }}</div>
                         @enderror
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn tp-btn-light btn-secondary"
                      onclick="javascript:window.location.reload()"
                     data-bs-dismiss="modal">
                     ยกเลิก
                 </button>
                 <button type="submit" class="btn light btn-primary" wire:target="create"
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
             $('#user-title_id').val('').niceSelect('update')
             $('#user-position_id').val('').niceSelect('update')
             $('#user-role_id').val('').niceSelect('update')
         }
     });
 </script>
@endpush -->

<!-- End addUserModal -->



<!-- Start editUserModal -->

        <div class="modal fade ft-prompt" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editUserModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
        @if (session()->has('message'))
    <div class="alert alert-success">
        <h3 class="text-success">
        {{ session('message') }}
        </h3>
    </div>
     @elseif (session()->has('error'))
     <div class="alert alert-danger">
        <h3 class="text-danger">
        {{ session('error') }}
        </h3>
    </div>

    @endif
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModal" >
                        <i class="fi fi-rr-plus me-2"></i>จัดการตำแหน่ง
                    </h5>
                    <button type="button" class="btn-close"
                            onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="row gy-4">

                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">ชื่อตำแหน่ง</label>
                                   <input type="text" class="form-control" wire:model.defer="name"
                                        placeholder="กรุณากรอกชื่อ">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                                            wire:model.defer="status" value="inactive" name="status">
                                        <label class="form-check-label" for="suspendStatus">
                                            ระงับการใช้งาน
                                        </label>
                                    </div>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn tp-btn-light btn-secondary"
                             onclick="javascript:window.location.reload()"
                            data-bs-dismiss="modal">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn light btn-primary" wire:target="save"
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
    

      <!-- End editUserModal -->


</div>
