@extends('layouts.app')

@section('title', 'SCHOLARIX | Edit Scholarship')
@section('page_title', 'Edit Scholarship')

@section('content')
    @include('admin.scholarships.partials.form', [
        'action' => route('admin.scholarships.update', $scholarship),
        'method' => 'PUT',
        'scholarship' => $scholarship,
    ])
@endsection
