@extends('layouts.app')

@section('title', 'SCHOLARIX | Create Scholarship')
@section('page_title', 'Create Scholarship')

@section('content')
    @include('admin.scholarships.partials.form', [
        'action' => route('admin.scholarships.store'),
        'method' => 'POST',
        'scholarship' => null,
    ])
@endsection
