@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Add New Role</h1>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                   class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
            <select id="permissions" name="permissions[]" multiple 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-lg">
                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}" 
                        {{ in_array($permission->id, old('permissions', [])) ? 'selected' : '' }}>
                        {{ $permission->name }}
                    </option>
                @endforeach
            </select>
            @error('permissions')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Role</button>
    </form>
</div>
@endsection
