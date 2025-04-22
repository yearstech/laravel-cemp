<x-utils.modal id="create-event-type" title="Create Event Type" color="primary">
    <x-slot:body>
        <form action="{{ route('event-type.store') }}" method="POST">
            @csrf
            <x-utils.form-input name="name" label="Name" required placeholder="event type name" />
            <div class="text-center m-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </x-slot>
</x-utils.modal>
