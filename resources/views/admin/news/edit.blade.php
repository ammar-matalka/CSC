@extends('admin.layouts.app')

@section('title', isset($news) ? 'Edit News' : 'Create News')
@section('page-title', isset($news) ? 'Edit News' : 'Create News')

@section('content')
<div class="max-w-4xl">
    <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg p-8">
        @csrf
        @if(isset($news))
            @method('PUT')
        @endif
        
        <!-- Title -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
            <input type="text" 
                   name="title" 
                   value="{{ old('title', $news->title ?? '') }}"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   required>
        </div>
        
        <!-- Excerpt -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Short Description (Excerpt) *</label>
            <textarea name="excerpt" 
                      rows="3"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none"
                      required>{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Brief summary shown in cards (max 150 characters recommended)</p>
        </div>
        
        <!-- Content -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Full Content *</label>
            <textarea name="content" 
                      rows="10"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none"
                      required>{{ old('content', $news->content ?? '') }}</textarea>
        </div>
        
        <!-- Image -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
            
            @if(isset($news) && $news->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $news->image) }}" 
                         alt="{{ $news->title }}" 
                         class="h-32 w-auto border border-gray-300 rounded-lg">
                    <p class="text-xs text-gray-500 mt-2">Current image</p>
                </div>
            @endif
            
            <input type="file" 
                   name="image" 
                   accept="image/*"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
            <p class="text-xs text-gray-500 mt-1">Supported formats: JPG, PNG (Max: 2MB)</p>
        </div>
        
        <!-- Published Date -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Published Date *</label>
            <input type="date" 
                   name="published_at" 
                   value="{{ old('published_at', isset($news) ? $news->published_at->format('Y-m-d') : date('Y-m-d')) }}"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                   required>
        </div>
        
        <!-- Active Status -->
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" 
                       name="is_active" 
                       value="1"
                       {{ old('is_active', $news->is_active ?? true) ? 'checked' : '' }}
                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active (Show on website)</span>
            </label>
        </div>
        
        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition">
                {{ isset($news) ? 'Update' : 'Publish' }} News
            </button>
            <a href="{{ route('admin.news.index') }}" 
               class="text-gray-600 hover:text-gray-800 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
