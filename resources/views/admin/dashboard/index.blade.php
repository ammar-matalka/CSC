@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
    <!-- Services Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-briefcase text-white text-xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800">{{ $stats['services'] }}</span>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Services</h3>
        <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium inline-flex items-center">
            Manage <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
    <!-- Partners Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-handshake text-white text-xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800">{{ $stats['partners'] }}</span>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Partners</h3>
        <a href="{{ route('admin.partners.index') }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium inline-flex items-center">
            Manage <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
    <!-- Solutions Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-lightbulb text-white text-xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800">{{ $stats['solutions'] }}</span>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Solutions</h3>
        <a href="{{ route('admin.solutions.index') }}" class="text-pink-600 hover:text-pink-700 text-sm font-medium inline-flex items-center">
            Manage <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
    <!-- News Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-newspaper text-white text-xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800">{{ $stats['news'] }}</span>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">News</h3>
        <a href="{{ route('admin.news.index') }}" class="text-green-600 hover:text-green-700 text-sm font-medium inline-flex items-center">
            Manage <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
    <!-- Principles Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-star text-white text-xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800">{{ $stats['principles'] }}</span>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Principles</h3>
        <a href="{{ route('admin.principles.index') }}" class="text-yellow-600 hover:text-yellow-700 text-sm font-medium inline-flex items-center">
            Manage <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
    <!-- Stats Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-chart-bar text-white text-xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800">{{ $stats['stats_count'] }}</span>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Stats</h3>
        <a href="{{ route('admin.stats.index') }}" class="text-red-600 hover:text-red-700 text-sm font-medium inline-flex items-center">
            Manage <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
</div>

<!-- Quick Actions -->
<div class="mt-8 bg-white rounded-2xl p-6 shadow-lg">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.services.create') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-blue-500 hover:bg-blue-50 transition text-center">
            <i class="fas fa-plus-circle text-2xl text-gray-400 mb-2"></i>
            <p class="text-sm font-medium text-gray-600">Add Service</p>
        </a>
        <a href="{{ route('admin.news.create') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-green-500 hover:bg-green-50 transition text-center">
            <i class="fas fa-plus-circle text-2xl text-gray-400 mb-2"></i>
            <p class="text-sm font-medium text-gray-600">Add News</p>
        </a>
        <a href="{{ route('admin.partners.create') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-purple-500 hover:bg-purple-50 transition text-center">
            <i class="fas fa-plus-circle text-2xl text-gray-400 mb-2"></i>
            <p class="text-sm font-medium text-gray-600">Add Partner</p>
        </a>
        <a href="{{ route('admin.settings.index') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-gray-500 hover:bg-gray-50 transition text-center">
            <i class="fas fa-cog text-2xl text-gray-400 mb-2"></i>
            <p class="text-sm font-medium text-gray-600">Settings</p>
        </a>
    </div>
</div>
@endsection
