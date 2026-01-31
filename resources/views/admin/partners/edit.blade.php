@extends('admin.layouts.app')

@section('title', 'Edit Partner')
@section('page-title', 'Edit Partner Logo')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.partners.update', $partner) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg p-8">
        @csrf
        @method('PUT')

        <!-- Current Logo -->
        @if($partner->logo)
            <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-xs text-gray-600 mb-3 font-semibold">✓ Current Logo:</p>
                <img src="{{ asset('storage/' . $partner->logo) }}"
                     alt="Partner Logo"
                     class="h-24 w-auto border border-gray-300 rounded-lg p-2 bg-white">
            </div>
        @endif

        <!-- New Logo -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                New Logo
                <span class="text-gray-500 text-xs">(Leave empty to keep current)</span>
            </label>
            <input type="file"
                   name="logo"
                   accept="image/*"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
            <p class="text-xs text-gray-500 mt-2">
                <i class="fas fa-info-circle mr-1"></i>
                Supported: PNG, JPG, SVG | Max: 2MB
            </p>
        </div>

        <!-- Order -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Display Order *</label>
            <input type="number"
                   name="order"
                   value="{{ old('order', $partner->order) }}"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   required>
            <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
        </div>

        <!-- Active Status -->
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $partner->is_active) ? 'checked' : '' }}
                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active (Show on website)</span>
            </label>
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition transform hover:scale-105 font-semibold">
                <i class="fas fa-save mr-2"></i> Update Logo
            </button>
            <a href="{{ route('admin.partners.index') }}"
               class="text-gray-600 hover:text-gray-800 transition font-medium">
                <i class="fas fa-times mr-2"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
