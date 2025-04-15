@extends('layouts.app')
@section('title', 'Event Types')

@section('content')
    <div class="me-auto">
        <form action="{{ route('event-type.store') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <input type="text" class="form-control w-75" id="name" name="name" placeholder="Enter Event Name"
                    required>
                <button class="wi-100 btn btn-primary">Create Event</button>
            </div>
        </form>
    </div>

    <!-- Define the content section -->
    <h1>Event Types List</h1>

    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventTypes as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->updated_at }}</td>
                    <td>
                        <x-utils.edit-action :route="route('event-type.edit', $type->id)" />
                        <x-utils.delete-action :id="$type->id" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Delete Modal --}}
    <x-utils.delete-modal title="Delete Type" url="{{ route('event-type.destroy', ':id') }}" />
@endsection
