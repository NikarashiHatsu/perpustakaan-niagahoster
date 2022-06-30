@props([
    'label' => null,
    'field_name' => '',
    'field_value' => '',
    'required' => null,
])
<div class="mb-3">
    <label class="form-label">{{ $label ?? $field_name }}</label>
    <div
        @class(['input-group input-group-flat', 'is-invalid' => $errors->has('password')])
        x-data="{ showPassword: false }"
    >
        <input
            @class(['form-control', 'is-invalid' => $errors->has(str_replace(' ', '_', strtolower($field_name)))])
            {{ $attributes->merge(['required' => $required != null]) }}
            x-bind:type="showPassword ? 'text' : 'password'"
            type="password"
            autocomplete="off"
            name="{{ str_replace(' ', '_', strtolower($field_name)) }}"
            value="{{ $field_value }}"
        />
        <span class="input-group-text">
            <a
                x-on:click="showPassword = !showPassword"
                href="javascript:void(0)"
                class="link-secondary"
                title="Show password"
                data-bs-toggle="tooltip"
                tabindex="-1"
            >
                <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="2"></circle>
                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                </svg>
                <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="3" y1="3" x2="21" y2="21"></line>
                    <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                    <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>
                </svg>
            </a>
        </span>
    </div>

    @error(str_replace(' ', '_', strtolower($field_name)))
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>