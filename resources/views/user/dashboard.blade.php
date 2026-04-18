@extends('layouts.app')

@section('title', 'SCHOLARIX | User Dashboard')
@section('page_title', 'User Dashboard')

@section('content')
    <section class="page-header-row">
        <div>
            <span class="section-tag">Student Portal</span>
            <h2>Explore scholarships, submit requirements, and monitor your application progress.</h2>
        </div>
        <a href="{{ route('user.scholarships.index') }}" class="btn btn-primary">Browse Scholarships</a>
    </section>

    <section class="info-grid four-col">
        <div class="metric-card"><span>Total Applications</span><strong>{{ $applications->count() }}</strong></div>
        <div class="metric-card"><span>Approved</span><strong>{{ $applications->where('status', 'approved')->count() }}</strong></div>
        <div class="metric-card"><span>Pending</span><strong>{{ $applications->whereIn('status', ['pending', 'under_review'])->count() }}</strong></div>
        <div class="metric-card"><span>Open Scholarships</span><strong>{{ $availableScholarships->count() }}</strong></div>
    </section>

    <section class="info-grid two-col-wide">
        <div class="panel-card">
            <div class="panel-head">
                <h3>Featured Scholarships</h3>
                <span class="pill">Apply</span>
            </div>

            <div class="application-list">
                @forelse ($availableScholarships as $scholarship)
                    <div class="application-item vertical-mobile">
                        <div>
                            <strong>{{ $scholarship->title }}</strong>
                            <p>{{ $scholarship->description }}</p>
                            <small>{{ $scholarship->category }} • Deadline: {{ $scholarship->deadline->format('M d, Y') }}</small>
                        </div>
                        <a href="{{ route('user.scholarships.show', $scholarship) }}" class="btn btn-primary">View Details</a>
                    </div>
                @empty
                    <p>No open scholarships available right now.</p>
                @endforelse
            </div>
        </div>

        <div class="panel-card">
            <div class="panel-head">
                <h3>My Applications</h3>
                <span class="pill">Status</span>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Scholarship</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                            <tr>
                                <td>{{ $application->scholarship->title }}</td>
                                <td><span class="status {{ $application->status }}">{{ ucfirst(str_replace('_', ' ', $application->status)) }}</span></td>
                                <td>{{ $application->remarks ?? 'Waiting for review' }}</td>
                                <td>{{ optional($application->applied_at)->format('M d, Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4">You have not applied for any scholarships yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
