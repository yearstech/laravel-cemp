<p>Hello Role Form</p>
<form action="{{route('roles.store')}}" method="POST" >
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    @foreach ($permissions as $permission)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$permission->name}}" name="permissions[]">   
            <label class="form-check-label" for="permissions">{{$permission->name}}</label>
        </div>
    @endforeach    

    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>