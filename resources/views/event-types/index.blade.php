<!-- resources/views/event-types/index.blade.php -->

@extends('layouts.app') <!-- Correct syntax for extending a layout -->

@section('content')
    <div class="me-auto w-md-50">
        <form action="{{ route('event-types.store') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Event Name" required>
                <button class="btn btn-primary btn-sm">Create Event</button>


            </div>
            <br>
        </form>

        <!-- Define the content section -->
        <h1>Event Types List</h1>

        <table class="table datatable-basic">
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
