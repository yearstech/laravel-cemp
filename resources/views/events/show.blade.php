<x-utils.modal id="viewModal" title="Event Details" color="info">
    <x-slot:body>
        <div>
            <h1>{{ $event->title }}</h1>
            <ul class="list-group">
                <li class="list-group-item"><strong>Type:</strong> {{ $event->eventType->name }}</li>
                <li class="list-group-item"><strong>Start Date:</strong> {{ $event->start_datetime }}</li>
                <li class="list-group-item"><strong>End Date:</strong> {{ $event->end_datetime }}</li>
                <li class="list-group-item"><strong>Venue:</strong> {{ $event->venue }}</li>
                <li class="list-group-item"><strong>Host:</strong> {{ $event->host_user_id }}</li>
                <li class="list-group-item"><strong>Fee:</strong> {{ $event->registration_fee }}</li>
                <li class="list-group-item"><strong>Public:</strong> {{ $event->is_public ? 'Yes' : 'No' }}</li>
                <li class="list-group-item"><strong>Active:</strong> {{ $event->is_active ? 'Yes' : 'No' }}</li>
                <li class="list-group-item"><strong>Details:</strong> {{ $event->details }}</li>
                <li class="list-group-item">
                    <strong>Banner:</strong><br>
                    {{-- <img src="{{ asset('storage/' . $event->banner) }}" alt="Banner" style="max-width: 300px;"> --}}
                </li>
            </ul>
        </div>
    </x-slot:body>
</x-utils.modal>
