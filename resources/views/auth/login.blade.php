<x-guest-layout>
    <form class="card card-md" action="{{ route('login') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Log in to your account</h2>
            <x-form-input
                field_name="Email"
            />
            <x-form-input-password
                field_name="Password"
                type="password"
            />
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember" />
                    <span class="form-check-label">Remember Me</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Log In</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        <span>
            Don't have an account?
        </span>
        <a href="{{ route('register') }}" tabindex="-1">
            Register here
        </a>
    </div>
</x-guest-layout>
