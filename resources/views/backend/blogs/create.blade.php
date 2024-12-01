@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Add New Blog</h1>

    @if(session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div id="successMessage" class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="discount" class="block text-gray-700">Discount (%)</label>
            <input type="number" id="discount" name="discount" class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label for="content" class="block text-gray-700">Content</label>
            <textarea id="content" name="content" class="w-full px-4 py-2 border rounded" rows="5" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Add Blog</button>
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
