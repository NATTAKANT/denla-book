<div class="col-lg-12">
    <div class="card">
        {{-- <div class="card-header">
            <h4 class="card-title">Recent Payments Queue</h4>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th style="width:80px;"><strong>#</strong></th>
                            <th><strong>ชื่อเรื่อง</strong></th>
                            <th><strong>เลขเรียกหนังสือ</strong></th>
                            <th><strong>ISBN</strong></th>
                            <th><strong>ISSN</strong></th>
                            <th><strong>DOI</strong></th>
                            <th><strong>การเผยแพร่</strong></th>
                            <th><strong>การยืม</strong></th>
                            <th><strong>จำนวนการยืม</strong></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td><strong>{{ $loop->iteration }}</strong></td>
                                <td> {{ $book->title }}
                                    @if ($book->title_another)
                                        , {{ $book->title_another }}
                                    @endif
                                </td>
                                <td> {{ $book->call_number }} </td>
                                <td> {{ $book->ISBN }} </td>
                                <td> {{ $book->ISSN }} </td>
                                <td> {{ $book->DOI }} </td>
                                <td>
                                    @switch($book->status)
                                        @case('active')
                                            <br>
                                            <i class="fa fa-eye   text-success"></i>
                                            เผยแพร่
                                        @break

                                        @case('inactive')
                                            <br>
                                            <i class="fa fa-eye-slash  text-danger"></i>
                                            ไม่เผยแพร่
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td> ... </td>
                                <td> ... </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp"
                                            data-bs-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <circle fill="#000000" cx="5" cy="12"
                                                        r="2" />
                                                    <circle fill="#000000" cx="12" cy="12"
                                                        r="2" />
                                                    <circle fill="#000000" cx="19" cy="12"
                                                        r="2" />
                                                </g>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">ดูรายละเอียด</a>
                                            <button class="dropdown-item" wire:click="edit({{ $book->id }})"
                                                data-bs-toggle="modal" data-bs-target="#FormModal">แก้ไข</button>
                                            <a class="dropdown-item" href="#">ลบ</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
