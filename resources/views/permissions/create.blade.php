<p>Permission Name</p>
<form action="{{route('permissions.store')}}" method="POST" >
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>