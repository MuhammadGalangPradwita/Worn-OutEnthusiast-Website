@extends('admin.layouts.app')
@section('title', 'Add Milestone')

@section('content')
    <div class="max-w-2xl">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.timelines.index') }}" class="text-denim-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-display font-bold text-xl text-white">Add Milestone</h2>
        </div>

        <form action="{{ route('admin.timelines.store') }}" method="POST"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-5">
            @csrf
            <div>
                <label class="block text-sm text-denim-300 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                    placeholder="e.g. Open Registration">
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Date *</label>
                <input type="text" name="date" value="{{ old('date') }}" required
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                    placeholder="e.g. March 1, 2026">
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                    class="rounded bg-denim-700/30 border-denim-600/30 text-denim-400 focus:ring-denim-400">
                <label for="is_active" class="text-sm text-denim-300">Active / Already Passed</label>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.timelines.index') }}"
                    class="px-6 py-2.5 border border-denim-600/30 text-denim-300 text-sm rounded-lg hover:bg-denim-700/20 transition-colors">Cancel</a>
                <button type="submit"
                    class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">Save</button>
            </div>
        </form>
    </div>
@endsection