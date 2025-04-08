@extends('layouts.app')

@section('title', 'Manage Settings')

@section('content')
    <div class="row">
        <div class="col">
            <h2>All Settings</h2>
        </div>
        <div class="col text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="ph-plus-circle me-2"></i> Add Setting
            </button>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Value</th>
                <th>Data Type</th>
                <th>Last Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allSettings as $setting)
                <tr>
                    <td>{{ $setting->id }}</td>
                    <td>{{ $setting->title }}</td>
                    <td><code>{{ $setting->slug }}</code></td>
                    <td>{{ $setting->value }}</td>
                    <td>{{ ucfirst($setting->data_type) }}</td>
                    <td>{{ $setting->updated_at }}</td>
                    <td>
                        <x-utils.edit-action :route="route('settings.edit', $setting->id)" />
                        <x-utils.delete-action :id="$setting->id" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Add Modal --}}
    @include('settings.create')

    {{-- Delete Modal --}}
    <x-utils.delete-modal title="Delete Settings" url="{{ route('settings.destroy', ':id') }}" />
@endsection
@push('js_after')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                showModal('addModal');
            @endif
        });
    </script>
@endpush
