<x-guest-layout>
    <form class="card card-md" action="{{ route('register') }}" method="post">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">
                Make a new Account
            </h2>
            <x-form-input
                field_name="Name"
                field_value="{{ old('name') }}"
            />
            <x-form-input
                field_name="Email"
                field_value="{{ old('email') }}"
                type="email"
            />
            <x-form-input-password
                field_name="Password"
                type="password"
            />
            <x-form-input-password
                field_name="Password Confirmation"
                type="password"
            />
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        <span>
            Already have an account?
        </span>
        <a href="{{ route('login') }}" tabindex="-1">
            Log in here
        </a>
    </div>
</x-guest-layout>
