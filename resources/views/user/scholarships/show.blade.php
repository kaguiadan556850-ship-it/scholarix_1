@extends('layouts.app')

@section('title', 'SCHOLARIX | Scholarship Details')
@section('page_title', 'Scholarship Details')

@section('content')
    <section class="panel-card">
        <div class="panel-head">
            <h2>{{ $scholarship->title }}</h2>
            <span class="pill">{{ $scholarship->category }}</span>
        </div>

        <div class="detail-grid">
            <div>
                <h4>Program Description</h4>
                <p>{{ $scholarship->description }}</p>
            </div>
            <div>
                <h4>Requirements</h4>
                <p>{{ $scholarship->requirements ?: 'No additional requirements listed.' }}</p>
            </div>
        </div>

        <div class="meta-list spaced">
            <span>Amount: ${{ number_format($scholarship->amount, 2) }}</span>
            <span>Available Slots: {{ $scholarship->slots }}</span>
            <span>Deadline: {{ $scholarship->deadline->format('M d, Y') }}</span>
            <span>Status: {{ ucfirst($scholarship->status) }}</span>
        </div>

        <div class="inline-actions">
            <a href="{{ route('user.applications.create', $scholarship) }}" class="btn btn-primary">Apply for Scholarship</a>
            <a href="{{ route('user.scholarships.index') }}" class="btn btn-outline">Back</a>
        </div>
    </section>
@endsection
