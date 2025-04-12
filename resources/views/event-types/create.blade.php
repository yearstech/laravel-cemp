@extends('layouts.app')  <!-- Extending the base layout -->

@section('content')
<h1>Create New Event Type</h1>

<!-- Form for creating a new event type -->
<form method="POST" action="{{ route('event-types.store') }}">
    @csrf <!-- CSRF token for security -->
    <!-- Input field for 'name' -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary">Create Event Type</button>
</form>

@endsection  <!-- End of content section -->
