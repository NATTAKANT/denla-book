@extends('layouts.admin.app')
@section('title')
   รายงานคลังหนังสือ
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ft-prompt">
                    <div class="card-header d-block">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6">
                                <h2 class="card-title">รายงานคลังหนังสือ</h2>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#UpdateOrCreateModal">

                                    <i class="fi-rr-print"></i>
                                    รายงาน
                                </button>
                            </div>
                        </div>
                    </div>
                    @livewire('admin.reports.book.index')
                </div>
            </div>
        </div>
    </div>
@endsection
