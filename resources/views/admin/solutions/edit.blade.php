@extends('admin.layouts.app')
@section('title', 'Edit Solution')
@section('page-title', 'Edit Solution')
@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.solutions.update', $solution) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg p-8">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $solution->title) }}"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   required>
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
            <textarea name="description"
                      rows="4"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none"
                      required>{{ old('description', $solution->description) }}</textarea>
        </div>

        <!-- Features -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
            <div class="space-y-3" x-data="{ features: {{ $solution->features ? count($solution->features) : 2 }} }">
                @if($solution->features)
                    @foreach($solution->features as $index => $feature)
                        <div class="flex gap-2">
                            <input type="text"
                                   name="features[]"
                                   value="{{ $feature }}"
                                   class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                                   placeholder="Feature {{ $index + 1 }}">
                        </div>
                    @endforeach
                @else
                    <input type="text" name="features[]" class="w-full px-4 py-3 rounded-lg border" placeholder="Feature 1">
                    <input type="text" name="features[]" class="w-full px-4 py-3 rounded-lg border" placeholder="Feature 2">
                @endif

                <!-- Add More Button -->
                <button type="button"
                        @click="features++; $nextTick(() => {
                            const container = $el.previousElementSibling;
                            const newInput = document.createElement('input');
                            newInput.type = 'text';
                            newInput.name = 'features[]';
                            newInput.placeholder = 'Feature ' + (features);
                            newInput.className = 'w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition';
                            container.appendChild(newInput);
                        })"
                        class="text-blue-600 hover:text-blue-700 text-sm font-medium inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Feature
                </button>
            </div>
        </div>

        <!-- Solution Image -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Solution Image
                <span class="text-gray-500 text-xs">(Leave empty to keep current image)</span>
            </label>

            @if($solution->image)
                <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-xs text-gray-600 mb-2 font-semibold">✓ Current Image:</p>
                    <img src="{{ asset('storage/' . $solution->image) }}"
                         alt="{{ $solution->title }}"
                         class="h-48 w-auto border-2 border-gray-300 rounded-lg shadow-sm">
                </div>
            @else
                <div class="mb-4 p-6 bg-yellow-50 border border-yellow-200 rounded-lg text-center">
                    <i class="fas fa-exclamation-triangle text-yellow-500 text-3xl mb-2"></i>
                    <p class="text-sm text-yellow-700 font-medium">No image uploaded yet</p>
                </div>
            @endif

            <input type="file"
                   name="image"
                   accept="image/*"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">

            <div class="mt-2 bg-blue-50 border border-blue-200 rounded-lg p-3">
                <p class="text-xs text-blue-800">
                    <i class="fas fa-info-circle mr-1"></i>
                    <strong>Recommended:</strong> 800×600px | <strong>Max:</strong> 2MB | <strong>Formats:</strong> JPG, PNG, GIF
                </p>
            </div>
        </div>

        <!-- Icon (Optional Fallback) -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Icon (FontAwesome)
                <span class="text-gray-500 text-xs">- Optional fallback</span>
            </label>
            <input type="text"
                   name="icon"
                   value="{{ old('icon', $solution->icon) }}"
                   placeholder="e.g., fas fa-laptop-code"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
            <p class="text-xs text-gray-500 mt-1">Used only if no image is uploaded</p>
        </div>

        <!-- Order -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Order *</label>
            <input type="number"
                   name="order"
                   value="{{ old('order', $solution->order) }}"
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
                       {{ old('is_active', $solution->is_active) ? 'checked' : '' }}
                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active (Show on website)</span>
            </label>
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition transform hover:scale-105 font-semibold">
                <i class="fas fa-save mr-2"></i> Update Solution
            </button>
            <a href="{{ route('admin.solutions.index') }}"
               class="text-gray-600 hover:text-gray-800 transition font-medium">
                <i class="fas fa-times mr-2"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
