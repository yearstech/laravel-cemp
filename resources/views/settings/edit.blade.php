@extends('layouts.app')

@section('title', 'Edit Settings')

@section('content')
    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <x-utils.form-input label="Title" :value="$setting->title" name="title" placeholder="settings title" />
        <x-utils.form-input label="Slug" :value="$setting->slug" name="slug" placeholder="settings slug" />
        <x-utils.form-input label="Value" :value="$setting->value" name="value" placeholder="settings value" />
        <x-utils.form-select label="Data Type" name="data_type" :selected="$setting->data_type" :options="config('constants.settings_data_types')"
            placeholder="Select a type" />
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
