@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>{{ $blog->title }}</h1>
    <p><strong>Short Description:</strong> {{ $blog->discount ? $blog->discount . '%' : 'N/A' }}</p>
    @if($blog->image)
    <p><img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="300"></p>
    @endif
    <div>{!! $blog->content !!}</div> <!-- Renders HTML content -->
</div>
@endsection
