@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Add New Role</h1>

    @if(session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div id="successMessage" class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block text-gray-700">Name</label>
            <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Add role</button>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('successMessage');
        
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.transition = 'opacity 0.5s';
                successMessage.style.opacity = '0';
                
                setTimeout(() => {
                    successMessage.remove();
                }, 500); // Matches the duration of the fade-out transition
            }, 3000); // Delay before the message starts fading out (in milliseconds)
        }
    });
</script>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('content'); // Initialize CKEditor for 'content'
    });
</script>
