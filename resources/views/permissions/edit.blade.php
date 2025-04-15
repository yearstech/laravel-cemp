@extends('layouts.app')
@section('title', 'Permissions')
@section('content')

    <h2>Permission Name Edit</h2>
    <form action="{{route('permissions.update',$permission->id)}}" method="POST" >
        @csrf
        @method('Patch')
        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
    </form>

@endsection