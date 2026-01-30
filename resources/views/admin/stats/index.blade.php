@extends('admin.layouts.app')
@section('title', 'Stats')
@section('page-title', 'Statistics Management')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <p class="text-gray-600">Manage your statistics</p>
    <a href="{{ route('admin.stats.create') }}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition inline-flex items-center">
        <i class="fas fa-plus mr-2"></i> Add Stat
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
            @forelse($stats as $stat)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-{{ $stat->color }}-600 to-purple-600">{{ $stat->number }}</td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $stat->title }}</div>
                        <div class="text-sm text-gray-500">{{ $stat->description }}</div>
                    </td>
                    <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-semibold rounded-full bg-{{ $stat->color }}-100 text-{{ $stat->color }}-800">{{ ucfirst($stat->color) }}</span></td>
                    <td class="px-6 py-4">
                        @if($stat->is_active)
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <a href="{{ route('admin.stats.edit', $stat) }}" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.stats.destroy', $stat) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500"><i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i><p>No stats found</p></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
