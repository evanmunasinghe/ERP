<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 no-print">
    <span class="navbar-brand mb-0 h1 text-muted fs-6">Industrial Administration Panel</span>
    <div class="ms-auto">
        <span class="me-3 text-dark fw-semibold"><i class="fa-solid fa-user-shield me-1 text-secondary"></i> {{ auth()->user()->name ?? 'Admin Account' }}</span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>
</nav>
