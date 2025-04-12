@extends('layouts.app')
@section('title', 'User Lists')
@section('content')
<div class="row">
    <div class="col-md-7">
        {{-- <a href="{{route('roles.create')}}">Create</a> --}}  

        <br>
        <div class="card">
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

                            <td><a href="{{route("user.edit",$user->id)}}" class="text-warning">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4"> 
    </div>
</div>
@endsection