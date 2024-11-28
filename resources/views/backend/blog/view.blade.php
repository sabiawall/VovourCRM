@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>{{ $blog->title }}</h3>
                <p><strong>Slug:</strong> {{ $blog->slug }}</p>
                <p><strong>Source:</strong> {{ $blog->source }}</p>
                <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="Blog Image" class="img-fluid mb-3">
                <div>
                    <strong>Details:</strong>
                    <p>{{ $blog->details }}</p>
                </div>
                <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
