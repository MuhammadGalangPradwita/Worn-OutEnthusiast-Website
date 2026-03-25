{{-- About WOE Section --}}
<x-section-wrapper id="about-woe" :dark="true">
    <div class="max-w-4xl mx-auto text-center">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Tentang Kami</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white mb-8">
            Apa itu Worn-Out Enthusiast
        </h2>

        <p class="text-denim-200 text-lg md:text-xl leading-relaxed font-light mb-10">
            Worn-Out Enthusiast adalah komunitas yang dibentuk oleh para denimheads Indonesia menjadi organisasi dalam
            langkah memperkenalkan dan mengangkat brand lokal melalui kompetisi, edukasi dan aktivitas komunitas.
        </p>

        <a href="{{ route('about') }}"
            class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-denim-500 to-denim-600 hover:from-denim-400 hover:to-denim-500 text-white font-medium rounded-full transition-all duration-300 shadow-xl shadow-denim-500/20 hover:shadow-denim-500/40 hover:-translate-y-1">
            Selengkapnya
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
</x-section-wrapper>