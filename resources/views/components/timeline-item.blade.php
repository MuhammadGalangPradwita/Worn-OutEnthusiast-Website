@props(['title', 'date' => '', 'isActive' => false, 'isLast' => false])

{{-- Desktop horizontal item --}}
<div class="hidden md:flex flex-col items-center flex-1 relative">
    <div
        class="w-4 h-4 rounded-full {{ $isActive ? 'bg-denim-400 ring-4 ring-denim-400/30' : 'bg-denim-600' }} z-10 transition-all duration-300">
    </div>
    @if(!$isLast)
        <div
            class="absolute top-2 left-1/2 w-full h-0.5 {{ $isActive ? 'bg-gradient-to-r from-denim-400 to-denim-600' : 'bg-denim-700' }}">
        </div>
    @endif
    <div class="mt-4 text-center">
        <p class="font-display font-bold text-sm {{ $isActive ? 'text-denim-200' : 'text-denim-400' }}">{{ $title }}</p>
        @if($date)
            <p class="text-xs text-denim-500 mt-1">{{ $date }}</p>
        @endif
    </div>
</div>

{{-- Mobile vertical item --}}
<div class="md:hidden flex items-start gap-4 pb-8 relative">
    <div class="flex flex-col items-center">
        <div
            class="w-4 h-4 rounded-full {{ $isActive ? 'bg-denim-400 ring-4 ring-denim-400/30' : 'bg-denim-600' }} z-10">
        </div>
        @if(!$isLast)
            <div class="w-0.5 flex-1 {{ $isActive ? 'bg-denim-400' : 'bg-denim-700' }} mt-1"></div>
        @endif
    </div>
    <div class="pb-2">
        <p class="font-display font-bold text-sm {{ $isActive ? 'text-denim-200' : 'text-denim-400' }}">{{ $title }}</p>
        @if($date)
            <p class="text-xs text-denim-500 mt-1">{{ $date }}</p>
        @endif
    </div>
</div>