@extends('layouts.app')
@section('title', 'Role Lists')
@section('content')
<p>Edit Role</p>
<form action="{{route('roles.update',$role->id)}}" method="POST" >
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
    </div>
    @foreach ($permissions as $permission)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" {{in_array($permission->name, $rolePermissions) ? "checked" : ""}} value="{{$permission->name}}" name="permissions[]">   
            <label class="form-check-label" for="permissions">{{$permission->name}}</label>
        </div>
    @endforeach    

    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection