@props(['title', 'open' => false])

<div x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    class="border border-denim-600/30 rounded-xl overflow-hidden transition-all duration-300 hover:border-denim-500/50 bg-denim-800/30">
    <button @click="open = !open"
        class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors hover:bg-denim-700/20">
        <span class="font-display font-semibold text-white pr-4">{{ $title }}</span>
        <svg :class="open ? 'rotate-180' : ''"
            class="w-5 h-5 text-denim-400 transition-transform duration-300 flex-shrink-0" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 max-h-96"
        x-transition:leave-end="opacity-0 max-h-0" class="overflow-hidden">
        <div class="px-6 pb-5 text-denim-300 text-sm leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</div>