@extends('layouts.admin.app')
@section('title')
เจ้าหน้าที่
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ft-prompt">
                    <div class="card-header d-block">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6">
                                <h2 class="card-title">เจ้าหน้าที่</h2>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">

                                        <i class="fi fi-rr-plus color-primary"></i>
                                  เพิ่มเจ้าหน้าที่
                                </button>
                            </div>
                        </div>
                    </div>
                 @livewire('admin.setting-user.user.index')
                </div>
            </div>
        </div>
    </div>


@endsection

