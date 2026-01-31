@extends('admin.layouts.app')

@section('title', 'Solutions')
@section('page-title', 'Solutions Management')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <p class="text-gray-600">Manage your business solutions</p>
    <a href="{{ route('admin.solutions.create') }}"
       class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition inline-flex items-center">
        <i class="fas fa-plus mr-2"></i> Add Solution
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
    <tr>
        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Features</th>
        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
    </tr>
</thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($solutions as $solution)
                <tr class="hover:bg-gray-50 transition">
    <td class="px-6 py-4 whitespace-nowrap">
        @if($solution->image)
            <img src="{{ asset('storage/' . $solution->image) }}"
                 alt="{{ $solution->title }}"
                 class="h-16 w-24 object-cover rounded-lg">
        @else
            <div class="h-16 w-24 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                <i class="fas fa-image text-gray-400"></i>
            </div>
        @endif
    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $solution->title }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($solution->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        {{ is_array($solution->features) ? count($solution->features) : 0 }} features
                    </td>
                    <td class="px-6 py-4">
                        @if($solution->is_active)
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <a href="{{ route('admin.solutions.edit', $solution) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.solutions.destroy', $solution) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                        <p>No solutions found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
