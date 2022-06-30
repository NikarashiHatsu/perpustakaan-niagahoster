@props([
    'label' => null,
    'field_name' => '',
    'field_value' => '',
    'type' => 'text',
    'data_mask' => null,
])
<div class="mb-3">
    <label class="form-label">{{ $label ?? $field_name }}</label>
    <select
        @class(['form-select', 'is-invalid' => $errors->has(str_replace(' ', '_', strtolower($field_name)))])
        name="{{ str_replace(' ', '_', strtolower($field_name)) }}"
        id=""
        required
    >
        {{ $slot }}
    </select>
    @error(str_replace(' ', '_', strtolower($field_name)))
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>