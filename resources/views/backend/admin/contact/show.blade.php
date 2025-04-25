@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 700px; width: 100%;">
        <div class="card-header">
            <h4 class="card-title mb-0">Contact Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
            <p><strong>Message:</strong></p>
            <div class="bg-light p-3 rounded border">{{ $contact->message }}</div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('contact.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
