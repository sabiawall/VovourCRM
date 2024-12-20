<div class="bg-gray-900 text-white fixed top-0 left-0 h-full text-white transition-all duration-300" id="sidebar">
    <!-- Sidebar Content -->
    <div class="flex flex-col h-full w-64 overflow-y-auto">
        <div class="p-4 text-2xl font-semibold text-gray-300">Admin Panel</div>
        <nav>
            <ul>
                <li class="p-4 hover:bg-gray-700">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <i class="fas fa-tachometer-alt text-gray-300"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>    
                
                @can('view users')
                <li class="p-4 hover:bg-gray-700">
                    <a href="/users" class="flex items-center space-x-3">
                        <i class="fas fa-users text-gray-300"></i>
                        <span class="text-sm">Users</span>
                    </a>
                </li>
                @endcan
                
                @can('view roles')
                <li class="p-4 hover:bg-gray-700">
                    <a href="/roles" class="flex items-center space-x-3">
                        <i class="fas fa-user-shield text-gray-300"></i>
                        <span class="text-sm">Roles</span>
                    </a>
                </li> 
                @endcan

                @can('view blogs')
                <li class="p-4 hover:bg-gray-700">
                    <a href="{{ route('blogs.index') }}" class="flex items-center space-x-5">
                        <i class="fas fa-file-alt text-gray-300"></i>
                        <span class="text-sm">Blogs</span>
                    </a>
                </li>
                @endcan

                @can('view scholarships')
                <li class="p-4 hover:bg-gray-700">
                    <a href="{{ route('scholarships.index') }}" class="flex items-center space-x-3">
                        <i class="fas fa-graduation-cap text-gray-300"></i>
                        <span class="text-sm">Scholarships</span>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
    </div>
</div>
