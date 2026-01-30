@extends('admin.layouts.app')
@section('title', 'Principles')
@section('page-title', 'Principles Management')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <p class="text-gray-600">Manage your company principles</p>
    <a href="{{ route('admin.principles.create') }}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition inline-flex items-center">
        <i class="fas fa-plus mr-2"></i> Add Principle
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Number</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Color</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($principles as $principle)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-{{ $principle->color }}-500 to-{{ $principle->color }}-600 rounded-full flex items-center justify-center text-white font-bold">
                            {{ $principle->number }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium">{{ $principle->title }}</td>
                    <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-semibold rounded-full bg-{{ $principle->color }}-100 text-{{ $principle->color }}-800">{{ ucfirst($principle->color) }}</span></td>
                    <td class="px-6 py-4">
                        @if($principle->is_active)
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <a href="{{ route('admin.principles.edit', $principle) }}" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.principles.destroy', $principle) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500"><i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i><p>No principles found</p></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
