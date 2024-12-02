@extends('backend.layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">User Management</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add User</a>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                    <th class="py-2 px-4 border-b">Assign Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                        <td class="py-2 px-4 border-b"> 
                            <form action="{{ route('assign.role', $user->id) }}" method="POST">
                                @csrf
                                <label for="role">Assign Role:</label>
                                <select name="role" id="role" class="border px-2 py-1">
                                    <option value="Admin" {{ $user->hasRole('Admin') ? 'selected' : '' }}> Admin</option>
                                    <option value="Editor" {{ $user->hasRole('Editor') ? 'selected' : '' }}> Editor</option>
                                </select>
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Assign Role</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
