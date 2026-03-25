@extends('admin.layouts.app')
@section('title', 'Add Category')

@section('content')
    <div class="max-w-2xl">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.categories.index') }}" class="text-denim-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-display font-bold text-xl text-white">Add Category</h2>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-5">
            @csrf
            <div>
                <label class="block text-sm text-denim-300 mb-2">Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Description</label>
                <textarea name="description" rows="3"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors resize-none">{{ old('description') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Prize (Rp)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-denim-400 text-sm">Rp</span>
                        <input type="number" name="prize" value="{{ old('prize') }}" min="0"
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg pl-10 pr-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="15000000">
                    </div>
                </div>
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                </div>
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Image</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-denim-300 text-sm focus:outline-none focus:border-denim-400 file:bg-denim-600 file:text-white file:border-0 file:rounded file:px-3 file:py-1 file:mr-3 file:text-xs">
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked
                    class="rounded bg-denim-700/30 border-denim-600/30 text-denim-400 focus:ring-denim-400">
                <label for="is_active" class="text-sm text-denim-300">Active</label>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.categories.index') }}"
                    class="px-6 py-2.5 border border-denim-600/30 text-denim-300 text-sm rounded-lg hover:bg-denim-700/20 transition-colors">Cancel</a>
                <button type="submit"
                    class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">Save
                    Category</button>
            </div>
        </form>
    </div>
@endsection