@extends('layouts.app')
@section('title', 'Role Lists')
@section('content')

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
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;?>
                    @foreach ($data['roles'] as $list)
                        <tr style="border: 1px solid black">
                            <td>{{$count}}</td>
                            <td>{{ucfirst($list->name)}}</td>
                            <td>
                                {{@implode(', ', $list->permissions->pluck('name')->toArray())}}
                                {{-- @foreach ($list->permissions as $permission)
                                    <span class="badge badge-primary">{{ucfirst($permission->name)}}</span>
                                @endforeach --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4"> 
        <h2>Role Module Name</h2>
        <form action="{{route('roles.store')}}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            @foreach ($data['permissions'] as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$permission->name}}" name="permissions[]">   
                    <label class="form-check-label" for="permissions">{{$permission->name}}</label>
                </div>
            @endforeach    

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection