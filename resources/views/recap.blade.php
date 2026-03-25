@extends('layouts.main')

@section('content')
    {{-- 1. Recap Detail Hero & Content --}}
    <x-section-wrapper id="recap-detail">
        {{-- 3. Cerita Singkat Event --}}
        <div class="max-w-4xl mx-auto text-center mb-24">
            <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-8 tracking-tight">Worn-Out Enthusiast Vol I</h2>
            <div class="bg-navy-800/50 p-8 rounded-2xl border border-denim-700/30 relative mb-12">
                <svg class="w-10 h-10 text-denim-500/20 absolute top-4 left-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                </svg>
                <p class="text-denim-200 text-xl leading-relaxed relative z-10 font-serif italic">
                    "Finding Beauty in Exhaustion"
                </p>
            </div>
            <p class="text-denim-300 text-lg leading-relaxed text-justify">
                Worn-Out Enthusiast Battle Vol. 1 – Celebrating the Journey of Natural Fades merupakan langkah awal dalam membangun ruang bagi para denim enthusiast untuk mendokumentasikan perjalanan fading secara alami. Kompetisi ini mempertemukan peserta dari berbagai latar belakang yang memiliki kecintaan yang sama terhadap raw denim serta proses terbentuknya karakter denim melalui penggunaan sehari-hari. Pada edisi pertama ini, peserta berkompetisi dalam dua kategori utama yaitu Middle Weight dan Heavy Weight, yang memberikan kesempatan bagi berbagai jenis denim untuk menunjukkan karakter fading terbaiknya. Sepanjang periode battle, para peserta secara konsisten mendokumentasikan perkembangan denim mereka, memperlihatkan bagaimana pola fading terbentuk secara autentik dari aktivitas harian, sehingga kompetisi ini tidak hanya menjadi ajang persaingan tetapi juga wadah untuk memperkuat komunitas serta memperkenalkan budaya raw denim kepada audiens yang lebih luas.
            </p>
        </div>

        <div>
            {{-- 4. Pemenang Kompetisi --}}
            <div class="text-center text-denim-400 font-display font-bold tracking-tighter text-xl md:text-2xl uppercase">
                        Pemenang <span class="text-denim-200">Heavyweight</span>
            </div>
                <p class="text-white text-center mb-12 max-w-2xl mx-auto mt-6">Mereka yang telah membuktikan dedikasi selama berbulan-bulan pemakaian, menghasilkan kanvas denim dengan cerita terbaik.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @php
                    $defaultWinners = [
                        ['badge' => 'Juara 1', 'color' => 'from-yellow-400 to-yellow-600', 'text_color' => 'text-navy-900', 'name' => 'Yahsya Alif Firmansyah', 'brand' => 'LokalBrand Co.', 'quote' => '"Hasil fade kontras tinggi dengan whisker tajam yang merepresentasikan aktivitas outdoor ekstrem."', 'photo' => 'images/Winner/Heavy/1.webp'],
                        ['badge' => 'Juara 2', 'color' => 'from-gray-300 to-gray-400', 'text_color' => 'text-navy-900', 'name' => 'Rifky Rahmadian', 'brand' => 'DenimMaker JKT', 'quote' => '"Pola honeycomb yang solid dan gradasi indigo yang memudar dengan sangat natural."', 'photo' => 'images/Winner/Heavy/2.webp'],
                        ['badge' => 'Juara 3', 'color' => 'from-amber-700 to-amber-600', 'text_color' => 'text-white', 'name' => 'Alvariji', 'brand' => 'Artisan Denim', 'quote' => '"Fade vintage look dengan tekstur slub yang menonjol di seluruh permukaan kain."', 'photo' => 'images/Winner/Heavy/3.webp']
                    ];
                    $winners = $defaultWinners;
                @endphp
                
                @for($i = 0; $i < 3; $i++)
                    @php 
                        $w = $winners[$i] ?? [];
                        $def = $defaultWinners[$i];
                        $name = !empty($w['name']) ? $w['name'] : $def['name'];
                        $brand = !empty($w['brand']) ? $w['brand'] : $def['brand'];
                        $quote = !empty($w['quote']) ? $w['quote'] : $def['quote'];
                        
                        // Parse photos CSV into array
                        $photoRaw = !empty($w['photo']) ? $w['photo'] : $def['photo'];
                        $photos = array_map('trim', explode(',', $photoRaw));
                        $firstPhoto = $photos[0] ?? '';
                    @endphp
                    <div class="group bg-[#0B1221] rounded-[2rem] border border-denim-700/20 overflow-hidden hover:-translate-y-2 transition-all duration-500 relative shadow-2xl">
                        
                        <div class="aspect-square relative overflow-hidden">
                            <img src="{{ $firstPhoto }}" alt="{{ $def['badge'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            {{-- Yellow Pill Badge --}}
                            <div class="absolute top-6 right-6 z-10">
                                <span class="bg-yellow-500 text-black text-sm font-bold uppercase tracking-wider px-6 py-2 rounded-full shadow-lg">
                                    {{ $def['badge'] }}
                                </span>
                            </div>

                            {{-- Subtle Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0B1221] via-transparent to-transparent opacity-60"></div>
                        </div>
                        <div class="p-8 relative text-center">
                            <h3 class="font-display font-bold text-2xl text-white group-hover:text-denim-200 transition-colors tracking-tight">{{ $name }}</h3>
                        </div>
                    </div>
                @endfor
            </div>



        <div class="text-center text-denim-400 font-display font-bold tracking-tighter text-xl md:text-2xl uppercase mt-24">
                    Pemenang <span class="text-denim-200">Middleweight</span>
        </div>
            <p class="text-white text-center mb-12 max-w-2xl mx-auto mt-6">Mereka yang telah membuktikan dedikasi selama berbulan-bulan pemakaian, menghasilkan kanvas denim dengan cerita terbaik.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @php
                    $defaultWinners = [
                        ['badge' => 'Juara 1', 'color' => 'from-yellow-400 to-yellow-600', 'text_color' => 'text-navy-900', 'name' => 'Fairus', 'brand' => 'LokalBrand Co.', 'quote' => '"Hasil fade kontras tinggi dengan whisker tajam yang merepresentasikan aktivitas outdoor ekstrem."', 'photo' => 'images/Winner/Middle/1.webp'],
                        ['badge' => 'Juara 2', 'color' => 'from-gray-300 to-gray-400', 'text_color' => 'text-navy-900', 'name' => 'Yohanes Saputra', 'brand' => 'DenimMaker JKT', 'quote' => '"Pola honeycomb yang solid dan gradasi indigo yang memudar dengan sangat natural."', 'photo' => 'images/Winner/Middle/2.webp'],
                        ['badge' => 'Juara 3', 'color' => 'from-amber-700 to-amber-600', 'text_color' => 'text-white', 'name' => 'Reza Septianus', 'brand' => 'Artisan Denim', 'quote' => '"Fade vintage look dengan tekstur slub yang menonjol di seluruh permukaan kain."', 'photo' => 'images/Winner/Middle/3.webp']
                    ];
                    $winners = $defaultWinners;
                @endphp
                
                @for($i = 0; $i < 3; $i++)
                    @php 
                        $w = $winners[$i] ?? [];
                        $def = $defaultWinners[$i];
                        $name = !empty($w['name']) ? $w['name'] : $def['name'];
                        $brand = !empty($w['brand']) ? $w['brand'] : $def['brand'];
                        $quote = !empty($w['quote']) ? $w['quote'] : $def['quote'];
                        
                        // Parse photos CSV into array
                        $photoRaw = !empty($w['photo']) ? $w['photo'] : $def['photo'];
                        $photos = array_map('trim', explode(',', $photoRaw));
                        $firstPhoto = $photos[0] ?? '';
                    @endphp
                    <div class="group bg-[#0B1221] rounded-[2rem] border border-denim-700/20 overflow-hidden hover:-translate-y-2 transition-all duration-500 relative shadow-2xl">
                        
                        <div class="aspect-square relative overflow-hidden">
                            <img src="{{ $firstPhoto }}" alt="{{ $def['badge'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            {{-- Yellow Pill Badge --}}
                            <div class="absolute top-6 right-6 z-10">
                                <span class="bg-yellow-500 text-black text-sm font-bold uppercase tracking-wider px-6 py-2 rounded-full shadow-lg">
                                    {{ $def['badge'] }}
                                </span>
                            </div>

                            {{-- Subtle Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0B1221] via-transparent to-transparent opacity-60"></div>
                        </div>
                        <div class="p-8 relative text-center">
                            <h3 class="font-display font-bold text-2xl text-white group-hover:text-denim-200 transition-colors tracking-tight">{{ $name }}</h3>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- 5. Foto / Dokumentasi Event Grid --}}
        @php
            $hardcodedRecapImages = [
                'images/Dokumentasi VOL I/1.webp',
                'images/Dokumentasi VOL I/2.webp',
                'images/Dokumentasi VOL I/3.webp',
                'images/Dokumentasi VOL I/4.webp',
                'images/Dokumentasi VOL I/5.webp',
                'images/Dokumentasi VOL I/6.webp',
            ];
        @endphp
        <div class="max-w-6xl mx-auto mt-24">
            <h2 class="text-center font-display font-bold tracking-tighter text-xl md:text-2xl mb-4">Galeri Dokumentasi</h2>
            <p class="text-denim-400 text-center mb-10 max-w-2xl mx-auto">Potret antusiasme komunitas dan momen tak terlupakan selama Battle VOL I.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach($hardcodedRecapImages as $imgPath)
                    <div
                        class="group rounded-2xl overflow-hidden aspect-[4/3] relative hover:shadow-2xl hover:shadow-denim-500/20 transition-all duration-500 hover:-translate-y-1 bg-navy-800">
                        <img src="{{ asset($imgPath) }}" alt="Dokumentasi VOL I"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-navy-900/90 via-navy-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- 7. Dampak Event --}}
        <div class="mt-24 max-w-5xl mx-auto">
            <h2 class="font-display font-bold text-2xl text-white text-center mb-12">Dampak Event</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $defaultImpacts = [
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>', 'title' => 'Exposure Brand Lokal', 'desc' => 'Meningkatkan kesadaran masyarakat terhadap kualitas denim buatan Indonesia yang mampu bersaing dengan brand internasional.'],
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>', 'title' => 'Komunitas yang Solid', 'desc' => 'Menjadi wadah silaturahmi ribuan pecinta denim, saling berbagi edukasi perawatan, tips fading, dan sejarah tekstil.'],
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>', 'title' => 'Interaksi Sosial Media', 'desc' => 'Menciptakan tren tagar denim lokal dengan lebih dari 10.000+ interaksi organik dalam bentuk foto dan diskusi.'],
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>', 'title' => 'Kolaborasi Masa Depan', 'desc' => 'Membuka jalan bagi lahirnya Worn-Out Enthusiast Battle VOL II dengan peserta dan kategori yang lebih beragam.']
                    ];
                    $impacts = $defaultImpacts;
                @endphp

                @for($i = 0; $i < 4; $i++)
                    @php 
                        $imp = $impacts[$i] ?? [];
                        $def = $defaultImpacts[$i];
                        $title = !empty($imp['title']) ? $imp['title'] : $def['title'];
                        $desc = !empty($imp['desc']) ? $imp['desc'] : $def['desc'];
                    @endphp
                    <div class="bg-navy-800/80 p-6 rounded-2xl border border-denim-700/30 flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-denim-500/20 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $def['icon'] !!}</svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-lg mb-2">{{ $title }}</h4>
                            <p class="text-denim-300 text-sm leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- 8. Call To Action --}}
        <div class="text-center mt-24 bg-gradient-to-t from-denim-900/40 to-transparent pt-16  border-t border-denim-800">
            <h2 class="font-display font-bold text-3xl text-white mb-6">Siap Menjadi Bagian dari Sejarah?</h2>
            <p class="text-denim-300 mb-10 max-w-xl mx-auto">Battle VOL II segera dimulai. Siapkan kanvas barumu dan buktikan dedikasimu pada denim lokalan.</p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                {{-- Join VOL II Button --}}
                <a href="{{ url('/#register') }}"
                    class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-8 py-4 bg-gradient-to-r from-denim-500 to-denim-600 hover:from-denim-400 hover:to-denim-500 text-white font-bold rounded-full transition-all duration-300 shadow-xl shadow-denim-500/20 hover:shadow-denim-500/40 hover:-translate-y-1">
                    Join Battle VOL II
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
                
                {{-- Secondary Link --}}
                <a href="{{ url('/#gallery') }}" 
                    class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 border-2 border-denim-600 text-denim-300 hover:text-white hover:bg-denim-800 font-medium rounded-full transition-all duration-300">
                    Lihat Gallery Fade
                </a>
            </div>
        </div>
    </x-section-wrapper>

    {{-- Judges Section (Recap VOL I - specific) --}}
    <x-section-wrapper id="judges">
    <div x-data="{ 
        openDetail: false, 
        selected: null, 
        selectJudge(judge) {
            this.selected = judge;
            this.openDetail = true;
            document.getElementById('judges').scrollIntoView({ behavior: 'smooth' });
        },
        closeDetail() {
            this.openDetail = false;
            setTimeout(() => { if(!this.openDetail) this.selected = null; }, 500);
        }
    }">
        @php
            $hardcodedJudges = [
                [
                    'name' => 'Bhisma Diandra',
                    'title' => 'Juri VOL I',
                    'thumbnail' => 'images/Juri VOL I/Mas Bisma/profile.jpg',
                    'instagram' => 'https://www.instagram.com/bhismadiandra',
                    'sections' => [
                        [
                            'text' => "Bhisma merupakan seorang denim enthusiast yang telah mulai mengoleksi dan melakukan break jeans sejak tahun 2010. Dikenal sebagai “denim geek”, ia memiliki ciri khas dalam menciptakan hasil fading yang kuat dan konsisten, mulai dari era forum Darahkubiru hingga berkembang ke platform digital seperti Instagram.",
                        ],
                        [
                            'text' => "Selain aktif sebagai pelaku, Bhisma juga berperan penting dalam membangun skena denim di Indonesia melalui event Wall of Fades pada periode 2012–2016, serta kini tengah mengembangkan media baru bernama Rawclub. Dengan wawasan raw denim yang mendalam serta koneksi luas di industri, Bhisma dipercaya sebagai salah satu juri dalam Worn-Out Enthusiast.",
                            'photos' => [
                                'images/Juri VOL I/Mas Bisma/1.webp',
                                'images/Juri VOL I/Mas Bisma/2.webp',
                                'images/Juri VOL I/Mas Bisma/3.webp',
                                'images/Juri VOL I/Mas Bisma/4.webp',
                                'images/Juri VOL I/Mas Bisma/5.webp',
                                'images/Juri VOL I/Mas Bisma/6.webp',
                            ]
                        ]
                    ]
                ],
                [
                    'name' => 'Muhammad Rizky',
                    'title' => 'Juri VOL I',
                    'thumbnail' => 'images/Juri VOL I/Mas Riski/profile.jpg',
                    'instagram' => 'https://www.instagram.com/mrizkysukmana',
                    'sections' => [
                        [
                            'text' => "Muhammad Rizky merupakan seorang denim enthusiast yang telah berkecimpung di dunia raw denim sejak tahun 2012. Perjalanannya dimulai dari ketertarikan sederhana hingga akhirnya aktif di komunitas seperti Darahkubiru dan Denim Enthusiast, serta terlibat dalam berbagai event bersama Warpweft Company. Ia juga memiliki pengalaman kompetisi internasional, termasuk meraih juara 3 pada Denimio Great Denim Battle 2016 dan juara 1 di Indigo Invitational Year 1",
                        ],
                        [
                            'text' => "Salah satu pencapaian pentingnya adalah merancang jeans kolaborasi Samurai S710XX25oz-GDB yang juga menjadi favoritnya. Dengan pengalaman panjang, pemahaman mendalam tentang karakter fading, serta keterlibatan aktif di komunitas, Muhammad Rizky dipercaya sebagai juri dalam Worn-Out Enthusiast Vol. 1 untuk menilai proses dan keaslian perjalanan setiap denim peserta.",
                            'photos' => [
                                'images/Juri VOL I/Mas Riski/1.webp',
                                'images/Juri VOL I/Mas Riski/2.webp',
                                'images/Juri VOL I/Mas Riski/3.webp',
                                'images/Juri VOL I/Mas Riski/4.webp',
                                'images/Juri VOL I/Mas Riski/5.webp',
                                'images/Juri VOL I/Mas Riski/6.webp',
                            ]
                        ]
                    ]
                ],
            ];
        @endphp

        {{-- 1. Grid View (Judges List) --}}
        <div x-show="!openDetail" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translateY(20px)" x-transition:enter-end="opacity-100 translateY(0)">
            <div class="text-center mb-12">
                <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Juri Lomba</p>
                <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white">
                    Juri & Mentor
                </h2>
            </div>

            {{-- Responsive Layout: Vertical on Mobile, Horizontal on Desktop --}}
            <div class="flex flex-col md:flex-row justify-center items-center md:items-start gap-10 md:gap-8 pb-8">
                @foreach ($hardcodedJudges as $judge)
                    <div class="group text-center w-full max-w-[280px] md:w-64 cursor-pointer"
                        @click="selectJudge({{ json_encode($judge) }})">
                        <div
                            class="relative w-48 h-48 mx-auto mb-6 rounded-2xl overflow-hidden bg-gradient-to-br from-denim-700/40 to-denim-600/20">
                            <img src="{{ asset($judge['thumbnail'] ?? $judge['sections'][0]['photos'][0] ?? '') }}"
                                alt="{{ $judge['name'] }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div
                                class="absolute inset-0 bg-denim-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-medium flex items-center gap-2 text-sm">
                                    View Details
                                </span>
                            </div>
                        </div>
                        <h3
                            class="font-display font-bold text-xl text-white mb-1 group-hover:text-denim-200 transition-colors">
                            {{ $judge['name'] }}
                        </h3>
                        <p class="text-denim-400 text-sm mb-3">{{ $judge['title'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- 2. Detail View (Judge Profile) --}}
        <div x-show="openDetail" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translateY(20px)" x-transition:enter-end="opacity-100 translateY(0)"
            x-cloak class="relative max-w-4xl mx-auto">

            {{-- Back Button --}}
            <button @click="closeDetail()"
                class="mb-8 flex items-center gap-2 text-denim-400 hover:text-white transition-colors group">
                <div
                    class="w-8 h-8 rounded-full bg-denim-800/50 flex items-center justify-center group-hover:bg-denim-700 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Kembali ke Daftar Juri</span>
            </button>

            {{-- Template rendering for structured bio sections --}}
            <template x-if="selected">
                <div class="text-center">
                    <h3 class="font-display font-bold text-3xl md:text-5xl lg:text-6xl text-white mb-12 leading-tight"
                        x-text="selected.name"></h3>

                    <div class="">
                        <template x-for="(section, sIndex) in selected.sections" :key="sIndex">
                            <div class="flex flex-col items-center w-full" :class="sIndex > 0 ? 'mt-6 md:mt-8' : ''">
                                {{-- Section Text --}}
                                <div 
                                    class="w-full max-w-2xl text-denim-200 leading-loose text-base md:text-lg opacity-90"
                                    style="text-align: justify; text-justify: inter-word;"
                                    x-html="section.text.replace(/\n/g, '<br>')">
                                </div>

                                {{-- Section Photos Grid View (if photos exist) --}}
                                <template x-if="section.photos && Object.keys(section.photos).length > 0">
                                    <div class="w-full max-w-2xl mt-8 mb-8 grid grid-cols-2 sm:grid-cols-3 gap-3 md:gap-4">
                                        <template x-for="(p, pIdx) in Object.values(section.photos)" :key="pIdx">
                                            <div class="relative group aspect-square md:aspect-[4/3] rounded-xl overflow-hidden border border-denim-700/50 shadow-md bg-denim-900/50">
                                                <img :src="p.startsWith('http') ? p : '{{ asset('') }}' + p"
                                                    :alt="selected.name"
                                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                            </div>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>

                    {{-- Social Floating Bar --}}
                    <template x-if="selected.instagram">
                        <div class="mt-10 flex justify-center pb-8">
                            <a :href="selected.instagram" target="_blank"
                                class="flex items-center gap-3 px-6 py-3 rounded-full bg-denim-800/80 border border-denim-600/30 hover:bg-denim-700/80 hover:border-denim-500/50 text-denim-200 hover:text-white transition-all shadow-xl backdrop-blur-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                </svg>
                                <span class="text-sm font-bold uppercase tracking-widest">Follow on Instagram</span>
                            </a>
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </x-section-wrapper>

    {{-- Sponsors Section (Recap-specific) --}}
    <x-section-wrapper id="recap-sponsors">
        <div class="text-center mb-12">
            <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Didukung Oleh</p>
            <h2 class="font-display font-bold text-2xl md:text-3xl text-white">Sponsor & Partner VOL I</h2>
        </div>

        @php
            $sponsorLogos = [];
            for($i = 1; $i <= 15; $i++) {
                $sponsorLogos[] = 'images/Sponsor Vol I/' . $i . '.png';
            }
        @endphp

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
            <div class="absolute inset-y-0 left-0 w-16 md:w-32 bg-gradient-to-r from-navy-900 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-16 md:w-32 bg-gradient-to-l from-navy-900 to-transparent z-10 pointer-events-none"></div>

            {{-- Marquee Container --}}
            <div class="flex animate-marquee whitespace-nowrap items-center hover:cursor-pointer">
                {{-- Double the items to create a seamless infinite loop --}}
                @foreach(array_merge($sponsorLogos, $sponsorLogos) as $logo)
                    <div class="flex-none w-36 md:w-48 h-24 md:h-32 flex items-center justify-center p-4 rounded-2xl bg-white shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group" style="margin-left: 0.5rem; margin-right: 0.5rem;">
                        <img src="{{ asset($logo) }}" 
                             alt="Sponsor Logo" 
                             class="max-w-[85%] max-h-[85%] object-contain transition-transform duration-500 group-hover:scale-110">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', '6282126601027')) }}?text=Halo%20Team%20Worn-Out%20Enthusiast%2C%20saya%20tertarik%20untuk%20mendukung%20sebagai%20Sponsor%2FPartner%20di%20Battle%20berikutnya." 
               target="_blank"
               class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 border-2 border-denim-600 text-denim-300 hover:text-white hover:bg-denim-800 font-medium rounded-full transition-all duration-300">
                
                Bergabung Menjadi Sponsor
            </a>
        </div>
    </x-section-wrapper>

    @include('sections.footer')
@endsection

@section('scripts')
    @stack('scripts')
@endsection