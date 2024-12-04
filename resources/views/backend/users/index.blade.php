@extends('backend.layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">User Management</h1>

        @can('create users')
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add User</a>
        @endcan

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b text-left">S.N</th>
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                    <!-- @can('assign permission roles')
                    <th class="py-2 px-4 border-b text-left">Assign Role</th>
                    @endcan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=>$user)
                    <tr>
                        <td class="py-2 px-4 border-b text-left">{{ $key+1 }}</td>
                        <td class="py-2 px-4 border-b text-left">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b text-left">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b text-left">
                            @can('edit users')
                            <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            @endcan
                            @can('delete users')
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                            @endcan
                        </td>
                        <!-- @can('assign permission roles')
                        <td class="py-2 px-4 border-b text-left"> 
                                <form action="{{ route('assign.role', $user->id) }}" method="POST">
                                    @csrf
                                    <label for="role">Assign Role:</label>    
                                    <select name="role" id="role" class="border px-2 py-1">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}> {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Assign Role</button>
                                </form>
                            </td>
                        @endcan -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
