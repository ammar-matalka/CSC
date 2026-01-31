@extends('admin.layouts.app')

@section('title', 'Partners')
@section('page-title', 'Partners Management')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <p class="text-gray-600">Manage your partner logos</p>
    <a href="{{ route('admin.partners.create') }}"
       class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition inline-flex items-center">
        <i class="fas fa-plus mr-2"></i> Add Partner Logo
    </a>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
    @forelse($partners as $partner)
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
            <!-- Logo -->
            <div class="aspect-square p-6 flex items-center justify-center bg-gray-50">
                <img src="{{ asset('storage/' . $partner->logo) }}"
                     alt="Partner {{ $partner->id }}"
                     class="max-w-full max-h-full object-contain">
            </div>

            <!-- Info -->
            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center justify-center mb-3">
                    @if($partner->is_active)
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    @else
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between gap-2">
                    <a href="{{ route('admin.partners.edit', $partner) }}"
                       class="flex-1 text-center bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-lg transition text-sm font-medium">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.partners.destroy', $partner) }}"
                          method="POST"
                          class="flex-1"
                          onsubmit="return confirm('Delete this partner logo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-50 text-red-600 hover:bg-red-100 px-3 py-2 rounded-lg transition text-sm font-medium">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 bg-white rounded-2xl shadow-lg">
            <i class="fas fa-image text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 font-medium">No partner logos yet</p>
            <a href="{{ route('admin.partners.create') }}" class="text-blue-600 hover:text-blue-700 mt-2 inline-block font-medium">
                <i class="fas fa-plus mr-1"></i> Upload your first logo
            </a>
        </div>
    @endforelse
</div>
@endsection
