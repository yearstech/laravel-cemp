<!-- resources/views/event-types/index.blade.php -->

@extends('layouts.app') <!-- Correct syntax for extending a layout -->

@section('content')
    <!-- Define the content section -->
    <h1>Event Types List</h1>
    <a href="{{ route('event-types.create') }}" class="btn btn-primary">Create New Event Type</a>

    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventTypes as $eventType)
                <tr>
                    <td>{{ $eventType->id }}</td>
                    <td>{{ $eventType->name }}</td>
                    <td>
                        <a href="{{ route('event_types.edit', $eventType->id) }}" class="btn btn-secondary">Edit</a>


                    </td>
                    <td>
                        <form action="{{ route('event-type.destroy', $eventType->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this event type?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection <!-- End the content section -->
