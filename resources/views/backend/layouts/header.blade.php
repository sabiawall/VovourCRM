<header class="bg-gray-900 text-white p-4 flex justify-between items-center shadow-md">
    <button id="sidebarToggle" class="text-white md:hidden">
        <i class="fas fa-bars"></i>
    </button>
    <div class="text-lg font-bold">Admin Dashboard</div>
    <div class="flex items-center space-x-4">
        <!-- Notifications -->
        <button class="relative text-white hover:text-gray-400">
            <i class="fas fa-bell"></i>
            <span class="absolute top-0 right-0 h-4 w-4 text-xs bg-red-500 rounded-full flex items-center justify-center">3</span>
        </button>
        <!-- Profile -->
        <div class="relative">
            <button class="flex items-center space-x-2 bg-gray-700 hover:bg-gray-600 p-2 rounded-md">
                <i class="fas fa-user-circle"></i>
                <span>Admin</span>
            </button>
        </div>
    </div>
</header>
