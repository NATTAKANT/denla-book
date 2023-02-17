<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    {{-- <img src="{{ Storage::disk('public')->exists(auth()->user()->photo) ? Storage::disk('public')->url(auth()->user()->photo) : 'http://cdn.onlinewebfonts.com/svg/img_546302.png' }}"
                        alt="profile" /> --}}

                    <div class="header-info ms-3">
                       {{-- <span class="font-w600 "><b>{{ auth()->user()->fullname }} </b></span> --}}
                        {{-- <small class="text-end font-w400">{{ auth()->user()->email }}</small> --}}

                        <span class="font-w600 "><b>{{ Auth::user()->name }}</b></span>
                        <small class="text-end font-w400">{{ Auth::user()->email }}</small>

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('profile.show') }}" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">ข้อมูลส่วนตัว</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" >
                        @csrf


                        <button type="submit"

                        class="dropdown-item ai-icon" >
                        {{-- <a href="{{ route('logout') }}" class="dropdown-item ai-icon"> --}}


                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="ms-2">ล็อคเอ้า </span>


                    {{-- </a> --}}

                </button>

                </form>
                </div>
            </li>

            @include('layouts.admin.menu')

        </ul>
    </div>
</div>
