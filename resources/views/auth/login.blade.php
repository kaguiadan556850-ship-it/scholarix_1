@extends('layouts.app')

@section('title', 'SCHOLARIX | Log In')
@section('page_title', 'Log In')

@section('content')
    <div class="auth-shell">
        <div class="auth-card auth-visual">
            <img src="{{ asset('assets/logo.png') }}" alt="SCHOLARIX logo" class="auth-logo">
            <span class="section-tag">Welcome back</span>
            <h2>SCHOLARIX portal access</h2>
            <p>Use your account to enter the admin dashboard or student dashboard.</p>
        </div>

        <form method="POST" action="{{ route('login.store') }}" class="auth-card auth-form">
            @csrf
            <h2>Log In</h2>

            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>

            <label class="check-inline">
                <input type="checkbox" name="remember" value="1"> Remember me
            </label>

            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <p class="helper-text">No account yet? <a href="{{ route('register') }}">Create one</a></p>
            <p class="helper-text muted">Demo admin: admin@scholarix.test / password123</p>
        </form>
    </div>
@endsection
