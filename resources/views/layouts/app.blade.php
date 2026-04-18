<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SCHOLARIX')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/scholarix.css') }}">
</head>
<body>
    <div class="shell">
        @auth
            @include('partials.sidebar')
        @endauth

        <div class="content-area {{ auth()->check() ? '' : 'content-area-full' }}">
            <header class="topbar">
                <div>
                    <span class="badge">SCHOLARIX</span>
                    <h1>@yield('page_title', 'Scholarship Management System')</h1>
                </div>

                <div class="topbar-actions">
                    @auth
                        <span class="welcome">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline">Log Out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Log In</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                    @endauth
                </div>
            </header>

            <main class="page-wrap">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">{{ session('error') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
