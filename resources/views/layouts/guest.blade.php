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

    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/notifications/noty.min.js') }}"></script>


    <script src="{{ asset('js/custom/custom.js') }}"></script>

    @stack('styles_stack')
    @stack('custom_scripts')
</head>

<body>
    @yield('content')
    <div class="d-none">
        @if (session('success'))
            <span id="session-message">{{ session('success') }}</span>
            <span id="session-message-type">{{ 'success' }}</span>
        @elseif (session('error'))
            <span id="session-message">{{ session('error') }}</span>
            <span id="session-message-type">{{ 'error' }}</span>
        @endif
    </div>

    @stack('js_after')

</body>

</html>
