@extends('layouts.app')

@section('title', 'SCHOLARIX | Sign Up')
@section('page_title', 'Create Account')

@section('content')
    <div class="auth-shell auth-shell-wide">
        <form method="POST" action="{{ route('register.store') }}" class="auth-card auth-form">
            @csrf
            <h2>User Sign Up</h2>

            <div class="grid two-col">
                <div>
                    <label>First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Juan" required>
                </div>
                <div>
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Dela Cruz" required>
                </div>
            </div>

            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="student@example.com" required>

            <div class="grid two-col">
                <div>
                    <label>Student ID</label>
                    <input type="text" name="student_id" value="{{ old('student_id') }}" placeholder="2026-001" required>
                </div>
                <div>
                    <label>Program / Course</label>
                    <input type="text" name="program" value="{{ old('program') }}" placeholder="BS Information Technology" required>
                </div>
            </div>

            <div class="grid two-col">
                <div>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Create password" required>
                </div>
                <div>
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Register Account</button>
        </form>

        <div class="auth-card auth-visual">
            <img src="{{ asset('assets/logo.png') }}" alt="SCHOLARIX logo" class="auth-logo">
            <span class="section-tag">Student friendly</span>
            <h2>Simple onboarding for scholarship applicants</h2>
            <p>New students can create an account, browse open programs, and manage their applications in one place.</p>
        </div>
    </div>
@endsection
