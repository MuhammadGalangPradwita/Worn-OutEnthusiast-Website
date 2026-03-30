{{-- Hero Section --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background with overlay --}}
    <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-denim-900 to-navy-800">
        {{-- Denim texture pattern overlay --}}
        <div class="absolute inset-0 opacity-20"
            style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22><rect width=%2260%22 height=%2260%22 fill=%22none%22/><path d=%22M0 0L60 60M60 0L0 60%22 stroke=%22%231e3a5f%22 stroke-width=%220.5%22/></svg>'); background-size: 30px 30px;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-denim-900/50 to-denim-900"></div>
    </div>

    {{-- Decorative elements --}}
    <div class="absolute top-1/4 left-10 w-72 h-72 bg-denim-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-navy-500/10 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in-up">
            <p class="text-denim-300 text-sm md:text-base tracking-[0.3em] uppercase font-medium mb-6">
                {{ 'Kompetisi Denim Lokal' }}
            </p>
            <h1
                class="font-display font-900 text-5xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl leading-none tracking-tight mb-6">
                <span class="bg-gradient-to-r from-white via-denim-100 to-denim-300 bg-clip-text text-transparent">
                    {{ $settings['site_name'] ?? 'DENIM' }}
                </span>
            </h1>
            <p class="text-denim-200 text-lg md:text-xl lg:text-2xl font-light max-w-2xl mx-auto mb-10">
                {{ 'Kompetisi denim lokal terbesar yang mempertemukan komunitas, brand lokal dan para enthusiast dalam perjalanan fade selama 6 bulan.' }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a x-data="{ isExpired: new Date('{{ $settings['countdown_deadline'] ?? '2026-06-30 23:59:59' }}').getTime() <= new Date().getTime() }"
                    @countdown-expired.window="isExpired = true"
                    :href="isExpired ? 'javascript:void(0)' : '{{ route('register') }}'"
                    :class="isExpired ? 'px-10 py-4 bg-denim-800/50 text-denim-300/50 cursor-not-allowed font-bold text-base rounded-xl transition-all duration-300 border border-denim-600/30' : 'px-10 py-4 bg-white text-denim-900 font-bold text-base rounded-xl hover:bg-denim-100 transition-all duration-300 hover:shadow-2xl hover:shadow-white/10 hover:-translate-y-0.5'"
                    @click="if(isExpired) $event.preventDefault()"
                    x-text="isExpired ? 'Pendaftaran Ditutup' : 'Daftar Sekarang'">
                    Daftar Sekarang
                </a>
                <a href="{{ route('recap') }}"
                    class="px-10 py-4 border border-denim-400/30 text-denim-200 font-medium text-base rounded-xl hover:bg-denim-800/50 hover:border-denim-400/50 transition-all duration-300">
                    {{'Kompetisi Sebelumnya' }}
                </a>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>