@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Create New Event</h1>
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-utils.form-input name="title" label="Event Title" required placeholder="Event Title" />

        <x-utils.form-select name="event_type_id" label="Event Type" :options="$eventTypes->pluck('name', 'id')" placeholder="Select Event Type"
            required />

        <x-utils.form-input name="start_datetime" label="Start Datetime" required placeholder="Start Datetime" />


        <x-utils.form-input name="end_datetime" label="End Datetime" required placeholder="End Datetime" />

        <x-utils.form-input name="venue" label="Venue" required placeholder="Venue" />


        <x-utils.form-input name="banner" label="Event Banner" type="file" placeholder="Event Banner" />


        <x-utils.form-input name="registration_fee" label="Registration Fee" type="number" required
            placeholder="Registration Fee" />

        <x-utils.form-select name="is_public" label="Is Public" :options="[
            1 => 'Yes',
            0 => 'No',
        ]" placeholder="Select Options" required />


        <x-utils.form-select name="is_active" label="Is Active" :options="[
            1 => 'Yes',
            0 => 'No',
        ]" required placeholder="Select Status" />


        <x-utils.form-input name="details" label="Event Details" type="textarea" rows="4"
            placeholder="Event Details" />


        <button type="submit" class="btn btn-success">Create Event</button>
    </form>
@endsection
