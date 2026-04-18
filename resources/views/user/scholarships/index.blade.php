@extends('layouts.app')

@section('title', 'SCHOLARIX | Browse Scholarships')
@section('page_title', 'Browse Scholarships')

@section('content')
    <section class="card-grid three-col">
        @forelse ($scholarships as $scholarship)
            <article class="panel-card scholarship-card">
                <div class="panel-head">
                    <h3>{{ $scholarship->title }}</h3>
                    <span class="pill">{{ $scholarship->category }}</span>
                </div>
                <p>{{ \Illuminate\Support\Str::limit($scholarship->description, 130) }}</p>
                <div class="meta-list">
                    <span>Amount: ${{ number_format($scholarship->amount, 2) }}</span>
                    <span>Slots: {{ $scholarship->slots }}</span>
                    <span>Deadline: {{ $scholarship->deadline->format('M d, Y') }}</span>
                </div>
                <a href="{{ route('user.scholarships.show', $scholarship) }}" class="btn btn-primary">View Scholarship</a>
            </article>
        @empty
            <div class="panel-card"><p>No scholarships available right now.</p></div>
        @endforelse
    </section>

    <div class="pagination-note">{{ $scholarships->links() }}</div>
@endsection
