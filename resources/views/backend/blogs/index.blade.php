@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Blog Management</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('blogs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Blog</a>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Short Description</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $blog->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $blog->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $blog->discount ? $blog->discount . '%' : 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('blogs.edit', $blog) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
