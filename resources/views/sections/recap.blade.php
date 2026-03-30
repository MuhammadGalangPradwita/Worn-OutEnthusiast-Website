{{-- Highlights & Recap Section --}}
<x-section-wrapper id="recap">
    <div class="grid md:grid-cols-2 gap-6 lg:gap-12 max-w-7xl mx-auto">

        {{-- Left Column: Battle VOL II Info --}}
        <div
            class="bg-gradient-to-br from-denim-800/80 to-navy-800/80 border border-denim-600/20 rounded-3xl p-6 md:p-8 lg:p-12 relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-denim-500/10 rounded-full blur-3xl group-hover:bg-denim-400/20 transition-all duration-700">
            </div>

            <div class="relative z-10">
                <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Highlight Event</p>
                <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-8">Battle VOL II</h2>

                <div class="space-y-4 mb-8">
                    <div class="flex items-center gap-3 border-b border-denim-700/50 pb-4">
                        <div
                            class="w-10 h-10 rounded-full bg-denim-700/50 flex items-center justify-center text-denim-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-denim-400 text-xs uppercase tracking-wider">Durasi</p>
                            <p class="text-white font-medium">6 Bulan</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 border-b border-denim-700/50 pb-4">
                        <div
                            class="w-10 h-10 rounded-full bg-denim-700/50 flex items-center justify-center text-denim-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-denim-400 text-xs uppercase tracking-wider">Sistem</p>
                            <p class="text-white font-medium">Online Competition</p>
                        </div>
                    </div>
                
                    <div class="flex items-center gap-3 pb-2">
                        <div
                            class="w-10 h-10 rounded-full bg-denim-700/50 flex items-center justify-center text-denim-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-denim-400 text-xs uppercase tracking-wider">Kategori</p>
                            <p class="text-white font-medium">Non-Selvedge Denim</p>
                        </div>
                    </div>
                </div>

                <p class="text-denim-300 leading-relaxed font-light mb-8">
                    Battle 2026 berfokus pada kategori Non-Selvedge yang diselenggarakan oleh Worn-Out Enthusiast
                    sebagai penyelenggara utama. Para peserta dapat mengikuti battle selama 6 bulan, dengan ketentuan
                    para peserta wajib mematuhi peraturan yang telah disusun dan disepakati oleh pihak Worn-Out
                    Enthusiast bersama Tim penilai. Kompetisi ini diselenggarakan secara online.
                </p>

                <a x-data="{ isExpired: new Date('{{ $settings['countdown_deadline'] ?? '2026-06-30 23:59:59' }}').getTime() <= new Date().getTime() }"
                    @countdown-expired.window="isExpired = true"
                    :href="isExpired ? 'javascript:void(0)' : '{{ route('register') }}'"
                    :class="isExpired ? 'inline-flex items-center gap-2 px-8 py-3 bg-denim-800/50 text-denim-300/50 cursor-not-allowed font-bold rounded-2xl transition-all duration-300 border border-denim-600/30' : 'inline-flex items-center gap-2 px-8 py-3 bg-white text-denim-900 font-bold rounded-2xl transition-all duration-300 shadow-xl shadow-white/10 hover:bg-denim-100 hover:-translate-y-1'"
                    @click="if(isExpired) $event.preventDefault()">
                    <span x-text="isExpired ? 'Pendaftaran Ditutup' : 'Daftar Sekarang'">Daftar Sekarang</span>
                    <svg x-show="!isExpired" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Right Column: RECAP VOL I Info --}}
        <div
            class="bg-gradient-to-br from-navy-800/80 to-denim-900/80 border border-denim-600/20 rounded-3xl p-6 md:p-8 lg:p-12 relative overflow-hidden group flex flex-col justify-between">
            <div
                class="absolute bottom-0 left-0 w-64 h-64 bg-denim-600/10 rounded-full blur-3xl group-hover:bg-denim-500/20 transition-all duration-700">
            </div>

            <div class="relative z-10 block">
                <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Kompetisi Sebelumnya</p>
                <h2 class="font-display font-bold text-3xl md:text-4xl text-white mt-2 mb-6">RECAP VOL I</h2>

                <p class="text-denim-200 text-lg leading-relaxed mb-10">
                    Denim battle pertama di Indonesia yang berfokus pada brand lokal.
                </p>

                <h3 class="text-white font-medium text-lg mb-6 border-b border-denim-700/50 pb-2">Highlight VOL I:</h3>

                <ul class="space-y-5 mb-10">
                    <li class="flex items-start gap-4">
                        <div
                            class="mt-1 w-6 h-6 rounded-full bg-denim-500/20 flex items-center justify-center flex-shrink-0 text-denim-300">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-denim-200"><strong>91 Peserta</strong> terpilih dari seluruh Indonesia</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="mt-1 w-6 h-6 rounded-full bg-denim-500/20 flex items-center justify-center flex-shrink-0 text-denim-300">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-denim-200">Berlangsung selama <strong>Januari - Oktober 2025</strong></span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="mt-1 w-6 h-6 rounded-full bg-denim-500/20 flex items-center justify-center flex-shrink-0 text-denim-300">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-denim-200">Mencapai <strong>Ribuan views</strong> konten peserta</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="mt-1 w-6 h-6 rounded-full bg-denim-500/20 flex items-center justify-center flex-shrink-0 text-denim-300">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-denim-200">Diikuti oleh komunitas dari <strong>berbagai daerah
                                Indonesia</strong></span>
                    </li>
                </ul>
            </div>

            <div class="relative z-10 pt-6">
                <a href="{{ route('recap') }}"
                    class="inline-flex items-center justify-center gap-2 px-8 py-3 border border-denim-500/50 text-white font-medium rounded-2xl transition-all duration-300 hover:bg-denim-800/60 hover:border-denim-400/80 bg-denim-900/40 backdrop-blur-sm">
                    Lihat recap lengkap
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
</x-section-wrapper>