@extends('layouts.app')
@section('title', 'Event Types')

@section('content')
    <div class="text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-event-type">Create Event</button>
    </div>

    <!-- Define the content section -->

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

    {{-- Create Modal --}}
    @include('event-types.create')
@endsection
