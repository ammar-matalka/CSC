@extends('admin.layouts.app')
@section('title', isset($solution) ? 'Edit Solution' : 'Create Solution')
@section('page-title', isset($solution) ? 'Edit Solution' : 'Create Solution')
@section('content')
<div class="max-w-4xl">
    <form action="{{ isset($solution) ? route('admin.solutions.update', $solution) : route('admin.solutions.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-lg p-8" x-data="{ featureCount: {{ isset($solution) && $solution->features ? count($solution->features) : 2 }} }">
        @csrf
        @if(isset($solution)) @method('PUT') @endif

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title', $solution->title ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none" required>{{ old('description', $solution->description ?? '') }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
            <div class="space-y-3">
                @if(isset($solution) && $solution->features)
                    @foreach($solution->features as $index => $feature)
                        <input type="text" name="features[]" value="{{ $feature }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="Feature {{ $index + 1 }}">
                    @endforeach
                @else
                    <input type="text" name="features[]" class="w-full px-4 py-3 rounded-lg border" placeholder="Feature 1">
                    <input type="text" name="features[]" class="w-full px-4 py-3 rounded-lg border" placeholder="Feature 2">
                @endif
            </div>
        </div>

        <!-- Solution Image -->
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Solution Image *</label>

    @if(isset($solution) && $solution->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $solution->image) }}"
                 alt="{{ $solution->title }}"
                 class="h-48 w-auto border border-gray-300 rounded-lg">
            <p class="text-xs text-gray-500 mt-2">Current image</p>
        </div>
    @endif

    <input type="file"
           name="image"
           accept="image/*"
           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
           {{ isset($solution) ? '' : 'required' }}>
    <p class="text-xs text-gray-500 mt-1">Recommended: 800x600px | Max: 2MB | Formats: JPG, PNG, GIF</p>
</div>

<!-- Icon (Optional - for fallback) -->
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome) - Optional</label>
    <input type="text"
           name="icon"
           value="{{ old('icon', $solution->icon ?? 'fas fa-laptop-code') }}"
           placeholder="e.g., fas fa-laptop-code"
           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
    <p class="text-xs text-gray-500 mt-1">Used as fallback if no image is uploaded</p>
</div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Order *</label>
            <input type="number" name="order" value="{{ old('order', $solution->order ?? 0) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $solution->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
            </label>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition">
                {{ isset($solution) ? 'Update' : 'Create' }} Solution
            </button>
            <a href="{{ route('admin.solutions.index') }}" class="text-gray-600 hover:text-gray-800 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
