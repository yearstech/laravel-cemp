@extends('layouts.guest')
@section('content')
    <div class="d-flex bg-white justify-content-center align-items-center vh-100">

        <div class="p-5 rounded text-center">
            <h1><i class="ph-warning ph-3x"></i></h1>
            <h1>Page not found!</h1>
            <p><a class="text-info text-decoration-underline" href="{{ url('/') }}">Back to home</a></p>
        </div>

    </div>
@endsection
