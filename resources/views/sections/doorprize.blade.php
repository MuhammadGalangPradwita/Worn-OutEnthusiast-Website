{{-- Doorprize Section --}}
<x-section-wrapper id="doorprize">
    <div class="text-center mb-12">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Hadiah Pemenang</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white mb-4">
            Doorprize
        </h2>
    </div>

    @if($doorprizes->count())
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 items-end max-w-4xl mx-auto">
            @foreach($doorprizes as $dp)
                @php
                    $isFirst = $dp->rank === 1;
                    $isSecond = $dp->rank === 2;
                    $isThird = $dp->rank === 3;
                @endphp
                <div class="{{ $isFirst ? 'sm:order-2' : ($isSecond ? 'sm:order-1' : 'sm:order-3') }}">
                    <div
                        class="relative bg-gradient-to-br from-denim-800/80 to-navy-800/80 border rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-1
                                {{ $isFirst ? 'border-gold-400/40 hover:shadow-gold-400/20' : ($isSecond ? 'border-gray-400/30 hover:shadow-gray-400/10' : 'border-amber-700/30 hover:shadow-amber-700/10') }}">

                        {{-- Trophy Icon & Rank --}}
                        <div class="text-center pt-8 pb-4">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4
                                        {{ $isFirst ? 'bg-gold-400/20' : ($isSecond ? 'bg-gray-400/15' : 'bg-amber-700/20') }}">
                                @if($isFirst)
                                    {{-- Trophy / Piala --}}
                                    <svg class="w-8 h-8 text-gold-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M5 3h14c0 0 0 5-3 8c-1 1-2 1.5-4 1.8V15h3l1 4H8l1-4h3v-2.2c-2-.3-3-.8-4-1.8C5 8 5 3 5 3zM3 3H5c0 0 0 4 2 6H3V3zM19 3h2v6h-4c2-2 2-6 2-6z"/>
                                    </svg>
                                @elseif($isSecond)
                                    {{-- Silver Medal --}}
                                    <svg class="w-8 h-8 text-gray-300" viewBox="0 0 24 24" fill="none">
                                        <path d="M8 2l4 6 4-6" stroke="currentColor" stroke-width="2" fill="none"/>
                                        <circle cx="12" cy="15" r="7" fill="currentColor"/>
                                        <circle cx="12" cy="15" r="5" fill="none" stroke="rgba(0,0,0,0.2)" stroke-width="1"/>
                                    </svg>
                                @else
                                    {{-- Bronze Medal --}}
                                    <svg class="w-8 h-8 text-amber-600" viewBox="0 0 24 24" fill="none">
                                        <path d="M8 2l4 6 4-6" stroke="currentColor" stroke-width="2" fill="none"/>
                                        <circle cx="12" cy="15" r="7" fill="currentColor"/>
                                        <circle cx="12" cy="15" r="5" fill="none" stroke="rgba(0,0,0,0.2)" stroke-width="1"/>
                                    </svg>
                                @endif
                            </div>
                            <div
                                class="font-display font-bold text-lg {{ $isFirst ? 'text-gold-400' : ($isSecond ? 'text-gray-300' : 'text-amber-600') }}">
                                Juara {{ $dp->rank }}
                            </div>
                        </div>

                        {{-- Prize Info --}}
                        <div class="px-6 pb-8 text-center">
                            <h3 class="font-display font-bold text-xl text-white mb-3">{{ $dp->name }}</h3>
                            <div
                                class="text-2xl md:text-3xl font-display font-bold {{ $isFirst ? 'text-gold-400' : ($isSecond ? 'text-gray-300' : 'text-amber-600') }}">
                                Rp {{ number_format($dp->prize_amount, 0, ',', '.') }}
                            </div>
                            @if($dp->description)
                                <p class="text-denim-400 text-sm mt-3">{{ $dp->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-denim-400 py-12">
            Doorprize will be announced soon.
        </div>
    @endif
</x-section-wrapper>