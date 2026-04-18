@extends('layouts.app')

@section('title', 'SCHOLARIX | Submit Application')
@section('page_title', 'Submit Application')

@section('content')
    <section class="panel-card">
        <div class="panel-head">
            <h3>{{ $scholarship->title }}</h3>
            <span class="pill">Application Form</span>
        </div>

        <form method="POST" action="{{ route('user.applications.store', $scholarship) }}" enctype="multipart/form-data" class="stack-form">
            @csrf

            <label>Personal Statement</label>
            <textarea name="personal_statement" rows="7" placeholder="Tell us why you deserve this scholarship..." required>{{ old('personal_statement') }}</textarea>

            <label>Upload Requirement</label>
            <input type="file" name="document" accept=".pdf,.jpg,.jpeg,.png" required>

            <div class="inline-actions">
                <button type="submit" class="btn btn-primary">Submit Application</button>
                <a href="{{ route('user.scholarships.show', $scholarship) }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </section>
@endsection
