@extends('admin.layouts.app')
@section('title', 'Edit Image')

@section('content')
    <div class="max-w-2xl">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.about-images.index') }}" class="text-denim-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-display font-bold text-xl text-white">Edit Image</h2>
        </div>

        <form action="{{ route('admin.about-images.update', $about_image) }}" method="POST" enctype="multipart/form-data"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm text-denim-300 mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $about_image->image_path) }}" alt="{{ $about_image->caption }}"
                    class="w-48 h-32 object-cover rounded-lg mb-3">
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Replace Image</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-denim-600 file:text-white">
                <p class="text-denim-500 text-xs mt-1">Leave empty to keep current image.</p>
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Caption</label>
                <input type="text" name="caption" value="{{ old('caption', $about_image->caption) }}"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $about_image->sort_order) }}"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.about-images.index') }}"
                    class="px-6 py-2.5 border border-denim-600/30 text-denim-300 text-sm rounded-lg hover:bg-denim-700/20 transition-colors">Cancel</a>
                <button type="submit"
                    class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">Update</button>
            </div>
        </form>
    </div>
@endsection