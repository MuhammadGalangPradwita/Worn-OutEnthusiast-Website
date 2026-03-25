@props(['title' => '', 'description' => '', 'prize' => '', 'image' => null])

<div
    class="group relative w-full bg-gradient-to-br from-denim-800/80 to-navy-800/80 border border-denim-600/20 rounded-2xl overflow-hidden transition-all duration-500 hover:border-denim-400/40 hover:shadow-xl hover:shadow-denim-500/10 hover:-translate-y-1 cursor-pointer">
    @if($image)
        <div class="aspect-video overflow-hidden">
            <img src="{{ $image }}" alt="{{ $title }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
        </div>
    @else
        <div class="aspect-video bg-gradient-to-br from-denim-700/40 to-denim-600/20 flex items-center justify-center">
            <svg class="w-12 h-12 text-denim-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
    @endif
    <div class="p-6">
        <h3 class="font-display font-bold text-xl text-white mb-2 group-hover:text-denim-200 transition-colors">
            {{ $title }}
        </h3>
        @if($description)
            <p class="text-denim-300 text-sm leading-relaxed mb-4 line-clamp-2">{{ $description }}</p>
        @endif
    </div>
</div>