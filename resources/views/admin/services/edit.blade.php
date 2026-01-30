@extends('admin.layouts.app')

@section('title', isset($service) ? 'Edit Service' : 'Create Service')
@section('page-title', isset($service) ? 'Edit Service' : 'Create Service')

@section('content')
<div class="max-w-3xl">
    <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" 
          method="POST" 
          class="bg-white rounded-2xl shadow-lg p-8">
        @csrf
        @if(isset($service))
            @method('PUT')
        @endif
        
        <!-- Title -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
            <input type="text" 
                   name="title" 
                   value="{{ old('title', $service->title ?? '') }}"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   required>
        </div>
        
        <!-- Description -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
            <textarea name="description" 
                      rows="4"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none"
                      required>{{ old('description', $service->description ?? '') }}</textarea>
        </div>
        
        <!-- Icon -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome Class) *</label>
            <input type="text" 
                   name="icon" 
                   value="{{ old('icon', $service->icon ?? 'fas fa-star') }}"
                   placeholder="e.g., fas fa-headset"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   required>
            <p class="text-xs text-gray-500 mt-1">Use FontAwesome icon classes (e.g., fas fa-laptop-code)</p>
        </div>
        
        <!-- Color -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Color *</label>
            <select name="color" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                    required>
                <option value="blue" {{ old('color', $service->color ?? '') == 'blue' ? 'selected' : '' }}>Blue</option>
                <option value="purple" {{ old('color', $service->color ?? '') == 'purple' ? 'selected' : '' }}>Purple</option>
                <option value="pink" {{ old('color', $service->color ?? '') == 'pink' ? 'selected' : '' }}>Pink</option>
                <option value="green" {{ old('color', $service->color ?? '') == 'green' ? 'selected' : '' }}>Green</option>
                <option value="yellow" {{ old('color', $service->color ?? '') == 'yellow' ? 'selected' : '' }}>Yellow</option>
                <option value="red" {{ old('color', $service->color ?? '') == 'red' ? 'selected' : '' }}>Red</option>
            </select>
        </div>
        
        <!-- Order -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Order *</label>
            <input type="number" 
                   name="order" 
                   value="{{ old('order', $service->order ?? 0) }}"
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
                       {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
            </label>
        </div>
        
        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition">
                {{ isset($service) ? 'Update' : 'Create' }} Service
            </button>
            <a href="{{ route('admin.services.index') }}" 
               class="text-gray-600 hover:text-gray-800 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
