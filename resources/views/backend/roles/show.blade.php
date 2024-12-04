@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Role Details</h1>

    <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4">
        <h2 class="text-2xl font-bold mb-4">{{ $role->name }}</h2>

        <h3 class="text-xl font-semibold mb-2">Permissions:</h3>
        @if($role->permissions->isEmpty())
            <p class="text-gray-600">No permissions assigned to this role.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach($role->permissions as $permission)
                    <li class="text-gray-700">{{ $permission->name }}</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('roles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Back to Roles</a>
    </div>
</div>
@endsection
