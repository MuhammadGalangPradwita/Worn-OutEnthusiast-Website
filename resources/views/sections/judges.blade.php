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
                    'name' => 'Ruedi Karrer (swissjeansfreak)',
                    'title' => 'Founder of The Jeans Museum in Zurich',
                    'thumbnail' => 'images/Ruedi Karrer/profileruedekareer.jpg',
                    'instagram' => 'https://www.instagram.com/swissjeansfreak',
                    'sections' => [
                        [
                            'text' => "Ruedi Karrer adalah seorang kolektor denim dan penggemar raw denim asal Zürich, Swiss, yang telah mendedikasikan lebih dari lima dekade hidupnya untuk mempelajari dan mendokumentasikan perjalanan denim. Ia lahir pada tahun 1959 dan tumbuh di sebuah desa pegunungan di Swiss bersama keluarga besar. Ketertarikannya pada denim dimulai pada tahun 1973 ketika keluarganya menerima paket donasi pakaian yang berisi dua pasang jeans Levi’s dari tahun 1960-an. Sejak saat itu, ketertarikannya terhadap raw denim berkembang menjadi sebuah passion yang mendalam.",
                        ],
                        [
                            'text' => "Selama bertahun-tahun, Karrer mulai mengoleksi berbagai jenis jeans dan jaket denim yang menunjukkan proses fading alami akibat pemakaian jangka panjang. Ketertarikannya bukan hanya pada merek atau desain, tetapi pada cerita kehidupan yang terekam di dalam kain denim melalui lipatan, fade, dan bekas penggunaan.",
                        ],
                        [
                            'text' => "Pada tahun 2002, ia mendirikan Jeansmuseum of Heaviest Fadings di Zürich, sebuah museum independen yang menampilkan ribuan koleksi denim dengan fading alami dari berbagai negara dan era. Museum ini menampilkan jeans dari tahun 1950-an hingga masa kini, yang sebagian besar menunjukkan bagaimana denim berkembang seiring waktu melalui pemakaian, perbaikan, dan modifikasi oleh pemiliknya. Selama lebih dari 50 tahun, Karrer telah mengumpulkan lebih dari 14.000 item denim, menjadikannya salah satu arsip koleksi raw denim terbesar yang berfokus pada natural fading.",
                            'photos' => [
                                'images/Ruedi Karrer/1.jpeg',
                                'images/Ruedi Karrer/2.jpeg',
                                'images/Ruedi Karrer/7.jpeg',
                                'images/Ruedi Karrer/4.jpeg',
                                'images/Ruedi Karrer/8.jpeg',
                                'images/Ruedi Karrer/6.jpeg',
                            ]
                        ]
                    ]
                ],
                [
                    'name' => 'Qowiyyun Tigin Syahidan (idandenim)',
                    'title' => 'Content Creator dan Influencer',
                    'thumbnail' => 'images/Idan Denim/profileidandenim.jpg',
                    'instagram' => 'https://www.instagram.com/idandenim',
                    'sections' => [
                        [
                            'text' => "Idandenim merupakan content creator dan influencer di bidang raw denim yang telah menekuni dunia denim selama lebih dari enam tahun. Melalui konten edukatif dan dokumentasi perjalanan pemakaian denim, ia aktif membagikan pengetahuan mengenai karakter fading, konstruksi, serta budaya raw denim kepada komunitas yang lebih luas. Ia juga merupakan pendiri Worn-Out Enthusiast, yang berawal sebagai komunitas pecinta denim dan kini berkembang menjadi sebuah organisasi yang mewadahi para denim enthusiast dalam berbagi pengetahuan, pengalaman, dan apresiasi terhadap denim.",
                            'photos' => [
                                'images/Idan Denim/1.JPG',
                                'images/Idan Denim/2.jpeg',
                                'images/Idan Denim/3.jpeg',
                            ]
                        ],
                        
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
            <div class="flex flex-col md:flex-row justify-center items-center md:items-start gap-12 md:gap-8 pb-8">
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

            <!-- {{-- Top: Logos / Brand Identity --}}
            <div class="flex justify-center items-center gap-8 md:gap-12 mb-12 opacity-80">
                <x-logo class="h-12 md:h-16 w-auto grayscale brightness-200" />
                <div class="h-8 w-px bg-denim-700/50"></div>
                <div class="text-denim-400 font-display font-bold tracking-tighter text-xl md:text-2xl uppercase">
                    Profil <span class="text-white">Juri</span>
                </div>
            </div> -->

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
    </div>
</x-section-wrapper>