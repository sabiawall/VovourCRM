@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Edit Scholarship</h1>

    @if(session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    <form action="{{ route('scholarships.update', $scholarship) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $scholarship->title) }}" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="country" class="block text-gray-700">Country</label>
            <input type="text" id="country" name="country" value="{{ old('country', $scholarship->country) }}" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label for="content" class="block text-gray-700">Content</label>
            <textarea id="content" name="content" class="w-full px-4 py-2 border rounded" rows="5" required>{{ old('content', $scholarship->content) }}</textarea>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded">Update Scholarship</button>
    </form>
</div>
@endsection
