@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Blog Management</h1>

    @can('create blogs')
        <a href="{{ route('blogs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Blog</a>
    @endcan

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b text-left">S.N</th>
                <th class="py-2 px-4 border-b text-left">Title</th>
                <th class="py-2 px-4 border-b text-left">Short Description</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $key=>$blog)
                <tr>
                    <td class="py-2 px-4 border-b text-left">{{ $key+1 }}</td>
                    <td class="py-2 px-4 border-b text-left">{{ $blog->title }}</td>
                    <td class="py-2 px-4 border-b text-left">{{ $blog->short_description}}</td>
                    <td class="py-2 px-4 border-b text-left">
                        @can('edit blogs')
                            <a href="{{ route('blogs.edit', $blog) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        @endcan
                        @can('delete blogs')
                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
