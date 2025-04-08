<x-utils.modal id="addModal" title="Add Settings" color="success">
    <x-slot:body>
        <form action="{{ route('settings.store') }}" method="POST" class="w-md-75 m-auto">
            @csrf
            <x-utils.form-input label="Title" name="title" placeholder="settings title" />
            <x-utils.form-input label="Slug" name="slug" placeholder="settings slug" />
            <x-utils.form-input label="Value" name="value" placeholder="settings value" />
            <x-utils.form-select label="Data Type" name="data_type" :options="config('constants.settings_data_types')" placeholder="Select a type" />

            <div class="text-center mb-2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </x-slot:body>
</x-utils.modal>
