<!-- resources/views/event-types/index.blade.php -->

@extends('layouts.app')  <!-- Correct syntax for extending a layout -->

@section('content')  <!-- Define the content section -->
    <h1>Event Types List</h1>
    <a href="{{ route('event-types.create') }}" class="btn btn-primary">Create New Event Type</a>

    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventTypes as $eventType)
                <tr>
                    <td>{{ $eventType->id }}</td>
                    <td>{{ $eventType->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection  <!-- End the content section -->
