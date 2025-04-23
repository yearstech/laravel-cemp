@php
    $name = $name ?? '';
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $id = $id ?? $name;
@endphp

<div class="mb-3">
    <label for="{{ $id }}">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <textarea name="{{ $name }}" id="{{ $id }}" rows="6" placeholder="{{ $placeholder ?? '' }}"
        class="form-control @error($name) is-invalid @enderror" @disabled($disabled) @required($required)>{{ old($name, $value ?? '') }}
    </textarea>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
