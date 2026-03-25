{{-- Rules Section --}}
<x-section-wrapper id="rules" :dark="true">
    <div class="text-center mb-12">
        <p class="text-denim-400 text-sm tracking-[0.2em] uppercase font-medium mb-4">Peraturan Lomba</p>
        <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white">
            Peraturan & Ketentuan
        </h2>
    </div>

    <div class="max-w-3xl mx-auto space-y-3">
        {{-- RULE 1 --}}
        <x-accordion-item title="RULE 1 - Produk harus RAW/NATURAL" :open="true">
            <p class="text-denim-300 text-sm leading-relaxed mb-4">Produk yang digunakan harus:</p>
            <ul class="list-disc list-inside space-y-2 text-denim-300 text-sm leading-relaxed">
                <li>Produk yang baru dibeli (full packaging)</li>
                <li>Belum pernah dipakai sama sekali (belum melalui proses initial soak/soak)</li>
            </ul>
        </x-accordion-item>

        {{-- RULE 2 --}}
        <x-accordion-item title="RULE 2 - Fade yang harus ALAMI/NATURAL" :open="false">
            <p class="text-denim-300 text-sm leading-relaxed mb-4">Peserta dilarang melakukan manipulasi fade seperti:</p>
            <ul class="list-disc list-inside space-y-2 text-denim-300 text-sm leading-relaxed">
                <li>Menggosok permukaan kain menggunakan amplas atau alat khusus untuk membuat efek pudar seperti di bagian: paha, lutut atau saku</li>
                <li>Memutuhkan atau memudarkan warna kain menggunakan bahan kimia (pemutih)</li>
                <li>Menyikat permukaan kain menggunakan sikat khusus untuk membuat tekstur lebih lembut dan sedikit pudar</li>
                <li>Memudarkan warna kain menggunakan bahan kimia tanpa harus digosok secara fisik yang menimbulkan warna kain terlihat lebih tua atau vintage</li>
                <li>Membuat efek rusak atau usang secara sengaja seperti sobekan, benang terurai, lubang kecil atau efek robek di lutut</li>
            </ul>
            <!-- <p class="mt-4 text-denim-400 text-sm italic font-medium">(*Karakter produk harus terbentuk dari penggunaan sehari-hari)</p> -->
        </x-accordion-item>

        {{-- RULE 3 --}}
        <x-accordion-item title="RULE 3 - Ketentuan Peserta" :open="false">
            <ul class="list-disc list-inside space-y-3 text-denim-300 text-sm leading-relaxed">
                <li>Peserta wajib menggunakan akun instagram asli yang tidak terkunci (tidak diperbolehkan menggunakan akun baru)</li>
                <li>Peserta tidak diperbolehkan untuk mengganti username instagram selama denim battle berlangsung</li>
                <li>Peserta tidak diperbolehkan mengunggah submission setiap bulannya menggunakan akun yang berbeda</li>
                <li>Peserta diperbolehkan aktif dalam group whatsapp, instagram dan tiktok dengan catatan, bilamana setiap upload konten ataupun progress diwajibkan untuk tag akun sosial media Worn-Out Enthusiast dan dua juri terkait <span class="text-white italic">(idandenim & swissjeansfreak)</span></li>
                <li>Peserta wajib follow:
                    <ol class="list-decimal text-white list-inside ml-6 mt-2 space-y-1">
                        <li>Wornoutenthusiast</li>
                        <li>swissjeansfreak</li>
                        <li>idandenim</li>
                    </ol>
                </li>
                <li>Peserta diwajibkan untuk mengupload progress bulanan yang telah ditentukan pada sosial media instagram:
                    <ul class="list-disc list-inside ml-6 mt-2 space-y-1">
                        <li>Slide 1 (bagian depan celana)</li>
                        <li>Slide 2 (bagian belakang celana)</li>
                        <li>Slide 3 (celana ketika dipakai disertakan kode setiap bulannya yang akan diberikan)</li>
                        <li>Caption: <span class="text-white font-mono">(0/183)</span><br>Nama:<br>Brand:<br>Artikel:</li>
                        <li>Menggunakan hashtag di setiap postingan: <span class="text-white font-mono">#wornoutenthusiast #wornoutbattlevol2 #nonselvedgedenim</span></li>
                    </ul>
                </li>
                <li>Peserta diwajibkan untuk mengupload submission setiap bulannya melalui website resmi Worn-Out Enthusiast</li>
                <li>Bilamana peserta tidak meng-upload progress bulanan yang telah ditentukan akan langsung didiskualifikasi.</li>
                <li>Update progress dilakukan pada tanggal 11 setiap bulannya.</li>
                <li>Denim yang diikutsertakan tidak diperbolehkan di insoak, soak, handwash, seawash dan machine wash sampai submission terakhir.</li>
                <li>Top 10 peserta denim battle akan ditentukan oleh juri <span class="text-white">idandenim</span>. Setelah itu akan dilanjutkan untuk juara 1, 2 dan 3 yang akan dikirim dan dinilai oleh juri <span class="text-white">swissjeansfreak</span>.</li>
                <li>Peserta yang masuk top 10 mengirimkan celana yang di battlekan kepada tim Worn-Out Enthusiast.</li>
                <li>Denim yang dipakai oleh pemenang juara 1, 2 dan 3 akan menjadi archive <span class="text-denim-300 italic">swissjeansfreak</span> didalam museumnya.</li>
                <li>Denim yang dipakai oleh top 4 dan 5 akan menjadi archive Worn-Out Enthusiast.</li>
                <li>Keputusan juri bersifat mutlak</li>
                <li>Penilaian akan dilakukan oleh juri dengan objektif sesuai dengan point yang telah disepakati</li>
                <li>Pemenang akan dihubungi secara langsung oleh pihak Worn-Out Enthusiast</li>
            </ul>
        </x-accordion-item>

        {{-- RULE 4 --}}
        <x-accordion-item title="RULE 4 - Respect the community" :open="false">
            <p class="text-denim-300 text-sm leading-relaxed mb-4">Peserta wajib menjaga sikap terhadap peserta lainnya.</p>
            <p class="text-white font-bold text-xs uppercase tracking-widest mb-2">DILARANG:</p>
            <ul class="list-disc list-inside space-y-2 text-denim-300 text-sm leading-relaxed mb-4">
                <li>Menjatuhkan peserta lain</li>
                <li>Melakukan plagiarisme konten</li>
                <li class="text-white">MEMANIPULASI HASIL</li>
            </ul>
            <!-- <div class="bg-navy-900/50 p-4 rounded-xl border border-denim-700/30 text-center">
                <p class="text-denim-300 text-sm italic">"Worn-Out Enthusiast adalah ruang untuk berbagi perjalanan dan saling mendukung"</p>
            </div> -->
        </x-accordion-item>
    </div>

    {{-- Download PDF Button --}}
    @if(!empty($settings['rules_pdf']))
        <div class="text-center mt-10">
            <a href="{{ asset('storage/' . $settings['rules_pdf']) }}" download
                class="inline-flex items-center gap-3 px-8 py-3 bg-gradient-to-r from-denim-500 to-denim-600 hover:from-denim-400 hover:to-denim-500 text-white font-medium rounded-full transition-all duration-300 shadow-lg shadow-denim-500/20 hover:shadow-denim-500/40">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download Rules PDF
            </a>
        </div>
    @endif
</x-section-wrapper>