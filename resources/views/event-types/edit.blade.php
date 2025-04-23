@extends('layouts.app') <!-- Extending the base layout -->

@section('content')
    <h1>Create New Event Type</h1>

    <!-- Form for creating a new event type -->
    <form method="POST" action="{{ route('event-type.update', $eventType->id) }}">
        @csrf
        @method('PATCH')
        <x-utils.form-input name="name" :value="$eventType->name" label="name" required placeholder="Name" />
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
