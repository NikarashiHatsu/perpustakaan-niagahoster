@props([
    'label' => null,
    'field_name' => '',
    'field_value' => '',
    'type' => 'text',
    'data_mask' => null,
    'required' => null,
])
<div class="mb-3">
    <label class="form-label">{{ $label ?? $field_name }}</label>
    <input
        @class(['form-control', 'is-invalid' => $errors->has(str_replace(' ', '_', strtolower($field_name)))])
        {{ $attributes->merge([
            'data-mask' => $data_mask != null,
            'required' => $required != null
        ]) }}
        type="{{ $type }}"
        name="{{ str_replace(' ', '_', strtolower($field_name)) }}"
        value="{{ $field_value }}"
    />

    @if ($type === "file" && $field_value !== "")
        <img
            @class(['border mt-3', 'is-invalid' => $errors->has(str_replace(' ', '_', strtolower($field_name)))])
            src="{{ asset($field_value) }}"
            height="150"
            alt=""
        >
    @endif

    @error(str_replace(' ', '_', strtolower($field_name)))
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>