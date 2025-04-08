@extends('layouts.guest')
@section('title', 'Log In')
@push('styles_stack')
    <style>
        body {
            background: url("{{ asset('images/login-bg.png') }}") no-repeat center center fixed;
            background-size: cover;
        }
    </style>
@endpush
@section('content')
    <div class="container-md w-md-50 d-flex justify-content-center align-items-center vh-100">
        <div class="card card-body  mt-5">
            <div class="text-center border-bottom">
                <div class="mb-2">
                    <img src="{{ asset('images/yearstech_logo.png') }}" height="60" alt="Company Logo">
                </div>
                <h3 class="p-0 mb-1">{{ $settings['system_name'] ?? '' }}</h3>
            </div>
            <div class="w-75 w-lg-50 mt-3 m-auto">
                <h2 class="text-center">
                    Login {!! env('APP_ENV') == 'local' ? ':: <span class="text-danger">Test Environment</span>' : '' !!}
                </h2>
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="text-center mt-3 border-top">
                <div class="container-fluid">
                    <span>&copy; {{ date('Y') }}, {{ $settings['organization_name'] ?? '' }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
