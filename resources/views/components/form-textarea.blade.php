@props([
    'label' => null,
    'field_name' => '',
    'field_value' => '',
])
<div class="mb-3">
    <label class="form-label">{{ $label ?? $field_name }}</label>
    <textarea
        @class(['form-control', 'is-invalid' => $errors->has($field_name)])
        name="{{ strtolower($field_name) }}"
        cols="30"
        rows="5"
        required
    >{{ $field_value }}</textarea>
    @error($field_name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>