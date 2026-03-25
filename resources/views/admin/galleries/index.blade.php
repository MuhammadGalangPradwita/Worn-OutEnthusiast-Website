@extends('admin.layouts.app')
@section('title', 'Gallery Content')

@section('content')
    <div class="max-w-3xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">Gallery Content</h2>

        {{-- Upload Form --}}
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-5 mb-6">
            @csrf
            <h3 class="font-display font-semibold text-white mb-4 text-sm">Upload Gambar</h3>
            <div class="grid sm:grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="Judul gambar">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Image *</label>
                    <input type="file" name="image" accept="image/*" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-xs file:bg-denim-600 file:text-white">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Kategori</label>
                    <select name="category_id"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                        <option value="">Tanpa kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1"
                        class="rounded bg-denim-700/30 border-denim-600/30 text-denim-400 focus:ring-denim-400">
                    <label for="is_featured" class="text-xs text-denim-300">Featured</label>
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">
                    Upload
                </button>
            </div>
        </form>

        {{-- Image Grid --}}
        @if($galleries->count())
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @foreach($galleries as $gallery)
                    <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl overflow-hidden group relative">
                        <div class="aspect-square overflow-hidden">
                            @if($gallery->image && str_starts_with($gallery->image, 'galleries/'))
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-denim-700/30">
                                    <svg class="w-8 h-8 text-denim-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-3">
                            <p class="text-white text-xs font-medium truncate">{{ $gallery->title ?? 'Untitled' }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center gap-2">
                                    @if($gallery->is_featured)
                                        <span
                                            class="px-1.5 py-0.5 bg-gold-400/10 text-gold-400 text-[10px] rounded-full">Featured</span>
                                    @endif
                                    <span class="text-denim-500 text-[10px]">{{ $gallery->category?->name ?? '' }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                                       class="text-denim-400 hover:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST"
                                        onsubmit="return confirm('Delete this image?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-denim-800/30 border border-denim-600/10 rounded-xl p-8 text-center">
                <p class="text-denim-500 text-sm">Belum ada gambar. Upload gambar pertama di atas.</p>
            </div>
        @endif
    </div>
@endsection