@extends('layouts.app')
@section('title', 'Permission Lists')
@section('content')

@section('content')
    <div class="me-auto w-md-50">
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission Name"
                    required>
                <button type="submit" class="ms-2 btn btn-primary">Submit</button>
            </div>
            <br>
        </form>
    </div>
    <h2>Permission Module Name</h2>
    <table class="table">
        <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $list)
                <tr>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->name }}</td>
                    <td>{{ $list->updated_at }}</td>
                    <td>
                        <x-utils.edit-action :route="route('permissions.edit', $list->id)" />
                        <x-utils.delete-action :id="$list->id" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
