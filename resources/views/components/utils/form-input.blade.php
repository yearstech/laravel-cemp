@php
    $name = $name ?? '';
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $id = $id ?? $name;
    $type = $type ?? 'text';
@endphp

<div class="mb-2">
    <label for="{{ $id }}">{{ $label }}@if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input step="any" type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        value="{{ old($name, $value ?? '') }}" placeholder="{{ $placeholder ?? '' }}"
        class="form-control @error($name) is-invalid @enderror" @disabled($disabled) @required($required)>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
