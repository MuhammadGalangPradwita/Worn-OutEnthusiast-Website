@extends('admin.layouts.app')
@section('title', 'About Content')

@section('content')
    <div class="max-w-2xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">About Section Content</h2>

        <form action="{{ route('admin.content.about.update') }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            {{-- Title & Main Text --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Title</label>
                    <input type="text" name="about_title" value="{{ old('about_title', $settings['about_title']) }}"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="The World's Premier Denim Competition">
                </div>
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Main Text</label>
                    <textarea name="about_text" rows="4"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors resize-none">{{ old('about_text', $settings['about_text']) }}</textarea>
                </div>
            </div>

            {{-- Visi --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Visi
                </h3>
                <div>
                    <textarea name="about_visi" rows="2"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors resize-none"
                        placeholder="Membangun ekosistem komunitas...">{{ old('about_visi', $settings['about_visi'] ?? '') }}</textarea>
                </div>
            </div>

            {{-- Misi --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    Misi
                </h3>
                <div>
                    <label class="block text-sm text-denim-400 mb-2">Tulis satu item per baris</label>
                    <textarea name="about_misi" rows="5"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors resize-none"
                        placeholder="Memperkenalkan brand lokal kepada masyarakat luas&#10;Mengedukasi tentang denim&#10;...">{{ old('about_misi', $settings['about_misi'] ?? '') }}</textarea>
                </div>
            </div>

            {{-- Komunitas --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Komunitas
                </h3>
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Kalimat intro</label>
                    <input type="text" name="about_komunitas_intro"
                        value="{{ old('about_komunitas_intro', $settings['about_komunitas_intro'] ?? '') }}"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="Worn-Out Enthusiast terdiri dari berbagai latar belakang :">
                </div>
                <div>
                    <label class="block text-sm text-denim-400 mb-2">Daftar komunitas (satu item per baris)</label>
                    <textarea name="about_komunitas" rows="4"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors resize-none"
                        placeholder="Denimheads&#10;Fashion Enthusiast&#10;Brand lokal&#10;Content creator">{{ old('about_komunitas', $settings['about_komunitas'] ?? '') }}</textarea>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">
                    Save About Content
                </button>
            </div>
        </form>

        {{-- Carousel Images --}}
        <div class="mt-10">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Carousel Images
                </h3>
            </div>

            {{-- Upload Form --}}
            <form action="{{ route('admin.about-images.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-5 mb-4">
                @csrf
                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3">
                    <div class="flex-1 w-full">
                        <label class="block text-sm text-denim-300 mb-2">Upload Image</label>
                        <input type="file" name="image" accept="image/*" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:bg-denim-600 file:text-white">
                    </div>
                    <div class="flex-1 w-full">
                        <label class="block text-sm text-denim-300 mb-2">Caption</label>
                        <input type="text" name="caption" placeholder="Optional caption"
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                    </div>
                    <div class="w-20">
                        <label class="block text-sm text-denim-300 mb-2">Order</label>
                        <input type="number" name="sort_order" value="0"
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors whitespace-nowrap">
                        Upload
                    </button>
                </div>
                <p class="text-denim-500 text-xs mt-2">Max 5MB. JPG, PNG, or WebP.</p>
            </form>

            {{-- Image Grid --}}
            @if($images->count())
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach($images as $img)
                        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl overflow-hidden group relative">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->caption }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-3">
                                <p class="text-white text-xs font-medium truncate">{{ $img->caption ?? 'No caption' }}</p>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-denim-500 text-xs">Order: {{ $img->sort_order }}</span>
                                    <form action="{{ route('admin.about-images.destroy', $img) }}" method="POST"
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
                    @endforeach
                </div>
            @else
                <div class="bg-denim-800/30 border border-denim-600/10 rounded-xl p-8 text-center">
                    <p class="text-denim-500 text-sm">Belum ada gambar. Upload gambar pertama di atas.</p>
                </div>
            @endif
        </div>
    </div>
@endsection