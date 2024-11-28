@extends('backend.layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Edit User</h1>

        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700">Password (leave blank if no change)</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded">
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded">Update User</button>
        </form>
    </div>
@endsection
