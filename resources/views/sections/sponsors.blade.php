{{-- Sponsors Section --}}
<x-section-wrapper id="sponsors" :dark="true">
    <div class="text-center mb-12">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Sponsor Perlombaan</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white">
            Sponsor & Partner
        </h2>
    </div>
    @if($sponsors->count())
        @if($sponsors->count() > 5)
            {{-- Marquee Layout for Multiple Sponsors --}}
            <style>
                @keyframes marquee {
                    0% { transform: translateX(0%); }
                    100% { transform: translateX(-50%); }
                }
                .animate-marquee {
                    animation: marquee 35s linear infinite;
                }
                .animate-marquee:hover {
                    animation-play-state: paused;
                }
            </style>

            <div class="relative w-full max-w-6xl mx-auto overflow-hidden py-8">
                {{-- Gradient Overlays for Smooth Fading Edges --}}
                <div class="absolute inset-y-0 left-0 w-16 md:w-32 bg-gradient-to-r from-navy-900 via-navy-900/50 to-transparent z-10 pointer-events-none"></div>
                <div class="absolute inset-y-0 right-0 w-16 md:w-32 bg-gradient-to-l from-navy-900 via-navy-900/50 to-transparent z-10 pointer-events-none"></div>

                {{-- Marquee Container --}}
                <div class="flex animate-marquee whitespace-nowrap items-center hover:cursor-pointer">
                    {{-- Double the items for a seamless infinite loop --}}
                    @foreach($sponsors->concat($sponsors) as $sponsor)
                        <div class="flex-none w-36 md:w-48 h-24 md:h-32 flex items-center justify-center p-4 rounded-2xl bg-white shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group mx-2">
                            @if($sponsor->logo_path)
                                <img src="{{ asset('storage/' . $sponsor->logo_path) }}" alt="Sponsor Logo"
                                    class="max-w-[85%] max-h-[85%] object-contain transition-transform duration-500 group-hover:scale-110" loading="lazy">
                            @else
                                <span class="font-display font-bold text-2xl text-denim-600 leading-none">WE</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            {{-- Grid Layout for Fewer Sponsors --}}
            <div class="flex flex-wrap justify-center gap-6 max-w-4xl mx-auto py-8">
                @foreach($sponsors as $sponsor)
                    <div class="flex-none w-36 md:w-48 h-24 md:h-32 flex items-center justify-center p-4 rounded-2xl bg-white shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group mx-2">
                        @if($sponsor->logo_path)
                            <img src="{{ asset('storage/' . $sponsor->logo_path) }}" alt="Sponsor Logo"
                                class="max-w-[85%] max-h-[85%] object-contain transition-transform duration-500 group-hover:scale-110" loading="lazy">
                        @else
                            <span class="font-display font-bold text-2xl text-denim-600 leading-none">WE</span>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <div class="max-w-xl mx-auto py-12">
            <div>
                <p class="text-denim-400 text-sm leading-relaxed italic">
                    "Untuk Kali Ini Pada Worn-Out Enthusiast Battle VOL II Kita Berjalan Tanpa Sponsor"
                </p>
            </div>
        </div>
    @endif    
</x-section-wrapper>