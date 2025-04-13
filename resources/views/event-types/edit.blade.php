@extends('layouts.app')  <!-- Extending the base layout -->

@section('content')
<h1>Create New Event Type</h1>

<!-- Form for creating a new event type -->
<form method="POST" action="{{ route('event-types.update',$eventType->id) }}">
    @csrf <!-- CSRF token for security -->
    <!-- Input field for 'name' -->
    @method('PATCH')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection  <!-- End of content section -->
