{{-- Countdown Section --}}
<section id="countdown" class="py-12 md:py-16 bg-gradient-to-b from-denim-900 to-navy-800/50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center"
        x-data="countdown('{{ $settings['countdown_deadline'] ?? '2026-06-30 23:59:59' }}')" x-init="startCountdown()">

        <p class="text-denim-300 text-sm tracking-[0.2em] uppercase font-medium mb-8">Jangka Waktu Pendaftaran</p>

        {{-- Timer display --}}
        <div x-show="!expired" class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-2xl mx-auto">
            <div class="bg-denim-800/60 border border-denim-600/20 rounded-2xl p-4 md:p-6 backdrop-blur-sm">
                <div class="font-display font-bold text-4xl md:text-5xl text-white" x-text="days">00</div>
                <div class="text-denim-400 text-xs md:text-sm uppercase tracking-wider mt-2">Days</div>
            </div>
            <div class="bg-denim-800/60 border border-denim-600/20 rounded-2xl p-4 md:p-6 backdrop-blur-sm">
                <div class="font-display font-bold text-4xl md:text-5xl text-white" x-text="hours">00</div>
                <div class="text-denim-400 text-xs md:text-sm uppercase tracking-wider mt-2">Hours</div>
            </div>
            <div class="bg-denim-800/60 border border-denim-600/20 rounded-2xl p-4 md:p-6 backdrop-blur-sm">
                <div class="font-display font-bold text-4xl md:text-5xl text-white" x-text="minutes">00</div>
                <div class="text-denim-400 text-xs md:text-sm uppercase tracking-wider mt-2">Minutes</div>
            </div>
            <div class="bg-denim-800/60 border border-denim-600/20 rounded-2xl p-4 md:p-6 backdrop-blur-sm">
                <div class="font-display font-bold text-4xl md:text-5xl text-white" x-text="seconds">00</div>
                <div class="text-denim-400 text-xs md:text-sm uppercase tracking-wider mt-2">Seconds</div>
            </div>
        </div>

        {{-- Expired message --}}
        <div x-show="expired" x-transition class="py-8">
            <div class="inline-flex items-center gap-3 bg-red-500/10 border border-red-500/30 rounded-2xl px-8 py-4">
                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-red-300 font-display font-bold text-xl">Pendaftaran Telah Ditutup</span>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        function countdown(deadline) {
            return {
                days: '00',
                hours: '00',
                minutes: '00',
                seconds: '00',
                expired: false,
                interval: null,
                startCountdown() {
                    const target = new Date(deadline).getTime();
                    this.interval = setInterval(() => {
                        const now = new Date().getTime();
                        const diff = target - now;
                        if (diff <= 0) {
                            this.expired = true;
                            clearInterval(this.interval);
                            return;
                        }
                        this.days = String(Math.floor(diff / (1000 * 60 * 60 * 24))).padStart(2, '0');
                        this.hours = String(Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                        this.minutes = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                        this.seconds = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');
                    }, 1000);
                }
            };
        }
    </script>
@endpush