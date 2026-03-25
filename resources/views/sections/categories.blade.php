{{-- Categories Section --}}
<x-section-wrapper id="categories">
    <div class="text-center mb-12">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Event Berlangsung</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white mb-6">
            Worn-Out Battle VOL II
        </h2>
        <p class="text-denim-300 max-w-4xl mx-auto leading-relaxed">
            Worn-Out Battle VOL II adalah kompetisi kedua yang diselenggarakan oleh Worn-Out Enthusiast.
            Kompetisi ini berlangsung selama 6 bulan dengan sistem dokumentasi penggunaan produk secara berkala. Kompetisi ini bertujuan untuk merayakan kecintaan terhadap produk denim lokal, sekaligus menantang para peserta untuk menunjukkan kreativitas dan gaya personal mereka melalui berbagai brand denim berbentuk celana jeans. Dalam kompetisi ini, peserta akan dinilai berdasarkan point yang telah disepakati oleh pihak Wornout Enthusiast yang kemudian disepakati oleh juri.Denim Battle Lokal Indonesia tidak hanya menjadi ajang unjuk kebolehan, tetapi juga sebagai wadah untuk mengapresiasi kualitas produk denim lokal serta menginspirasi para peserta dan penonton untuk semakin mencintai produk-produk buatan dalam negeri.
        </p>
    </div>

    {{-- Category Cards + Modal --}}
    <div x-data="{ open: false, selected: null }" class="mb-12">
        <div class="text-center mb-12">
            <p class="text-white text-sm tracking-[0.2em] uppercase font-bold mb-4">Kategori event</p>
        </div>
        <div class="flex flex-wrap justify-center gap-8 max-w-6xl mx-auto px-4">
            @forelse($categories as $index => $category)
                @php
                    $prizeFormatted = is_numeric($category->prize) ? 'Rp ' . number_format($category->prize, 0, ',', '.') : $category->prize;
                    $catImage = $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1542272604-787c3835535d?q=80&w=800';
                @endphp
                    <div class="group bg-[#0B1221] rounded-[2rem] border border-denim-700/20 overflow-hidden hover:-translate-y-2 transition-all duration-500 relative cursor-pointer shadow-2xl w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] max-w-[400px]"
                        @click="selected = {{ json_encode([
                            'name' => $category->name,
                            'description' => $category->description,
                            'prize' => $prizeFormatted,
                            'image' => $catImage,
                        ]) }}; open = true">
                        
                        <div class="aspect-square relative overflow-hidden">
                            <img src="{{ $catImage }}" alt="{{ $category->name }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">

                            {{-- Subtle Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0B1221] via-transparent to-transparent opacity-60"></div>

                            {{-- View Details Overlay --}}
                            <div class="absolute inset-0 bg-navy-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center pointer-events-none">
                                <span class="text-white font-medium flex items-center gap-2 bg-navy-900/60 px-4 py-2 rounded-full backdrop-blur-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    Detail Event
                                </span>
                            </div>
                        </div>

                        <div class="p-8 relative text-left">
                            <h3 class="font-display font-bold text-2xl text-white mb-2 group-hover:text-denim-200 transition-colors tracking-tight">{{ $category->name }}</h3>
                            <p class="text-denim-400 text-base mb-4">
                                Total Hadiah <span class="text-gold-400 font-bold ml-1">{{ $prizeFormatted }}</span>
                            </p>
                        </div>
                    </div>
            @empty
                <div class="w-full text-center text-denim-400 py-24 bg-navy-900/50 rounded-3xl border border-denim-800/30">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <p class="text-xl font-display uppercase tracking-widest">Belum ada kategori tersedia</p>
                </div>
            @endforelse
        </div>

        {{-- Modal Popup --}}
        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click.self="open = false" @keydown.escape.window="open = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">

            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="relative w-full max-w-lg bg-gradient-to-br from-denim-800 to-navy-800 border border-denim-600/30 rounded-2xl overflow-hidden shadow-2xl">

                {{-- Close --}}
                <button @click="open = false"
                    class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-black/30 hover:bg-black/50 text-white flex items-center justify-center transition-colors backdrop-blur-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- Image --}}
                <template x-if="selected?.image">
                    <div class="aspect-video overflow-hidden">
                        <img :src="selected.image" :alt="selected.name" class="w-full h-full object-cover">
                    </div>
                </template>
                <template x-if="!selected?.image">
                    <div
                        class="aspect-video bg-gradient-to-br from-denim-700/40 to-denim-600/20 flex items-center justify-center">
                        <svg class="w-16 h-16 text-denim-500/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </template>

                {{-- Content --}}
                <div class="p-6">
                    <h3 class="font-display font-bold text-2xl text-white mb-3" x-text="selected?.name"></h3>
                    <p class="text-denim-300 leading-relaxed mb-4" x-text="selected?.description"></p>
                    <template x-if="selected?.prize">
                        <div class="pt-4 border-t border-denim-600/30">
                            <span class="text-denim-400 text-sm">Total Prize</span>
                            <p class="text-gold-400 font-display font-bold text-2xl" x-text="selected?.prize"></p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    {{-- Sistem Kompetisi --}}

    <div class="text-center mb-12">
        <p class="text-white text-sm tracking-[0.2em] uppercase font-bold text-center mb-4">Sistem Kompetisi
        </p>
        <div class="flex flex-col items-center">
            <p class="text-denim-300 mb-6 leading-relaxed">Peserta diwajibkan untuk:</p>
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-denim-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="text-denim-400 font-bold text-sm">1</span>
                    </div>
                    <p class="text-denim-200 leading-relaxed text-left">Memakai produk selama periode kompetisi</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-denim-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="text-denim-400 font-bold text-sm">2</span>
                    </div>
                    <p class="text-denim-200 leading-relaxed text-left">Dokumentasi progres fade</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-denim-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="text-denim-400 font-bold text-sm">3</span>
                    </div>
                    <p class="text-denim-200 leading-relaxed text-left">Melakukan submission setiap bulan</p>
                </div>
            </div>
        </div>
        <div class="mt-8 pt-6 border-t border-denim-600/30 text-center">
            <p class="text-denim-300 text-sm leading-relaxed italic">
                Penilaian dilakukan oleh tim juri berdasarkan karakter fade dan keunikan penggunaan.
            </p>
        </div>
    </div>

</x-section-wrapper>