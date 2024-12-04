<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="flex">

    <!-- Sidebar -->
    <div id="sidebar" class="bg-gray-800 text-white w-64 h-screen fixed top-0 left-0 transition-all duration-300 transform">
        @include('backend.layouts.sidebar')
    </div>

    <!-- Main Content -->
    <div id="mainContent" class="flex-1 flex flex-col transition-all duration-300 ml-64">
        <!-- Header -->
        @include('backend.layouts.header')

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    
    @if(session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Information',
                text: '{{ session('info') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    
        @if(session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: '{{ session('warning') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
    
            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full'); // Hide/show sidebar
                if (sidebar.classList.contains('-translate-x-full')) {
                    mainContent.classList.remove('ml-64'); // Remove margin when sidebar is hidden
                    mainContent.classList.add('ml-0');    // Full width for main content
                } else {
                    mainContent.classList.remove('ml-0');
                    mainContent.classList.add('ml-64');   // Add margin when sidebar is visible
                }
            });
        });
    </script>    
</body>
</html>
