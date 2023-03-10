@extends('layouts.admin.app')
@section('title')
   คำนำหน้า
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ft-prompt">
                    <div class="card-header d-block">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6">
                                <h2 class="card-title">คำนำหน้า</h2>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#UpdateOrCreateModal">

                                    <i class="fi fi-rr-plus color-primary"></i>
                                    เพิ่มคำนำหน้า
                                </button>
                            </div>
                        </div>
                    </div>
                    @livewire('admin.setting-user.title.index')
                </div>
            </div>
        </div>
    </div>
@endsection
