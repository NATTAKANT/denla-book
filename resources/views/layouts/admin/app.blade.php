<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ \App\Models\Setting::where('slug', 'site_name')->first()->value }}</title> --}}
    {{-- <link rel="icon" type="image/x-icon"
        href="{{ Storage::disk('public')->url(\App\Models\Setting::where('slug', 'icon')->first()->value) }}"> --}}
    @livewireStyles
    
    @include('layouts.admin.head')
    @stack('css')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">L</span>
            <span style="--i:2">o</span>
            <span style="--i:3">a</span>
            <span style="--i:4">d</span>
            <span style="--i:5">i</span>
            <span style="--i:6">n</span>
            <span style="--i:7">g</span>
            <span style="--i:8">.</span>
            <span style="--i:9">.</span>
            <span style="--i:10">.</span>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="ft-prompt">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            {{-- <a href="{{ route('admin-home') }}" class="brand-logo justify-content-center">
                <img src="{{ asset('assets/admin/images/sut-logo.png') }}" alt="logo" width="50">
            </a> --}}
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
                Header start
            ***********************************-->
        @include('layouts.admin.nav')
        <!--**********************************
                    Header end ti-comment-alt
                ***********************************-->



        <!--**********************************
                Sidebar start
            ***********************************-->
        @include('layouts.admin.sidebar')
        <!--**********************************
                    Sidebar end
            ***********************************-->




        <!--**********************************
                Content body start
            ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
                    Content body end
                ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('layouts.admin.footer')
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->



    @livewireScripts
    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                dezSettingsOptions.version = 'dark';
                new dezSettings(dezSettingsOptions);
            }, 500)
        });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <x-livewire-alert::scripts /> --}}
    @include('layouts.admin.script')
    @yield('script')
    @stack('scripts')
</body>

</html>
