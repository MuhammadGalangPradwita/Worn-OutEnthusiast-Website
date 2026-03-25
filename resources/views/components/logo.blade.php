{{-- Worn-Out Enthusiast Brand Logo --}}
<div class="flex items-center {{ ($stacked ?? false) ? 'gap-4 lg:gap-5' : 'gap-4 lg:gap-6' }} group">
    {{-- Skull Icon --}}
    <img src="{{ asset('images/logo.png') }}"
         alt="Worn-Out Enthusiast"
         style="height: {{ ($stacked ?? false) ? '80px' : '40px' }}; width: auto;"
         class="transition-transform duration-500 group-hover:scale-110">
    
    {{-- Styled Typography --}}
    <div class="flex flex-col {{ ($stacked ?? false) ? 'leading-[0.9]' : 'leading-none' }}">
        @if($stacked ?? false)
            <span class="font-display font-bold text-2xl lg:text-3xl tracking-tight text-white uppercase">WORN-OUT</span>
            <span class="font-display font-bold text-2xl lg:text-3xl tracking-tight text-white uppercase">ENTHUSIAST</span>
        @else
            <span class="font-display font-bold text-xl md:text-2xl lg:text-3xl tracking-tight text-white whitespace-nowrap uppercase">
                WORN-OUT ENTHUSIAST
            </span>
        @endif
    </div>
</div>
