@extends('layouts.app')

@section('title', 'SCHOLARIX | Admin Dashboard')
@section('page_title', 'Admin Dashboard')

@section('content')
    <section class="page-header-row">
        <div>
            <span class="section-tag">Administrator Panel</span>
            <h2>Manage scholarships, monitor applications, and keep SCHOLARIX organized.</h2>
        </div>
        <div class="topbar-actions">
            <a href="{{ route('admin.scholarships.index') }}" class="btn btn-primary">Manage Scholarships</a>
        </div>
    </section>

    <section class="info-grid four-col">
        <div class="metric-card"><span>Total Users</span><strong>{{ $totalUsers }}</strong></div>
        <div class="metric-card"><span>Open Scholarships</span><strong>{{ $activeScholarships }}</strong></div>
        <div class="metric-card"><span>Pending Review</span><strong>{{ $pendingApplications }}</strong></div>
        <div class="metric-card"><span>Approved</span><strong>{{ $approvedApplications }}</strong></div>
    </section>

    <section class="info-grid two-col-wide">
        <div class="panel-card">
            <div class="panel-head">
                <h3>Recent Scholarships</h3>
                <span class="pill">Overview</span>
            </div>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Deadline</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($scholarships as $scholarship)
                            <tr>
                                <td>{{ $scholarship->title }}</td>
                                <td>{{ $scholarship->category }}</td>
                                <td>{{ $scholarship->deadline->format('M d, Y') }}</td>
                                <td><span class="status {{ $scholarship->status }}">{{ ucfirst($scholarship->status) }}</span></td>
                            </tr>
                        @empty
                            <tr><td colspan="4">No scholarships found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel-card">
            <div class="panel-head">
                <h3>Quick Actions</h3>
                <span class="pill">Admin</span>
            </div>
            <div class="stack-form">
                <a href="{{ route('admin.scholarships.create') }}" class="btn btn-primary">Create Scholarship</a>
                <a href="{{ route('admin.scholarships.index') }}" class="btn btn-outline">View All Scholarships</a>
            </div>
        </div>
    </section>

    <section class="panel-card">
        <div class="panel-head">
            <h3>Recent Applications</h3>
            <span class="pill">Review</span>
        </div>

        <div class="application-list">
            @forelse ($recentApplications as $application)
                <div class="application-item">
                    <div>
                        <strong>{{ $application->user->name }}</strong>
                        <p>{{ $application->scholarship->title }} • Applied {{ optional($application->applied_at)->format('M d, Y h:i A') }}</p>
                        @if ($application->document_path)
                            <small>Uploaded document: {{ $application->document_path }}</small>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('admin.applications.status', $application) }}" class="status-form">
                        @csrf
                        @method('PATCH')
                        <select name="status">
                            <option value="pending" @selected($application->status === 'pending')>Pending</option>
                            <option value="under_review" @selected($application->status === 'under_review')>Under Review</option>
                            <option value="approved" @selected($application->status === 'approved')>Approved</option>
                            <option value="rejected" @selected($application->status === 'rejected')>Rejected</option>
                        </select>
                        <input type="text" name="remarks" value="{{ $application->remarks }}" placeholder="Remarks">
                        <button type="submit" class="btn btn-outline">Update</button>
                    </form>
                </div>
            @empty
                <p>No recent applications yet.</p>
            @endforelse
        </div>
    </section>
@endsection
