{{-- Leaderboard Entry Card --}}
<div
    class="group flex items-center gap-4 bg-gradient-to-r from-denim-800/60 to-navy-800/60 border border-denim-600/20 rounded-xl p-5 transition-all duration-300 hover:border-denim-500/30 hover:shadow-lg hover:shadow-denim-500/5">
    {{-- Rank Badge --}}
    <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center font-display font-bold text-lg
        {{ $entry->rank === 1 ? 'bg-gradient-to-br from-gold-400/30 to-gold-500/10 text-gold-400 ring-2 ring-gold-400/30' :
    ($entry->rank === 2 ? 'bg-gradient-to-br from-gray-300/20 to-gray-400/10 text-gray-300 ring-2 ring-gray-400/20' :
        ($entry->rank === 3 ? 'bg-gradient-to-br from-amber-600/20 to-amber-700/10 text-amber-500 ring-2 ring-amber-500/20' :
            'bg-denim-700/40 text-denim-300')) }}">
        #{{ $entry->rank }}
    </div>

    {{-- Avatar --}}
    @if($entry->image_path)
        <img src="{{ asset('storage/' . $entry->image_path) }}" alt="{{ $entry->participant_name }}"
            class="w-12 h-12 rounded-full object-cover flex-shrink-0 ring-2 ring-denim-600/30 group-hover:ring-denim-500/50 transition-all">
    @else
        <div class="w-12 h-12 rounded-full bg-denim-700/50 flex items-center justify-center flex-shrink-0">
            <span class="text-denim-300 font-bold text-lg">{{ strtoupper(substr($entry->participant_name, 0, 1)) }}</span>
        </div>
    @endif

    {{-- Info --}}
    <div class="flex-1 min-w-0">
        <h4 class="font-display font-bold text-white text-base truncate">{{ $entry->participant_name }}</h4>
        @if($entry->description)
            <p class="text-denim-300 text-sm truncate mt-0.5">{{ $entry->description }}</p>
        @endif
    </div>

    {{-- Month Label --}}
    @if($entry->month_label)
        <div class="hidden sm:block flex-shrink-0">
            <span class="px-3 py-1 bg-denim-700/40 text-denim-300 text-xs rounded-full">{{ $entry->month_label }}</span>
        </div>
    @endif
</div>