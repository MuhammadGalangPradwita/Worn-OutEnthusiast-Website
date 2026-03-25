{{-- About Section --}}
<x-section-wrapper id="about">
    {{-- Block 1: Hero & Real-time Stats --}}
    <div class="grid lg:grid-cols-2 gap-8 items-stretch mb-12">
        {{-- Left: Featured Intro Card --}}
        <div class="bg-navy-900/80 border border-denim-700/50 rounded-3xl p-8 md:p-12 flex flex-col justify-center relative overflow-hidden group">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-denim-600/10 rounded-full blur-3xl group-hover:bg-denim-500/20 transition-colors duration-700"></div>
            
            <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4 relative z-10">
                Tentang Worn-Out Enthusiast
            </p>
            <h2 class="font-display font-bold text-3xl md:text-5xl text-white mb-6 leading-tight relative z-10">
                Komunitas <span class="text-denim-300">Raw Denim</span> Lokal Terbesar
            </h2>
            <p class="text-denim-200 text-lg leading-relaxed relative z-10">
                Worn-Out Enthusiast merupakan komunitas yang dibentuk dari sekumpulan denim heads Indonesia yang memiliki visi untuk memperkenalkan produk fashion lokal kepada masyarakat luas. Melalui kompetisi, edukasi dan kegiatan komunitas, WOE ingin menunjukkan bahwa brand lokal memiliki kualitas dan karakter yang mampu bersaing.
            </p>
            
            <!-- <div class="mt-8 flex flex-wrap gap-4 relative z-10">
                <a href="#community" class="bg-denim-500 hover:bg-denim-400 text-white font-bold px-6 py-3 rounded-xl transition-all shadow-lg shadow-denim-500/20 flex items-center gap-2">
                    Gabung Komunitas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div> -->
        </div>

        {{-- Right: Featured Video/Image Placeholder --}}
        <div class="relative rounded-3xl overflow-hidden border border-denim-700/50 group">
            <img src="{{ asset('images/Non-Selvedge/1.JPG') }}" alt="Worn-Out Enthusiast Event" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute inset-0 flex items-center justify-center">
            </div>
        </div>
    </div>

    {{-- Block 2: Heritage & Story --}}
    <div class="grid lg:grid-cols-2 gap-16 items-center mb-32">
        {{-- Left: Tall Portrait Image --}}
        <div class="relative group">
            <div class="aspect-[3/4] rounded-3xl overflow-hidden border border-denim-700/50 shadow-2xl relative">
                <img src="{{ asset('images/Non-Selvedge/2.JPG') }}" alt="Denim Heritage" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-navy-900 via-transparent to-transparent opacity-60"></div>
            </div>
        </div>

        {{-- Right: Content --}}
        <div>
            <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-6 leading-tight">
                Dedikasi Melalui Setiap <span class="text-denim-300">Helaian Benang</span>
            </h2>
            <p class="text-denim-200 text-lg leading-relaxed mb-8">
                Kami percaya pada kekuatan detail. Worn-Out Enthusiast mendedikasikan diri untuk merayakan setiap lipatan (honeycomb), kerutan (whiskers), hingga gradasi pudar yang menceritakan gaya hidup dan dedikasi penggunanya.
            </p>
            
            <ul class="space-y-4">
                @php
                    $features = [
                        ['title' => 'Apresiasi Seni Denim', 'desc' => 'Menghargai setiap proses pudar sebagai karya seni personal.'],
                        ['title' => 'Edukasi Berkelanjutan', 'desc' => 'Berbagi teknik perawatan dan pengetahuan material denim.'],
                        ['title' => 'Sirkuit Lokal', 'desc' => 'Mendukung pertumbuhan brand tanah air agar mendunia.']
                    ];
                @endphp
                @foreach($features as $f)
                <li class="flex items-start gap-4 p-4 rounded-2xl hover:bg-navy-800/50 transition-colors border border-transparent hover:border-denim-700/30">
                    <div class="w-8 h-8 rounded-lg bg-denim-900 flex items-center justify-center text-denim-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-white mb-1">{{ $f['title'] }}</h4>
                        <p class="text-denim-300 text-sm">{{ $f['desc'] }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Block 3: Visi & Misi --}}
    <div class="mb-32">
        <div class="max-w-4xl mx-auto">
            {{-- VISI --}}
            <div class="text-center mb-20">
                <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-bold mb-4">Visi Kami</p>
                <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-8 leading-tight">
                    "Membangun ekosistem komunitas yang mendukung perkembangan <span class="text-denim-300">brand fashion lokal Indonesia</span>"
                </h2>
                <div class="w-24 h-1 bg-denim-500 mx-auto rounded-full"></div>
            </div>

            {{-- MISI --}}
            <div class="text-center mb-12">
                <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-bold">Misi Kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $misiItems = [
                        ['icon' => 'megaphone', 'text' => 'Memperkenalkan brand lokal kepada masyarakat luas'],
                        ['icon' => 'book-open', 'text' => 'Mengedukasi tentang denim'],
                        ['icon' => 'user-group', 'text' => 'Membuat ruang komunitas bagi para enthusiast'],
                        ['icon' => 'chart-bar', 'text' => 'Mendukung perkembangan industri fashion lokal']
                    ];
                @endphp
                @foreach($misiItems as $m)
                    <div class="bg-navy-900/50 border border-denim-700/30 rounded-2xl p-6 flex items-center gap-6 group hover:border-denim-500/50 transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-denim-500/10 flex items-center justify-center shrink-0 group-hover:bg-denim-500 transition-colors duration-300">
                            <svg class="w-6 h-6 text-denim-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($m['icon'] == 'megaphone') <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                @elseif($m['icon'] == 'book-open') <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                @elseif($m['icon'] == 'user-group') <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                @elseif($m['icon'] == 'chart-bar') <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m0 0a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2v-10a2 2 0 00-2-2h-2a2 2 0 00-2 2v10z"/>
                                @endif
                            </svg>
                        </div>
                        <p class="text-white font-medium text-lg leading-snug">{{ $m['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Block 4: Community Details --}}
    <div class="grid lg:grid-cols-2 gap-16 items-center">
        {{-- Left: Text --}}
        <div>
            <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-6">Inklusivitas Komunitas</h2>
            <p class="text-denim-200 text-lg mb-8 leading-relaxed">
                Komunitas kami adalah rumah bagi individu dari berbagai latar belakang yang dipersatukan oleh satu gairah: apresiasi terhadap kualitas dan seni denim lokal.
            </p>
            <div class="grid grid-cols-2 gap-4">
                @php
                    $members = ["Denimheads", "Brand Owners", "Fashion Enthusiast", "Content Creators", "Artisans", "Collectors"];
                @endphp
                @foreach($members as $m)
                    <div class="flex items-center gap-3 text-denim-200 bg-navy-800/30 p-4 rounded-xl border border-denim-700/20">
                        <span class="w-1.5 h-1.5 bg-denim-400 rounded-full"></span>
                        <span class="text-sm font-medium">{{ $m }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Right: Supporting Photo composition --}}
        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-2xl overflow-hidden aspect-square border border-denim-700/50">
                <img src="{{ asset('images/Non-Selvedge/3.JPG') }}" alt="Community 1" onerror="this.src='https://images.unsplash.com/photo-1542272604-787c3835535d?q=80&w=400';" class="w-full h-full object-cover">
            </div>
            <div class="rounded-2xl overflow-hidden aspect-square border border-denim-700/50 mt-8">
                <img src="{{ asset('images/Non-Selvedge/4.JPG') }}" alt="Community 2" onerror="this.src='https://images.unsplash.com/photo-1516583985823-52277d33d744?q=80&w=400';" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</x-section-wrapper>