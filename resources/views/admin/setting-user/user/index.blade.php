@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ft-prompt">
                    <div class="card-header d-block">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6">
                                <h2 class="card-title">ผู้ใช้งาน</h2>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">
                                    
                                        <i class="fi fi-rr-plus color-primary"></i>
                                  เพิ่มผู้ใช้งาน
                                </button>
                            </div>
                        </div>
                    </div>
                 @livewire('admin.setting-user.user.index')
                </div>
            </div>
        </div>
    </div>


    <!-- โมดอลเพิ่มผู้ใช้งาน -->
    @livewire('admin.setting-user.user.update-or-create')

    <!-- โมดอลแก้ไขผู้ใช้งาน -->


@endsection

