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
                    <a href="{{ route('event-type.index') }}" class="nav-link">
                        <i class="ph ph-calendar"></i> Event Types
                    </a>
                </li>
                @can('CRUD_Permissions')
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link">
                            <i class="ph ph-lock"></i>
                            <span>
                                Permissions
                            </span>
                        </a>
                    </li>
                @endcan
                @can('CRUD_Roles')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="ph ph-shield-check" title="Admin"></i>
                            <span>
                                Roles
                            </span>
                        </a>
                    </li>
                @endcan
                @can('CRUD_Users')
                    <li class="nav-item">
                        <a href="{{ route('user.list') }}" class="nav-link">
                            <i class="ph ph-user" title="User"></i>
                            <span>
                                Users
                            </span>
                        </a>
                    </li>
                @endcan
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
