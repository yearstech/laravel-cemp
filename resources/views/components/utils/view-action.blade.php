@php
    $text = $text ?? '';
@endphp
<a href="#" class="text-info" onclick="showViewModal({{ $id }})">
    @if ($text)
        {{ $text }}
    @else
        <i class="ph-eye"></i>
    @endif
</a>
