@extends('layouts.app')
@section('title', 'User Lists')
@section('content')
    <h2>Add User</h2>
        <form action="{{route('register')}}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Password <span class="text-danger">(Min:6 Character)</span></label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
            </div>
            
            @foreach ($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$role->name}}" name="roles[]">   
                    <label class="form-check-label" for="roles">{{$role->name}}</label>
                </div>
            @endforeach 
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    <table class="table datatable-basic">
        <thead>
            <tr style="border: 1px solid black">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1;?>
            @foreach ($users as $user)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{ucfirst($user->name)}}</td>
                    <td>{{ucfirst($user->email)}}</td>
                    <td>{{$user->roles->pluck('name')->implode(', ')}}</td>
                    <td>
                        <x-utils.edit-action :route="route('user.edit', $user->id)" />
                        <x-utils.delete-action :id="$user->id" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <x-utils.delete-modal title="Delete Role" url="{{ route('user.destroy', ':id') }}" />
@endsection