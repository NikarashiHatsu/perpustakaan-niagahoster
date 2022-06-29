<x-guest-layout>
    <form class="card card-md" action="{{ route('register') }}" method="post">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">
                Buat Akun Baru
            </h2>
            <div class="mb-3">
                <label class="form-label">Nama Anda</label>
                <input
                    @class(['form-control', 'is-invalid' => $errors->has('name')])
                    type="text"
                    placeholder="Masukkan Nama"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <input
                    @class(['form-control', 'is-invalid' => $errors->has('email')])
                    type="email"
                    class="form-control"
                    placeholder="Masukkan Email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Kata Sandi
                </label>
                <div
                    @class(['input-group input-group-flat', 'is-invalid' => $errors->has('password')])
                    x-data="{ showPassword: false }"
                >
                    <input
                        @class(['form-control', 'is-invalid' => $errors->has('password')])
                        x-bind:type="showPassword ? 'text' : 'password'"
                        type="password"
                        placeholder="Masukkan kata sandi"
                        autocomplete="off"
                        name="password"
                        required
                    />
                    <span class="input-group-text">
                        <a
                            x-on:click="showPassword = !showPassword"
                            href="javascript:void(0)"
                            class="link-secondary"
                            title="Tunjukkan kata sandi"
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
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Konfirmasi Kata Sandi
                </label>
                <div
                    x-data="{ showPassword: false }"
                    class="input-group input-group-flat"
                >
                    <input
                        class="form-control"
                        x-bind:type="showPassword ? 'text' : 'password'"
                        type="password"
                        autocomplete="off"
                        placeholder="Masukkan kata sandi yang sama"
                        name="password_confirmation"
                        required
                    />
                    <span class="input-group-text">
                        <a
                            x-on:click="showPassword = !showPassword"
                            href="javascript:void(0)"
                            title="Tunjukkan kata sandi"
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
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Buat akun baru</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        <span>
            Sudah memiliki akun?
        </span>
        <a href="{{ route('login') }}" tabindex="-1">
            Masuk disini
        </a>
    </div>
</x-guest-layout>
