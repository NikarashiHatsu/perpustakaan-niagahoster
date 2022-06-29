<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
    <span class="navbar-toggler-icon"></span>
</button>
<h1 class="navbar-brand navbar-brand-autodark">
    <a href="{{ route('dashboard.index') }}">
        <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
    </a>
</h1>
<div class="navbar-nav flex-row d-lg-none">
    <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
            <div class="d-none d-xl-block ps-2">
                <div>{{ auth()->user()->name }}</div>
                <div class="mt-1 small text-muted">User</div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <form action="{{ route('logout') }}" method="post" x-ref="form">
                @csrf
                <a href="javascript:void(0)" x-on:click="console.log($refs.form.submit())" class="dropdown-item">Logout</a>
            </form>
        </div>
    </div>
</div>