@extends('admin.layouts.app')
@section('title', 'Settings')
@section('page-title', 'Website Settings')
@section('content')

@if($settings->isEmpty())
    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-6">
        <h3 class="font-bold text-lg mb-2">⚠️ No Settings Found!</h3>
        <p class="mb-2">Please run migrations first:</p>
        <code class="bg-red-200 px-3 py-1 rounded">php artisan migrate</code>
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Hero Section Settings - ALWAYS OPEN -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-4">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-star mr-3"></i> Hero Section
            </h2>
        </div>
        <div class="p-8 space-y-6">
            @forelse($settings->where('group', 'hero') as $setting)
                @if($setting->key == 'hero_background_image')
                    <div class="border-2 border-blue-200 rounded-lg p-4 bg-blue-50">
                        <label class="block text-sm font-bold text-gray-800 mb-3">
                            <i class="fas fa-image text-blue-600 mr-2"></i> Background Image
                        </label>

                        @if($setting->value)
                            <div class="mb-4 p-4 bg-white rounded-lg border-2 border-gray-200">
                                <img src="{{ asset('storage/' . $setting->value) }}"
                                     alt="Hero Background"
                                     class="h-48 w-auto rounded-lg shadow-md mx-auto">
                                <p class="text-xs text-gray-600 mt-2 text-center font-semibold">✓ Current background image</p>
                            </div>
                        @else
                            <div class="mb-4 p-4 bg-gray-100 rounded-lg text-center text-gray-500">
                                <i class="fas fa-image text-4xl mb-2"></i>
                                <p class="text-sm">No image uploaded yet</p>
                            </div>
                        @endif

                        <div class="relative">
                            <input type="file"
                                   name="hero_background_image"
                                   accept="image/*"
                                   id="heroImageInput"
                                   class="block w-full text-sm text-gray-900 border-2 border-blue-300 rounded-lg cursor-pointer bg-white focus:outline-none focus:border-blue-600 file:mr-4 file:py-4 file:px-6 file:rounded-l-lg file:border-0 file:text-sm file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition">
                        </div>
                        <div class="mt-3 bg-blue-100 border border-blue-300 rounded-lg p-3">
                            <p class="text-xs text-blue-800">
                                <i class="fas fa-info-circle mr-1"></i>
                                <strong>Recommended:</strong> 1920x1080px | <strong>Max:</strong> 5MB | <strong>Formats:</strong> JPG, PNG, GIF
                            </p>
                        </div>
                    </div>
                @else
                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">
                            {{ ucwords(str_replace('_', ' ', str_replace('hero_', '', $setting->key))) }}
                        </label>
                        @if($setting->type == 'textarea')
                            <textarea name="settings[{{ $setting->key }}]"
                                      rows="3"
                                      placeholder="Enter {{ str_replace('_', ' ', str_replace('hero_', '', $setting->key)) }}..."
                                      class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none">{{ $setting->value }}</textarea>
                        @else
                            <input type="text"
                                   name="settings[{{ $setting->key }}]"
                                   value="{{ $setting->value }}"
                                   placeholder="Enter {{ str_replace('_', ' ', str_replace('hero_', '', $setting->key)) }}..."
                                   class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                        @endif
                    </div>
                @endif
            @empty
                <div class="text-center text-gray-500 py-8 bg-gray-50 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-4xl mb-4 text-yellow-500"></i>
                    <p class="font-semibold">No hero settings found!</p>
                    <p class="text-sm mt-2">Run: <code class="bg-gray-200 px-2 py-1 rounded">php artisan migrate</code></p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Vision Section Settings - ALWAYS OPEN -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-400 to-blue-600 p-4">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-eye mr-3"></i> Vision Section
            </h2>
        </div>
        <div class="p-8 space-y-6">
            @forelse($settings->where('group', 'vision') as $setting)
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-2">
                        {{ ucwords(str_replace('_', ' ', str_replace('vision_', '', $setting->key))) }}
                    </label>
                    @if($setting->type == 'textarea')
                        <textarea name="settings[{{ $setting->key }}]"
                                  rows="5"
                                  placeholder="Enter vision text..."
                                  class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none">{{ $setting->value }}</textarea>
                    @else
                        <input type="text"
                               name="settings[{{ $setting->key }}]"
                               value="{{ $setting->value }}"
                               placeholder="Enter {{ str_replace('_', ' ', str_replace('vision_', '', $setting->key)) }}..."
                               class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                    @endif
                </div>
            @empty
                <div class="text-center text-gray-500 py-8 bg-gray-50 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-4xl mb-4 text-yellow-500"></i>
                    <p class="font-semibold">No vision settings found!</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Contact Settings - ALWAYS OPEN -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-green-400 to-green-600 p-4">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-phone mr-3"></i> Contact Information
            </h2>
        </div>
        <div class="p-8 space-y-6">
            @forelse($settings->where('group', 'contact') as $setting)
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-2">
                        {{ ucwords(str_replace('_', ' ', str_replace('contact_', '', $setting->key))) }}
                    </label>
                    <input type="text"
                           name="settings[{{ $setting->key }}]"
                           value="{{ $setting->value }}"
                           placeholder="Enter {{ str_replace('_', ' ', str_replace('contact_', '', $setting->key)) }}..."
                           class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                </div>
            @empty
                <div class="text-center text-gray-500 py-8 bg-gray-50 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-4xl mb-4 text-yellow-500"></i>
                    <p class="font-semibold">No contact settings found!</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Footer Settings - ALWAYS OPEN -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-purple-400 to-purple-600 p-4">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-info-circle mr-3"></i> Footer Information
            </h2>
        </div>
        <div class="p-8 space-y-6">
            @forelse($settings->where('group', 'footer') as $setting)
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-2">
                        {{ ucwords(str_replace('_', ' ', str_replace('footer_', '', $setting->key))) }}
                    </label>
                    <input type="text"
                           name="settings[{{ $setting->key }}]"
                           value="{{ $setting->value }}"
                           placeholder="Enter {{ str_replace('_', ' ', str_replace('footer_', '', $setting->key)) }}..."
                           class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                </div>
            @empty
                <div class="text-center text-gray-500 py-8 bg-gray-50 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-4xl mb-4 text-yellow-500"></i>
                    <p class="font-semibold">No footer settings found!</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Save Button - BIG & CLEAR -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl shadow-2xl p-8 text-center sticky bottom-4">
        <button type="submit"
                class="bg-white text-blue-600 px-16 py-5 rounded-xl hover:shadow-2xl transition transform hover:scale-105 inline-flex items-center font-bold text-xl">
            <i class="fas fa-save mr-3 text-2xl"></i>
            💾 Save All Settings
        </button>
        <p class="text-white text-sm mt-3 opacity-90">
            <i class="fas fa-info-circle mr-1"></i>
            Click to save all changes (including image upload)
        </p>
    </div>
</form>
@endsection
