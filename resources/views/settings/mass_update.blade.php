@extends('layouts.app')

@section('title', 'Settings')
@section('content')
    <form action="{{ route('settings.update.all') }}" method="POST">
        @csrf
        @method('PUT')
        @php($slug = 'system_name')
        @isset($allSettings[$slug])
            <div class="row">
                <label class="col-form-label col-md-3 text-end">{{ $allSettings[$slug]['title'] }}</label>
                <div class="col-md-6 form-group mb-3">
                    <input type="text" value="{{ old('settings[' . $slug . ']', $allSettings[$slug]['value']) }}"
                        name="settings[{{ $slug }}]"
                        class="form-control @error('settings[' . $slug . ']') is-invalid @enderror"
                        placeholder="{{ strtolower($allSettings[$slug]['title']) }}">
                    @error('settings[' . $slug . ']')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endisset
        @php($slug = 'organization_name')
        @isset($allSettings[$slug])
            <div class="row">
                <label class="col-form-label col-md-3 text-end">{{ $allSettings[$slug]['title'] }}</label>
                <div class="col-md-6 form-group mb-3">
                    <input type="text" value="{{ old('settings[' . $slug . ']', $allSettings[$slug]['value']) }}"
                        name="settings[{{ $slug }}]"
                        class="form-control @error('settings[' . $slug . ']') is-invalid @enderror"
                        placeholder="{{ strtolower($allSettings[$slug]['title']) }}">
                    @error('settings[' . $slug . ']')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endisset
        <br>
        <div class="text-center form-group">
            <button type="submit" class="btn btn-teal">Update</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
@endsection
