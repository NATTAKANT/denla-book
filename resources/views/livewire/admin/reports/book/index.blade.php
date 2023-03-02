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
                <input wire:model="search" class="form-control" type="text" placeholder="ค้นหาชื่อหนังสือ">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อ</th>
                        <th>สถานะ</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($book as $key => $rows)


                    <tr>
                        <th>{{ $loop->iteration ?? '-' }}</th>
                        <td class="color-primary">{{ $rows->title ?? '-' }}</td>
                        <td>
                        <span class="badge badge-primary light">
                            {{ $rows->status ?? '-' }}
                          </span>
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

            <div>
                <h5>
            {{ $book->links() }}
                </h5>
            </div>

        </div>
    </div>

<!-- /# card -->


</div>
