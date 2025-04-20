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
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Event Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Venue</th>
                    <th>Banner</th>
                    <th>Host</th>
                    <th>Registration Fee</th>
                    <th>Is Public</th>
                    <th>Is Active</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td> {{ $event->eventType->name }}</td>
                        <td>{{ $event->start_datetime }}</td>
                        <td>{{ $event->end_datetime }}</td>
                        <td>{{ $event->venue }}</td>
                        <td><img src="asset('storage'. $event->banner)" alt="Banner" style="max-width: 100px;"></td>
                        <td>{{ $event->host_user_id }}</td>
                        <td>{{ $event->registration_fee }}</td>
                        <td>{{ $event->is_public ? 'Yes' : 'No' }}</td>
                        <td>{{ $event->is_active ? 'Yes' : 'No' }}</td>
                        <td>{{ $event->updated_at }}</td>
                        <td>
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
