<div>
   
   
      
            
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4 col-lg-3" wire:ignore="">
                        <select class="default-select form-control wide" wire:model="role" onchange="window.livewire.find('Kwg0HWXDfBJKczVjCGEl').set('role',$(this).val())" style="display: none;">
                            <option value="">กลุ่มผู้ใช้งานทั้งหมด</option>
                                                <option value="">SuperAdmin</option>
                                                <option value="">Admin</option>
                                        </select><div class="nice-select default-select form-control wide" tabindex="0"><span class="current">กลุ่มผู้ใช้งานทั้งหมด</span><ul class="list"><li data-value="" class="option selected">กลุ่มผู้ใช้งานทั้งหมด</li><li data-value="3" class="option">ผู้ดูแลระบบ</li><li data-value="4" class="option">ผู้จัดการโรงแรม</li><li data-value="5" class="option">เจ้าหน้าที่บัญชี</li></ul></div>
                    </div>
                    <div class="col-md-4 col-lg-3" wire:ignore="">
                        <select class="default-select form-control wide" wire:model="status" onchange="window.livewire.find('Kwg0HWXDfBJKczVjCGEl').set('status',$(this).val())" style="display: none;">
                            <option value="">สถานะทั้งหมด</option>
                            <option value="active">ปกติ</option>
                            <option value="suspend">ระงับการใช้งาน</option>
                        </select><div class="nice-select default-select form-control wide" tabindex="0"><span class="current">ปกติ</span><ul class="list"><li data-value="" class="option">สถานะทั้งหมด</li><li data-value="active" class="option selected">ปกติ</li><li data-value="suspend" class="option">ระงับการใช้งาน</li></ul></div>
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
                                <th>ชื่อ-นามสกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>กลุ่มผู้ใช้</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $rows)


                            <tr>
                                <th>{{ $loop->iteration ?? '' }}</th>
                                <td>{{ $rows->full_name ?? ''}}</td>                                <td class="color-primary">{{ $rows->position->name ?? '-' }}</td>
                                <td class="color-primary">{{ $rows->role->name ?? '-' }}</td>
                                <td>
                                <span class="badge badge-primary light">
                                    {{ $rows->status ?? '' }}
                                  </span>
                                </td>
                                
                                <td class="color-primary">

                                    <button type="button" class="btn btn-warning shadow btn-sm sharp me-1" wire:click="$emit('getUser',1)">
                                        <i class="fa fa-pencil"></i>
                                    </button>

                            </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        <!-- /# card -->




</div>
