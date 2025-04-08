<!-- Main navbar -->
<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand flex-1 d-none d-lg-block flex-lg-0">

        </div>
        <ul class="nav flex-row">
            <li class="nav-item ms-lg-2 mr-auto d-none d-lg-block">
                <a href="{{ url('/') }}" class="d-inline-flex text-white align-items-center">
                    <h3 class="my-0 lh-1">{{ env('APP_NAME') }}</h3>
                </a>
            </li>
            <li class="nav-item ms-lg-2 mr-auto d-lg-none">
                <a href="{{ url('/') }}" class="d-inline-flex text-white align-items-center">
                    <h3 class="my-0 lh-1">{{ env('SETTINGS_APP_SHORTNAME') }}</h3>
                </a>
            </li>
        </ul>

        <ul class="nav flex-row justify-content-end order-1 order-lg-2">
            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="{{ asset('images/default_pic.jpg') }}" class="w-32px h-32px rounded-pill"
                            alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <p class="text-center fw-bold">{{ Auth::user()->email }}</p>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('user.profile') }}" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        My profile
                    </a>
                    <a href="{{ route('user.profile') }}#change-password" class="dropdown-item">
                        <i class="ph-lock-key-open me-2"></i>
                        Change Password
                    </a>
                    <a href="{{ url('/logout') }}" class="dropdown-item">
                        <i class="ph-sign-out me-2"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
