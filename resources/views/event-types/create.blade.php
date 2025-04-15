<h1>Create New Event Type</h1>
<form action="{{ route('event-type.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Create Event</button>
</form>
