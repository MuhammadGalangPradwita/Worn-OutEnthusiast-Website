{{-- Gallery Section --}}
<x-section-wrapper id="gallery" :dark="true">
    <div class="text-center mb-12">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Galler event berlangsung</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white mb-6">
            Galeri Kompetisi
        </h2>
    </div>

    {{-- Gallery Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse($galleries as $gallery)
            <div
                class="gallery-zoom group relative aspect-square rounded-xl overflow-hidden bg-gradient-to-br from-denim-700/40 to-denim-600/20 cursor-pointer">
                @if($gallery->image && str_starts_with($gallery->image, 'galleries/'))
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery' }}"
                        class="w-full h-full object-cover" loading="lazy">
                @else
                    <div
                        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-denim-800 via-denim-700 to-navy-700">
                        <svg class="w-10 h-10 text-denim-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                {{-- Overlay --}}
                <div
                    class="absolute inset-0 bg-gradient-to-t from-denim-900/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                    <div class="p-4">
                        <p class="text-white font-medium text-sm">{{ $gallery->title ?? 'Untitled' }}</p>
                        @if($gallery->category)
                            <p class="text-denim-300 text-xs">{{ $gallery->category->name }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-denim-400 py-12">
                Gallery akan diupdate dengan dokumentasi kompetisi.
            </div>
        @endforelse
    </div>
</x-section-wrapper>