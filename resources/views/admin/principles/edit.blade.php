@extends('admin.layouts.app')
@section('title', isset($principle) ? 'Edit Principle' : 'Create Principle')
@section('page-title', isset($principle) ? 'Edit Principle' : 'Create Principle')
@section('content')
<div class="max-w-3xl">
    <form action="{{ isset($principle) ? route('admin.principles.update', $principle) : route('admin.principles.store') }}" method="POST" class="bg-white rounded-2xl shadow-lg p-8">
        @csrf
        @if(isset($principle)) @method('PUT') @endif
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title', $principle->title ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none">{{ old('description', $principle->description ?? '') }}</textarea>
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Number *</label>
            <input type="number" name="number" value="{{ old('number', $principle->number ?? 1) }}" min="1" max="10" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Color *</label>
            <select name="color" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
                <option value="blue" {{ old('color', $principle->color ?? '') == 'blue' ? 'selected' : '' }}>Blue</option>
                <option value="purple" {{ old('color', $principle->color ?? '') == 'purple' ? 'selected' : '' }}>Purple</option>
                <option value="pink" {{ old('color', $principle->color ?? '') == 'pink' ? 'selected' : '' }}>Pink</option>
                <option value="green" {{ old('color', $principle->color ?? '') == 'green' ? 'selected' : '' }}>Green</option>
                <option value="yellow" {{ old('color', $principle->color ?? '') == 'yellow' ? 'selected' : '' }}>Yellow</option>
                <option value="red" {{ old('color', $principle->color ?? '') == 'red' ? 'selected' : '' }}>Red</option>
            </select>
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Order *</label>
            <input type="number" name="order" value="{{ old('order', $principle->order ?? 0) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
        </div>
        
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $principle->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-200">
                <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
            </label>
        </div>
        
        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition">
                {{ isset($principle) ? 'Update' : 'Create' }} Principle
            </button>
            <a href="{{ route('admin.principles.index') }}" class="text-gray-600 hover:text-gray-800 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
