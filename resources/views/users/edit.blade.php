@extends('layouts.app')
@section('title', 'User Lists')
@section('content')
    <h2>User Edit</h2>
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">name</label>
            <input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        @foreach ($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="role-{{ $role->id }}"
                    {{ $hasRoles->contains($role->id) ? 'checked' : '' }} value="{{ $role->name }}" name="role[]">
                <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
            </div>
        @endforeach

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
