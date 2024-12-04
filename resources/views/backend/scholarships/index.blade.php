@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Scholarship Management</h1>

    @can('create scholarships')
        <a href="{{ route('scholarships.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Scholarship</a>
    @endcan

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Title</th>
                <th class="py-2 px-4 border-b text-left">Country</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scholarships as $scholarship)
                <tr>
                    <td class="py-2 px-4 border-b text-left">{{ $scholarship->id }}</td>
                    <td class="py-2 px-4 border-b text-left">{{ $scholarship->title }}</td>
                    <td class="py-2 px-4 border-b text-left">{{ $scholarship->country }}</td>
                    <td class="py-2 px-4 border-b text-left">

                        @can('edit scholarships')
                        <a href="{{ route('scholarships.edit', $scholarship) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        @endcan
                        @can('delete scholarships')
                        <form action="{{ route('scholarships.destroy', $scholarship) }}" method="POST" class="inline-block">
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
