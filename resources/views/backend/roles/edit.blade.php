@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Edit Role</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Role Name:</label>
            <input type="text" name="name" id="name" value="{{ $role->name }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <h3 class="text-gray-700 font-bold mb-2">Assign Permissions:</h3>
            <div class="grid grid-cols-2 gap-4">
                @foreach($permissions as $permission)
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} 
                                class="form-checkbox text-blue-600">
                            <span class="ml-2">{{ $permission->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Role</button>
    </form>
</div>
@endsection
