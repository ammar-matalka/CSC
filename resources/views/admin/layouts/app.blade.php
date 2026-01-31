<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - CSC Beyond</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Smooth Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #3b82f6, #8b5cf6);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #2563eb, #7c3aed);
        }

        /* Active Link Indicator */
        .nav-active {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            border-left: 4px solid white;
        }

        /* Sidebar Transition */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100" x-data="{ sidebarOpen: true, mobileMenuOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'"
               class="sidebar-transition bg-gradient-to-b from-blue-600 via-blue-700 to-purple-700 text-white flex-shrink-0 shadow-2xl relative z-50">
            <div class="h-full flex flex-col">

                <!-- Logo -->
                <div class="p-6 flex items-center justify-between border-b border-white/10">
                    <div x-show="sidebarOpen" class="flex items-center space-x-3 transition-all duration-300">
                        <div class="w-12 h-12 bg-gradient-to-br from-white/30 to-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-black text-lg">CSC</span>
                        </div>
                        <div>
                            <span class="text-xl font-bold block">Admin</span>
                            <span class="text-xs text-white/70">Control Panel</span>
                        </div>
                    </div>
                    <button @click="sidebarOpen = !sidebarOpen"
                            class="p-2.5 hover:bg-white/20 rounded-lg transition-all duration-200 hover:scale-110">
                        <i class="fas" :class="sidebarOpen ? 'fa-chevron-left' : 'fa-chevron-right'"></i>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'nav-active' : '' }}">
                        <i class="fas fa-home w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">Dashboard</span>
                    </a>

                    <!-- Settings -->
                    <a href="{{ route('admin.settings.index') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.settings.*') ? 'nav-active' : '' }}">
                        <i class="fas fa-cog w-5 text-lg group-hover:rotate-90 transition-transform duration-300"></i>
                        <span x-show="sidebarOpen" class="font-medium">Settings</span>
                    </a>

                    <div class="my-3 border-t border-white/10"></div>

                    <!-- Services -->
                    <a href="{{ route('admin.services.index') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.services.*') ? 'nav-active' : '' }}">
                        <i class="fas fa-briefcase w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">Services</span>
                    </a>

                    <!-- Partners -->
                    <a href="{{ route('admin.partners.index') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.partners.*') ? 'nav-active' : '' }}">
                        <i class="fas fa-handshake w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">Partners</span>
                    </a>

                    <!-- Solutions -->
                    <a href="{{ route('admin.solutions.index') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.solutions.*') ? 'nav-active' : '' }}">
                        <i class="fas fa-lightbulb w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">Solutions</span>
                    </a>

                    <!-- Principles -->
                    <a href="{{ route('admin.principles.index') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.principles.*') ? 'nav-active' : '' }}">
                        <i class="fas fa-star w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">Principles</span>
                    </a>

                    <!-- Stats -->
                    <a href="{{ route('admin.stats.index') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.stats.*') ? 'nav-active' : '' }}">
                        <i class="fas fa-chart-bar w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">Stats</span>
                    </a>

                    <!-- News -->
                    <a href="{{ route('admin.news.index') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.news.*') ? 'nav-active' : '' }}">
                        <i class="fas fa-newspaper w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">News</span>
                    </a>
                </nav>

                <!-- Footer -->
                <div class="p-4 border-t border-white/10 bg-white/5">
                    <a href="{{ route('landing') }}"
                       target="_blank"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-white/20 transition-all duration-200 group">
                        <i class="fas fa-external-link-alt w-5 text-lg group-hover:scale-110 transition-transform"></i>
                        <span x-show="sidebarOpen" class="font-medium">View Website</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Bar -->
            <header class="bg-white shadow-md border-b border-gray-200">
                <div class="flex items-center justify-between px-8 py-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-sm text-gray-500 mt-1">@yield('page-subtitle', 'Manage your content')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2.5 hover:bg-gray-100 rounded-xl transition-all duration-200 hover:scale-110">
                            <i class="fas fa-bell text-gray-600 text-lg"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Profile -->
                        <div class="flex items-center space-x-3 pl-4 border-l border-gray-200">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">Admin User</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full shadow-lg"></div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8 bg-gradient-to-br from-gray-50 to-gray-100">

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-5 rounded-xl shadow-sm animate-pulse">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-green-800">Success!</p>
                                <p class="text-green-700 text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Error Message -->
                @if($errors->any())
                    <div class="mb-6 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-5 rounded-xl shadow-sm">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-exclamation text-white"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-red-800 mb-2">Please fix the following errors:</p>
                                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
