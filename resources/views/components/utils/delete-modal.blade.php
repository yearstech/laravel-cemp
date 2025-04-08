<x-utils.modal id="deleteModal" title="{{ $title ?? 'Delete' }}" color="danger">
    <x-slot:body>
        <div class="text-center">
            <p class="fs-3">Are You Sure?</p>
            <p>All the information along with this, will be removed.</p>
        </div>
    </x-slot:body>
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form id="delete-Form" action="" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes</button>
        </form>
    </x-slot:footer>
</x-utils.modal>

@push('js_after')
    <script>
        function showDeleteModal(id) {
            const form = document.getElementById('delete-Form');
            form.action = "{{ $url }}".replace(':id', id);
            showModal('deleteModal');
        }
    </script>
@endpush
