@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-title">Success!</h4>
        <div class="text-muted">{{ session()->get('success') }}</div>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-title">An error occured!</h4>
        <div class="text-muted">{{ session()->get('error') }}</div>
    </div>
@endif