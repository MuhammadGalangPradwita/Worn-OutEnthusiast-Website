@extends('admin.layouts.app')
@section('title', 'Edit Gallery Image')

@section('content')
    <div class="max-w-2xl">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.galleries.index') }}" class="text-denim-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-display font-bold text-xl text-white">Edit Gallery Image</h2>
        </div>

        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm text-denim-300 mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
            </div>
            <div>
                <label class="block text-sm text-denim-300 mb-2">Image</label>
                @if($gallery->image && str_starts_with($gallery->image, 'galleries/'))
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="" class="w-32 h-20 object-cover rounded-lg">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                    class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-denim-300 text-sm focus:outline-none focus:border-denim-400 file:bg-denim-600 file:text-white file:border-0 file:rounded file:px-3 file:py-1 file:mr-3 file:text-xs">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Category</label>
                    <select name="category_id"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                        <option value="">None</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $gallery->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                </div>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $gallery->is_featured ? 'checked' : '' }} class="rounded bg-denim-700/30 border-denim-600/30 text-denim-400 focus:ring-denim-400">
                <label for="is_featured" class="text-sm text-denim-300">Featured</label>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.galleries.index') }}"
                    class="px-6 py-2.5 border border-denim-600/30 text-denim-300 text-sm rounded-lg hover:bg-denim-700/20 transition-colors">Cancel</a>
                <button type="submit"
                    class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">Update</button>
            </div>
        </form>
    </div>
@endsection