<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="flex">

    <!-- Sidebar -->
    @include('backend.layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col transition-all duration-300 main-content">
        <!-- Header -->
        @include('backend.layouts.header')

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
    
            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full'); // Hide/show sidebar
            });
        });
    </script>    
</body>
</html>
