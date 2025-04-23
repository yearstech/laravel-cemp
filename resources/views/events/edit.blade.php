@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Event</h1>

    <!-- Error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <x-utils.form-input name="title" label="Event Title" :value="$event->title" required placeholder="Event Title" />

        <x-utils.form-select name="event_type_id" :selected="$event->event_type_id" label="Event Type" :options="$eventTypes->pluck('name', 'id')"
            placeholder="Select Event Type" required />

        <x-utils.form-input name="start_datetime" :value="$event->start_datetime" label="Start Datetime" required
            placeholder="Start Datetime" />

        <x-utils.form-input name="end_datetime" :value="$event->end_datetime" label="End Datetime" required
            placeholder="End Datetime" />

        <x-utils.form-input name="venue" :value="$event->venue" label="Venue" required placeholder="Venue" />

        <x-utils.form-input name="banner" :value="$event->banner" label="Event Banner" type="file"
            placeholder="Event Banner" />

        <x-utils.form-input name="registration_fee" :value="$event->registration_fee" label="Registration Fee" type="number" required
            placeholder="Registration Fee" />

        <x-utils.form-select name="is_public" :selected="$event->is_public" label="Is Public" :options="[
            1 => 'Yes',
            0 => 'No',
        ]"
            placeholder="Select Options" required />

        <x-utils.form-select name="is_active" :selected="$event->is_active" label="Is Active" :options="[
            1 => 'Yes',
            0 => 'No',
        ]" required
            placeholder="Select Status" />

        <x-utils.form-textarea name="details" :value="$event->details" label="Event Details" type="textarea" rows="4"
            placeholder="Event Details" />

        <button type="submit" class="btn btn-success">Update Event</button>
    </form>
@endsection
