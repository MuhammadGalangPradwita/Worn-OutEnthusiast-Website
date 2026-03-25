{{-- Leaderboard Section --}}
<x-section-wrapper id="leaderboard">
    <div class="text-center mb-12">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Battle Progress</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white mb-4">
            Leaderboard
        </h2>
        <p class="text-denim-300 max-w-2xl mx-auto">
            Perkembangan peserta selama battle. Leaderboard diupdate setiap bulan.
        </p>
    </div>

    {{-- Tabs with Alpine --}}
    <div x-data="{ tab: 'top_monthly' }" class="max-w-4xl mx-auto">
        {{-- Tab Buttons --}}
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button @click="tab = 'top_monthly'"
                :class="tab === 'top_monthly' ? 'bg-denim-500 text-white border-denim-500' : 'bg-transparent text-denim-300 border-denim-600/30 hover:border-denim-400'"
                class="px-5 py-2.5 rounded-full text-sm font-medium border transition-all duration-300 flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M5 16L3 5L8.5 10L12 4L15.5 10L21 5L19 16H5M19 19C19 19.6 18.6 20 18 20H6C5.4 20 5 19.6 5 19V18H19V19Z" />
                </svg>
                Top Peserta
            </button>
            <button @click="tab = 'top_fade'"
                :class="tab === 'top_fade' ? 'bg-denim-500 text-white border-denim-500' : 'bg-transparent text-denim-300 border-denim-600/30 hover:border-denim-400'"
                class="px-5 py-2.5 rounded-full text-sm font-medium border transition-all duration-300 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
                Top Fade Ranking
            </button>
            <button @click="tab = 'best_story'"
                :class="tab === 'best_story' ? 'bg-denim-500 text-white border-denim-500' : 'bg-transparent text-denim-300 border-denim-600/30 hover:border-denim-400'"
                class="px-5 py-2.5 rounded-full text-sm font-medium border transition-all duration-300 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Best Story
            </button>
        </div>

        {{-- Top Monthly --}}
        <div x-show="tab === 'top_monthly'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            @if($leaderboard['top_monthly']->count())
                <div class="space-y-3">
                    @foreach($leaderboard['top_monthly'] as $entry)
                        @include('sections.partials.leaderboard-card', ['entry' => $entry])
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 text-denim-400">
                    <p>Belum ada data untuk kategori ini.</p>
                </div>
            @endif
        </div>

        {{-- Top Fade --}}
        <div x-show="tab === 'top_fade'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            @if($leaderboard['top_fade']->count())
                <div class="space-y-3">
                    @foreach($leaderboard['top_fade'] as $entry)
                        @include('sections.partials.leaderboard-card', ['entry' => $entry])
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 text-denim-400">
                    <p>Belum ada data untuk kategori ini.</p>
                </div>
            @endif
        </div>

        {{-- Best Story --}}
        <div x-show="tab === 'best_story'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            @if($leaderboard['best_story']->count())
                <div class="space-y-3">
                    @foreach($leaderboard['best_story'] as $entry)
                        @include('sections.partials.leaderboard-card', ['entry' => $entry])
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 text-denim-400">
                    <p>Belum ada data untuk kategori ini.</p>
                </div>
            @endif
        </div>
    </div>
</x-section-wrapper>