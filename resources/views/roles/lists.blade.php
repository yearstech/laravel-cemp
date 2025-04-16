@extends('layouts.app')
@section('title', 'Role Lists')
@section('content')
    <h2>Roles Name</h2>
        <form action="{{route('roles.store')}}" method="POST" >
            @csrf
            <div class="form-group mb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            @foreach ($data['permissions'] as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$permission->name}}" name="permissions[]">   
                    <label class="form-check-label" for="permissions">{{$permission->name}}</label>
                </div>
            @endforeach 
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>

    <table class="table datatable-basic">
        <thead>
            <tr style="border: 1px solid black">
                <th>Id</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> 
            <?php $count = 1;?>
            @foreach ($data['roles'] as $role)
                <tr style="border: 1px solid black">
                    <td>{{$count}}</td>
                    <td>{{ucfirst($role->name)}}</td>
                    <td>
                        {{@implode(', ', $role->permissions->pluck('name')->toArray())}}
                        {{-- @foreach ($list->permissions as $permission)
                            <span class="badge badge-primary">{{ucfirst($permission->name)}}</span>
                        @endforeach --}}
                    </td>
                    <td>
                        <x-utils.edit-action :route="route('roles.edit', $role->id)" />
                        <x-utils.delete-action :id="$role->id" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-utils.delete-modal title="Delete Role" url="{{ route('roles.destroy', ':id') }}" />
@endsection