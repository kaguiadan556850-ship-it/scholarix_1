@extends('layouts.app')

@section('title', 'SCHOLARIX | Scholarship Management')
@section('page_title', 'Scholarship Management')

@section('content')
    <section class="page-header-row">
        <div>
            <span class="section-tag">Admin CRUD</span>
            <h2>Create, update, and remove scholarship programs.</h2>
        </div>
        <a href="{{ route('admin.scholarships.create') }}" class="btn btn-primary">New Scholarship</a>
    </section>

    <section class="panel-card">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Slots</th>
                        <th>Applications</th>
                        <th>Status</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($scholarships as $scholarship)
                        <tr>
                            <td>{{ $scholarship->title }}</td>
                            <td>{{ $scholarship->category }}</td>
                            <td>${{ number_format($scholarship->amount, 2) }}</td>
                            <td>{{ $scholarship->slots }}</td>
                            <td>{{ $scholarship->applications_count }}</td>
                            <td><span class="status {{ $scholarship->status }}">{{ ucfirst($scholarship->status) }}</span></td>
                            <td>{{ $scholarship->deadline->format('M d, Y') }}</td>
                            <td>
                                <div class="inline-actions">
                                    <a href="{{ route('admin.scholarships.edit', $scholarship) }}" class="btn btn-outline">Edit</a>
                                    <form method="POST" action="{{ route('admin.scholarships.destroy', $scholarship) }}" onsubmit="return confirm('Delete this scholarship?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8">No scholarships created yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-note">{{ $scholarships->links() }}</div>
    </section>
@endsection
