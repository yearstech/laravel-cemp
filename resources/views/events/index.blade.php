@extends('layouts.app')

@section('title', 'Event Information')

@section('content')
    <div class="row">
        <div class="col">
            <h2>All Events</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('events.create') }}" class="btn btn-success"><i class="ph-plus-circle me-2"></i> Add Event</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Event Type</th>
                <th>Start Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->eventType->name }}</td>
                    <td>{{ $event->start_datetime }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">Show</a>
                        <x-utils.edit-action :route="route('events.edit', $event->id)" />
                        <x-utils.delete-action :id="$event->id" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
    {{-- Delete Modal --}}
    <x-utils.delete-modal title="Delete Event" url="{{ route('events.destroy', ':id') }}" />
@endsection
