@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Roles & Permissions Management</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Role</a>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">S.N</th>
                <th class="py-2 px-4 border-b">Role Name</th>
                <th class="py-2 px-4 border-b">Permissions</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key=>$role)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $key+1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $role->name }}</td>
                    <td class="py-2 px-4 border-b">
                        @if($role->permissions && $role->permissions->isNotEmpty())
                            @foreach($role->permissions as $permission)
                                <span class="bg-blue-100 text-blue-800 text-xs py-1 px-2 rounded-full">{{ $permission->name }}</span>
                            @endforeach
                        @else
                            <span class="text-gray-500">No permissions assigned</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('roles.edit', $role) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline-block">
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
