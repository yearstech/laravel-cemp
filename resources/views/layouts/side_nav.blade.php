<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center pb-0">
                <div class="sidebar-resize-hide flex-grow-1 text-center my-auto">
                    <img src="{{ asset('images/sidenav_logo.png') }}" height="100" alt="Side Nav Logo">
                    {{-- <h2 class="mt-1">{{ 'YEARS Tech' }}</h2> --}}
                </div>
                <div>
                    <button type="button"
                        class="btn btn-flat-dark btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                        class="btn btn-flat-dark btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->

        <!-- Main navigation -->
        <div class="sidebar-section mt-4">
            <ul class="nav nav-sidebar" id="main-menu" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="ph-house"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('event-types.index') }}" class="nav-link">
                        <i class="ph-gear"></i>
                        <span>
                            Event-types
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings.all') }}" class="nav-link">
                        <i class="ph-gear"></i>
                        <span>
                            Settings
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
