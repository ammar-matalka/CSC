@extends('admin.layouts.app')

@section('title', 'Add Partner')
@section('page-title', 'Add Partner Logo')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.partners.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg p-8">
        @csrf

        <!-- Logo -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Partner Logo *</label>
            <input type="file"
                   name="logo"
                   accept="image/*"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700"
                   required>
            <p class="text-xs text-gray-500 mt-2">
                <i class="fas fa-info-circle mr-1"></i>
                Supported: PNG, JPG, SVG | Max: 2MB | Recommended: Transparent background
            </p>
        </div>

        <!-- Active Status -->
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       checked
                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active (Show on website)</span>
            </label>
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition transform hover:scale-105 font-semibold">
                <i class="fas fa-upload mr-2"></i> Upload Logo
            </button>
            <a href="{{ route('admin.partners.index') }}"
               class="text-gray-600 hover:text-gray-800 transition font-medium">
                <i class="fas fa-times mr-2"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
