@extends('layouts.admin.app')
@section('title')
    หนังสือ
@endsection
@section('content')
    @livewire('admin.books.index')
@endsection
@push('scripts')
    {{-- <script src="{{ asset('asset/admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script> --}}
    <script>
        (function(e, t, n) {
            var r = e.querySelectorAll("html")[0];
            r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
        })(document, window, 0);
    </script>
    <script src="{{ asset('assets/admin/CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins-init/select2-init.js') }}"></script>
    <script src="{{ asset('assets/admin/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/CustomFileInputs/css/demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css') }}" />
@endpush
