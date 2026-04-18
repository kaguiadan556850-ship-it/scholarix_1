@extends('layouts.app')

@section('title', 'SCHOLARIX | Home')
@section('page_title', 'Scholarship Management System')

@section('content')
    <section class="hero-grid">
        <div class="hero-card">
            <span class="section-tag">Laravel Blade Starter</span>
            <h2>Beautiful, simple, and ready for your SCHOLARIX project.</h2>
            <p>
                Manage scholarship programs, review applications, and let students track their submissions
                in one clean blue-themed system.
            </p>
            <div class="button-row">
                <a href="{{ route('login') }}" class="btn btn-primary">Log In</a>
                <a href="{{ route('register') }}" class="btn btn-outline">Create Account</a>
            </div>
        </div>

        <div class="hero-side">
            <div class="metric-card"><span>Active Scholarships</span><strong>24</strong></div>
            <div class="metric-card"><span>Pending Applications</span><strong>118</strong></div>
            <div class="metric-card"><span>Approval Rate</span><strong>81%</strong></div>
        </div>
    </section>

    <section class="info-grid three-col">
        <article class="panel-card">
            <h3>Admin Control</h3>
            <p>Create scholarship programs, review applicants, and update approval status.</p>
        </article>
        <article class="panel-card">
            <h3>User Portal</h3>
            <p>Students can register, browse open scholarships, and submit applications.</p>
        </article>
        <article class="panel-card">
            <h3>Laravel Friendly</h3>
            <p>Organized into routes, controllers, middleware, migrations, models, and Blade views.</p>
        </article>
    </section>
@endsection
