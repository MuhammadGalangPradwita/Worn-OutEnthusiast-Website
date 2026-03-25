{{-- Timeline Section --}}
<x-section-wrapper id="timeline" :dark="true" >
    <div class="text-center mb-12">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Event Timeline</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white">
            Key Milestones
        </h2>
    </div>

    @if($timelines->count())
        {{-- Desktop horizontal timeline --}}
        <div class="hidden md:flex items-start justify-between relative">
            @foreach($timelines as $i => $milestone)
                <x-timeline-item :title="$milestone->title" :date="$milestone->date" :isActive="$milestone->is_active"
                    :isLast="$loop->last" />
            @endforeach
        </div>

        {{-- Mobile vertical timeline --}}
        <div class="md:hidden">
            @foreach($timelines as $milestone)
                <x-timeline-item :title="$milestone->title" :date="$milestone->date" :isActive="$milestone->is_active"
                    :isLast="$loop->last" />
            @endforeach
        </div>
    @else
        <p class="text-center text-denim-400">Timeline will be announced soon.</p>
    @endif
</x-section-wrapper>