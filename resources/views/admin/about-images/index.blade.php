@extends('admin.layouts.app')
@section('title', 'About Images')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-display font-bold text-xl text-white">About Carousel Images</h2>
        <a href="{{ route('admin.about-images.create') }}"
            class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">+
            Upload Image</a>
    </div>

    @if($images->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($images as $img)
                <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl overflow-hidden group">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->caption }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4">
                        <p class="text-white text-sm font-medium truncate">{{ $img->caption ?? 'No caption' }}</p>
                        <p class="text-denim-500 text-xs mt-1">Order: {{ $img->sort_order }}</p>
                        <div class="flex items-center gap-2 mt-3">
                            <a href="{{ route('admin.about-images.edit', $img) }}"
                                class="px-3 py-1.5 bg-denim-700/30 text-denim-300 text-xs rounded-lg hover:bg-denim-700/50 transition-colors">Edit</a>
                            <form action="{{ route('admin.about-images.destroy', $img) }}" method="POST"
                                onsubmit="return confirm('Delete this image?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1.5 bg-red-500/10 text-red-400 text-xs rounded-lg hover:bg-red-500/20 transition-colors">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-12 text-center">
            <svg class="w-12 h-12 mx-auto text-denim-500/50 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p class="text-denim-400 mb-4">No images uploaded yet.</p>
            <a href="{{ route('admin.about-images.create') }}"
                class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">Upload
                First Image</a>
        </div>
    @endif
@endsection