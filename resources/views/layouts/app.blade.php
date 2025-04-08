<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome') | {{ config('app.name') }}</title>
    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/phosphor/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/selects/select2.min.js') }}"></script>
    <script src="{{ asset('js/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('js/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset('js/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('js/notifications/noty.min.js') }}"></script>
    <script src="{{ asset('js/pickers/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/charts/echarts.js') }}"></script>
    <script src="{{ asset('js/custom/config.js') }}"></script>
    <script src="{{ asset('js/custom/custom.js') }}"></script>

    @stack('styles_stack')
    @stack('custom_scripts')

</head>

<body>
    {{-- Top Navbar --}}
    @include('layouts.top_nav')

    <!-- Page content -->
    <div class="page-content">
        {{-- Main sidebar --}}
        @include('layouts.side_nav')

        {{-- Main content --}}
        <div class="content-wrapper">
            <div class="content-inner">
                {{-- Page header --}}
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-md-inline">
                        <div class="page-title d-flex">
                            <h4><span class="font-weight-semibold">@yield('title', 'Welcome')</span></h4>
                            <a href="#" class="header-elements-toggle text-default d-md-none">
                                <i class="icon-more"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- /page header --}}

                {{-- Content area --}}
                <div class="content">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
                {{-- /content area --}}

                {{-- Footer --}}
                <div class="navbar navbar-sm navbar-footer border-top">
                    <div class="container-fluid">
                        <span>&copy; {{ date('Y') . ', ' . env('SETTINGS_APP_CREDIT') }}</span>
                    </div>
                </div>
                {{-- /footer --}}

            </div>
        </div>
        {{-- /main content --}}

    </div>
    {{-- /page content --}}

    {{-- Session messages --}}
    <div class="d-none">
        @if (session('success'))
            <span id="session-message">{{ session('success') }}</span>
            <span id="session-message-type">{{ 'success' }}</span>
        @elseif (session('error'))
            <span id="session-message">{{ session('error') }}</span>
            <span id="session-message-type">{{ 'error' }}</span>
        @endif
    </div>
    {{-- /Session messages --}}
    <script>
        window.addEventListener('load', function() {
            hideOverlay('body');
        });
    </script>
    @stack('js_after')
    <div class="card-overlay"><span class="spinner-border"></span></div>
</body>

</html>
