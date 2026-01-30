@extends('admin.layouts.app')

@section('title', isset($partner) ? 'Edit Partner' : 'Create Partner')
@section('page-title', isset($partner) ? 'Edit Partner' : 'Create Partner')

@section('content')
<div class="max-w-3xl">
    <form action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg p-8">
        @csrf
        @if(isset($partner))
            @method('PUT')
        @endif
        
        <!-- Name -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Partner Name *</label>
            <input type="text" 
                   name="name" 
                   value="{{ old('name', $partner->name ?? '') }}"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   required>
        </div>
        
        <!-- Logo -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Logo *</label>
            
            @if(isset($partner) && $partner->logo)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $partner->logo) }}" 
                         alt="{{ $partner->name }}" 
                         class="h-24 w-auto border border-gray-300 rounded-lg p-2">
                    <p class="text-xs text-gray-500 mt-2">Current logo</p>
                </div>
            @endif
            
            <input type="file" 
                   name="logo" 
                   accept="image/*"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   {{ isset($partner) ? '' : 'required' }}>
            <p class="text-xs text-gray-500 mt-1">Supported formats: JPG, PNG, SVG (Max: 2MB)</p>
        </div>
        
        <!-- Website -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Website URL</label>
            <input type="url" 
                   name="website" 
                   value="{{ old('website', $partner->website ?? '') }}"
                   placeholder="https://example.com"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
        </div>
        
        <!-- Order -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Order *</label>
            <input type="number" 
                   name="order" 
                   value="{{ old('order', $partner->order ?? 0) }}"
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
                       {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }}
                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
            </label>
        </div>
        
        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition">
                {{ isset($partner) ? 'Update' : 'Create' }} Partner
            </button>
            <a href="{{ route('admin.partners.index') }}" 
               class="text-gray-600 hover:text-gray-800 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
