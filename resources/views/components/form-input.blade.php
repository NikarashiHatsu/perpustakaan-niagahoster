@props([
    'field_name' => '',
    'field_value' => '',
    'type' => 'text',
    'data_mask' => null,
])
<div class="mb-3">
    <label class="form-label">{{ $field_name }}</label>
    <input
        @class(['form-control', 'is-invalid' => $errors->has($field_name)])
        {{ $attributes->merge(['data-mask' => $data_mask != null]) }}
        type="{{ $type }}"
        class="form-control"
        name="{{ strtolower($field_name) }}"
        value="{{ $field_value }}"
        required
    />
    @error($field_name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>