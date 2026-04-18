<aside class="sidebar">
    <div class="brand">
        <img src="{{ asset('assets/logo.png') }}" alt="SCHOLARIX logo">
        <div>
            <strong>SCHOLARIX</strong>
            <span>Scholarship Management</span>
        </div>
    </div>

    <nav class="nav-links">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Admin Dashboard</a>
            <a href="{{ route('admin.scholarships.index') }}" class="{{ request()->routeIs('admin.scholarships.*') ? 'active' : '' }}">Scholarships</a>
        @else
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">User Dashboard</a>
            <a href="{{ route('user.scholarships.index') }}" class="{{ request()->routeIs('user.scholarships.*', 'user.applications.*') ? 'active' : '' }}">Browse Scholarships</a>
        @endif
    </nav>

    <div class="sidebar-card">
        <h3>Starter Build</h3>
        <p>Laravel Blade starter with admin CRUD, application uploads, and a SCHOLARIX blue theme.</p>
    </div>
</aside>
