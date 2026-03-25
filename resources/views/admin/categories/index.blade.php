@extends('admin.layouts.app')
@section('title', 'Manage Categories')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-display font-bold text-xl text-white">Categories</h2>
        <a href="{{ route('admin.categories.create') }}"
            class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">+
            Add Category</a>
    </div>

    <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-denim-700/30">
                    <th class="text-left px-6 py-4 text-denim-400 font-medium">#</th>
                    <th class="text-left px-6 py-4 text-denim-400 font-medium">Name</th>
                    <th class="text-left px-6 py-4 text-denim-400 font-medium hidden md:table-cell">Prize</th>
                    <th class="text-left px-6 py-4 text-denim-400 font-medium">Status</th>
                    <th class="text-right px-6 py-4 text-denim-400 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-b border-denim-700/20 hover:bg-denim-700/10 transition-colors">
                        <td class="px-6 py-4 text-denim-300">{{ $category->sort_order }}</td>
                        <td class="px-6 py-4 text-white font-medium">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-gold-400 hidden md:table-cell">{{ is_numeric($category->prize) ? 'Rp ' . number_format($category->prize, 0, ',', '.') : $category->prize }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 rounded-full text-xs {{ $category->is_active ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="px-3 py-1.5 bg-denim-700/30 text-denim-300 text-xs rounded-lg hover:bg-denim-700/50 transition-colors">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 bg-red-500/10 text-red-400 text-xs rounded-lg hover:bg-red-500/20 transition-colors">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-denim-400">No categories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection