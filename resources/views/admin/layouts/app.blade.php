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
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50" x-data="{ sidebarOpen: true }">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'"
               class="bg-gradient-to-b from-blue-600 to-purple-700 text-white transition-all duration-300 flex-shrink-0">
            <div class="h-full flex flex-col">

                <!-- Logo -->
                <div class="p-6 flex items-center justify-between border-b border-white/10">
                    <div x-show="sidebarOpen" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold">CSC</span>
                        </div>
                        <span class="text-xl font-bold">Admin</span>
                    </div>
                    <button @click="sidebarOpen = !sidebarOpen"
                            class="p-2 hover:bg-white/10 rounded-lg transition">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 overflow-y-auto p-4">
                    <ul class="space-y-2">
                        <!-- Dashboard -->
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-home w-5"></i>
                                <span x-show="sidebarOpen">Dashboard</span>
                            </a>
                        </li>

                        <!-- Settings -->
                        <li>
                            <a href="{{ route('admin.settings.index') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.settings.*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-cog w-5"></i>
                                <span x-show="sidebarOpen">Settings</span>
                            </a>
                        </li>

                        <!-- Services -->
                        <li>
                            <a href="{{ route('admin.services.index') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.services.*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-briefcase w-5"></i>
                                <span x-show="sidebarOpen">Services</span>
                            </a>
                        </li>

                        <!-- Partners -->
                        <li>
                            <a href="{{ route('admin.partners.index') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.partners.*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-handshake w-5"></i>
                                <span x-show="sidebarOpen">Partners</span>
                            </a>
                        </li>

                        <!-- Solutions -->
                        <li>
                            <a href="{{ route('admin.solutions.index') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.solutions.*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-lightbulb w-5"></i>
                                <span x-show="sidebarOpen">Solutions</span>
                            </a>
                        </li>

                        <!-- Principles -->
                        <li>
                            <a href="{{ route('admin.principles.index') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.principles.*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-star w-5"></i>
                                <span x-show="sidebarOpen">Principles</span>
                            </a>
                        </li>

                        <!-- Stats -->
                        <li>
                            <a href="{{ route('admin.stats.index') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.stats.*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-chart-bar w-5"></i>
                                <span x-show="sidebarOpen">Stats</span>
                            </a>
                        </li>

                        <!-- News -->
                        <li>
                            <a href="{{ route('admin.news.index') }}"
                               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.news.*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-newspaper w-5"></i>
                                <span x-show="sidebarOpen">News</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Footer -->
                <div class="p-4 border-t border-white/10">
                    <a href="{{ route('landing') }}"
                       target="_blank"
                       class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-external-link-alt w-5"></i>
                        <span x-show="sidebarOpen">View Website</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Bar -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-6">
                    <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 hover:bg-gray-100 rounded-lg transition">
                            <i class="fas fa-bell text-gray-600"></i>
                        </button>
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full"></div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span class="text-green-800">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Error Message -->
                @if($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3 mt-1"></i>
                            <div>
                                @foreach($errors->all() as $error)
                                    <p class="text-red-800">{{ $error }}</p>
                                @endforeach
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
