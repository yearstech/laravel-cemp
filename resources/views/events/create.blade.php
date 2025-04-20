@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create New Event</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <select name="event_type_id" ...>
                @foreach ($eventTypes as $eventType)
                    <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                @endforeach
            </select>

            <br>

            <div class="mb-3">
                <label for="start_datetime" class="form-label">Start Date & Time</label>
                <input type="datetime-local" class="form-control @error('start_datetime') is-invalid @enderror"
                    id="start_datetime" name="start_datetime" value="{{ old('start_datetime') }}">
                @error('start_datetime')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_datetime" class="form-label">End Date & Time</label>
                <input type="datetime-local" class="form-control @error('end_datetime') is-invalid @enderror"
                    id="end_datetime" name="end_datetime" value="{{ old('end_datetime') }}">
                @error('end_datetime')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue"
                    name="venue" value="{{ old('venue') }}">
                @error('venue')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="banner" class="form-label">Event Banner</label>
                <input type="file" class="form-control @error('banner') is-invalid @enderror" id="banner"
                    name="banner">
                @error('banner')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="registration_fee" class="form-label">Registration Fee</label>
                <input type="number" class="form-control @error('registration_fee') is-invalid @enderror"
                    id="registration_fee" name="registration_fee" value="{{ old('registration_fee') }}">
                @error('registration_fee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_public" class="form-label">Is Public</label>
                <select class="form-select @error('is_public') is-invalid @enderror" id="is_public" name="is_public">
                    <option value="1" {{ old('is_public') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_public') == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('is_public')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="is_active" class="form-label">Is Active</label>
                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                    <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('is_active')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Event Details</label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="4">{{ old('details') }}</textarea>
                @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-success">Create Event</button>
        </form>
    </div>
@endsection
