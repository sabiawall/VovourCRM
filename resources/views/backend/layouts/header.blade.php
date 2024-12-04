<header class="bg-gray-900 text-white p-4 flex justify-between items-center shadow-md">
    <button id="sidebarToggle" class="text-white md:hidden">
        <i class="fas fa-bars"></i>
    </button>
    <div class="text-lg font-bold">Dashboard</div>
    <div class="flex items-center space-x-4">
        <!-- Notifications -->
        <button class="relative text-white hover:text-gray-400">
            <i class="fas fa-bell"></i>
            <span class="absolute top-0 right-0 h-4 w-4 text-xs bg-red-500 rounded-full flex items-center justify-center">3</span>
        </button>
        <!-- Profile -->
        <div class="relative">
            <button id="profileDropdownButton" class="flex items-center space-x-2 bg-gray-700 hover:bg-gray-600 p-2 rounded-md">
                <i class="fas fa-user-circle"></i>
                <span>{{auth()->user()->name}}</span>
            </button>
            <!-- Dropdown menu -->
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded shadow-lg hidden">
                {{-- <a href="#" class="block px-4 py-2 hover:bg-gray-700">Profile</a> --}}
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('profileDropdownButton');
        const dropdown = document.getElementById('profileDropdown');

        button.addEventListener('click', function() {
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });
</script>
