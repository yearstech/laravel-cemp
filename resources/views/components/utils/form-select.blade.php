@php
    $name = $name ?? '';
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $id = $id ?? $name;
    $type = $type ?? 'text';
    $placeholder = $placeholder ?? 'Choose';
    $defaultOptionDisabled = $defaultOptionDisabled ?? true;
    $multiple = $multiple ?? false;
    $inputGroup ??= null;
@endphp
<div class="mb-2">
    <label for="{{ $id }}">{{ $label }}@if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="@if ($inputGroup) input-group @endif">
        @if ($multiple)
            <select name="{{ $name }}" id="{{ $id }}"
                class="form-control multiselect @error($name) is-invalid @enderror" @disabled($disabled)
                @required($required) multiple="multiple" data-include-select-all-option="{{ $selectAll ?? false }}"
                data-enable-filtering="{{ $filter ?? false }}"
                data-enable-case-insensitive-filtering="{{ $filter ?? false }}" data-allow-clear="true"
                data-placeholder="{{ $placeholder }}">
                @foreach ($options as $key => $value)
                    <option value="{{ $key }}"
                        {{ in_array($key, old($name, normalizeToArray($selected ?? []))) ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        @else
            <select name="{{ $name }}" id="{{ $id }}" data-minimum-results-for-search="Infinity"
                class="form-control select2 @error($name) is-invalid @enderror" @disabled($disabled)
                @required($required)>
                <option value="" selected @if ($defaultOptionDisabled) disabled @endif>{{ $placeholder }}
                </option>
                @foreach ($options as $key => $value)
                    <option value="{{ $key }}" {{ old($name, $selected ?? '') == $key ? 'selected' : '' }}>
                        {{ ucfirst($value) }}
                    </option>
                @endforeach
            </select>
        @endif

        @if ($inputGroup ?? false)
            {{ $inputGroup }}
        @endif
    </div>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>
