@extends('backend.layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Add New User</h1>

        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div>
                <label for="role" class="block text-gray-700">Assign Role</label>
                <select name="role" id="role" class="w-full px-4 py-2 border rounded" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Create User</button>
        </form>
    </div>
@endsection
