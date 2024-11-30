@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-blue-500 text-white p-4 rounded shadow-md">
            <h2 class="text-lg font-semibold">Total Blogs</h2>
            <p class="text-2xl">{{ $blogCount }}</p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded shadow-md">
            <h2 class="text-lg font-semibold">Total Scholarships</h2>
            <p class="text-2xl">{{ $scholarshipCount }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded shadow-md">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-2xl">{{ $userCount }}</p>
        </div>
    </div>
</div>
@endsection
