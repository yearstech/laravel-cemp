@extends('layouts.app')
@section('title', 'Permission Lists')
@section('content')

@section('content')
<div class="row">
    <div class="col-md-7">
        {{-- <a class="text-success" href="{{route('permissions.create')}}">Create</a> --}}

        <br>
        <div class="card">
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;?>
                    @foreach ($permissions as $list)
                        <tr style="border: 1px solid black">
                            <td>{{$count}}</td>
                            <td>{{ucfirst($list->name)}}</td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4"> 
        <h2>Permission Module Name</h2>
        <form action="{{route('permissions.store')}}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection