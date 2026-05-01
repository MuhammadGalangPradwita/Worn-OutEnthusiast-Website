{{-- Registration Form Section --}}
<section id="register" class="relative py-24 md:py-32 overflow-hidden">
    {{-- Dark background with pattern --}}
    <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-denim-900 to-navy-800">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22><rect width=%2240%22 height=%2240%22 fill=%22none%22/><circle cx=%2220%22 cy=%2220%22 r=%221%22 fill=%22%231e3a5f%22/></svg>'); background-size: 40px 40px;">
        </div>
    </div>

    <div class="absolute top-0 left-1/4 w-96 h-96 bg-denim-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-navy-500/10 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">

            <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl text-white mb-4 leading-tight">
                Siap Memulai <br>
                <span class="bg-gradient-to-r from-denim-300 to-denim-100 bg-clip-text text-transparent">Perjalanan Fade
                    Kamu?</span>
            </h2>
            <p class="text-denim-200 text-lg max-w-2xl mx-auto font-light">
                Isi form di bawah ini untuk mendaftarkan diri Anda pada kompetisi Worn-Out Enthusiast VOL II.
            </p>
        </div>

        {{-- Success Message --}}
        @if(session('registration_success'))
            <div class="mb-8 p-5 bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl text-center">
                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="font-semibold text-lg">{{ session('registration_success') }}</p>
            </div>
        @endif

        {{-- Registration Form --}}
        <form action="{{ route('participant.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-denim-800/60 border border-denim-600/20 rounded-2xl p-6 md:p-10 backdrop-blur-sm space-y-8">
            @csrf

            {{-- 1. Data Diri Section --}}
            <div class="space-y-6">
                <div class="border-b border-denim-600/30 pb-3">
                    <h3 class="text-xl font-display font-semibold text-white">Data Diri</h3>
                </div>

                {{-- Name & Age --}}
                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label for="name" class="block text-sm text-denim-300 mb-2">Nama Lengkap *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="Nama Lengkap Anda">
                        @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="age" class="block text-sm text-denim-300 mb-2">Usia *</label>
                        <input type="number" name="age" id="age" value="{{ old('age') }}" required min="1"
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="Usia Anda">
                        @error('age') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Gender & Shirt Size --}}
                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label for="gender" class="block text-sm text-denim-300 mb-2">Jenis Kelamin *</label>
                        <select name="gender" id="gender" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                            <option value="" class="bg-denim-800">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}
                                class="bg-denim-800">Laki-laki</option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}
                                class="bg-denim-800">Perempuan</option>
                        </select>
                        @error('gender') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <!-- <div>
                        <label for="shirt_size" class="block text-sm text-denim-300 mb-2">Size Baju *</label>
                        <select name="shirt_size" id="shirt_size" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                            <option value="" class="bg-denim-800">Pilih Size Baju (Panjang x Lebar)</option>

                            <optgroup label="─── SIZE CHART KAOS PUTIH ───"
                                class="bg-denim-900 text-denim-400 font-bold border-t border-denim-600/30">
                                <option value="S Putih" {{ old('shirt_size') == 'S Putih' ? 'selected' : '' }}
                                    class="bg-denim-800">S (66 Cm x 47 Cm)</option>
                                <option value="M Putih" {{ old('shirt_size') == 'M Putih' ? 'selected' : '' }}
                                    class="bg-denim-800">M (69 Cm x 50 Cm)</option>
                                <option value="L Putih" {{ old('shirt_size') == 'L Putih' ? 'selected' : '' }}
                                    class="bg-denim-800">L (72 Cm x 53 Cm)</option>
                                <option value="XL Putih" {{ old('shirt_size') == 'XL Putih' ? 'selected' : '' }}
                                    class="bg-denim-800">XL (74 Cm x 56 Cm)</option>
                                <option value="XXL Putih" {{ old('shirt_size') == 'XXL Putih' ? 'selected' : '' }}
                                    class="bg-denim-800">XXL (76 Cm x 59 Cm)</option>
                                <option value="XXXL Putih" {{ old('shirt_size') == 'XXXL Putih' ? 'selected' : '' }}
                                    class="bg-denim-800">XXXL (80 Cm x 62 Cm)</option>
                            </optgroup>

                            <optgroup label="─── SIZE CHART KAOS HITAM ───"
                                class="bg-denim-900 text-denim-400 font-bold border-t border-denim-600/30">
                                <option value="S Hitam" {{ old('shirt_size') == 'S Hitam' ? 'selected' : '' }}
                                    class="bg-denim-800">S (66 Cm x 47 Cm)</option>
                                <option value="M Hitam" {{ old('shirt_size') == 'M Hitam' ? 'selected' : '' }}
                                    class="bg-denim-800">M (69 Cm x 50 Cm)</option>
                                <option value="L Hitam" {{ old('shirt_size') == 'L Hitam' ? 'selected' : '' }}
                                    class="bg-denim-800">L (72 Cm x 53 Cm)</option>
                                <option value="XL Hitam" {{ old('shirt_size') == 'XL Hitam' ? 'selected' : '' }}
                                    class="bg-denim-800">XL (74 Cm x 56 Cm)</option>
                                <option value="XXL Hitam" {{ old('shirt_size') == 'XXL Hitam' ? 'selected' : '' }}
                                    class="bg-denim-800">XXL (76 Cm x 59 Cm)</option>
                                <option value="XXXL Hitam" {{ old('shirt_size') == 'XXXL Hitam' ? 'selected' : '' }}
                                    class="bg-denim-800">XXXL (80 Cm x 62 Cm)</option>
                            </optgroup>
                        </select>
                        @error('shirt_size') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div> -->
                </div>

                {{-- Dropdown Detail Kaos --}}
                <!-- <div x-data="{ open: false }"
                    class="bg-denim-700/30 border border-denim-600/30 rounded-lg overflow-hidden transition-all duration-300">
                    <button @click="open = !open" type="button"
                        class="w-full flex items-center justify-between px-4 py-3 text-sm text-denim-300 hover:bg-denim-600/50 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-denim-500/50">
                        <span class="font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Lihat Detail Kaos
                        </span>
                        <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition.opacity.duration.300ms
                        class="p-4 border-t border-denim-600/30 bg-denim-800/50 text-center" style="display: none;">
                        <div class="grid grid-cols-2 gap-4 w-full mb-3">
                            <div
                                class="relative rounded-lg overflow-hidden border border-denim-600/30 bg-navy-900/50 group flex items-center justify-center p-2">
                                <img src="{{ asset('images/Design Baju/1.webp') }}" alt="Mockup Kaos Putih"
                                    class="max-w-full h-auto rounded"
                                    onerror="this.onerror=null; this.src='https://placehold.co/600x400/1e3a5f/8baacc?text=Mockup+Kaos+Belum+Tersedia&font=roboto';">
                            </div>
                            <div
                                class="relative rounded-lg overflow-hidden border border-denim-600/30 bg-navy-900/50 group flex items-center justify-center p-2">
                                <img src="{{ asset('images/Design Baju/2.webp') }}" alt="Mockup Kaos Hitam"
                                    class="max-w-full h-auto rounded"
                                    onerror="this.onerror=null; this.src='https://placehold.co/600x400/1e3a5f/8baacc?text=Mockup+Kaos+Belum+Tersedia&font=roboto';">
                            </div>
                        </div>
                        <p class="text-xs text-denim-400">
                            Detail desain mockup kaos.
                        </p>
                    </div>
                </div> -->

                {{-- Instagram & Telegram --}}
                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label for="instagram" class="block text-sm text-denim-300 mb-2">Username Instagram (Tidak
                            di-private) *</label>
                        <input type="text" name="instagram" id="instagram" value="{{ old('instagram') }}" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="@username">
                        @error('instagram') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="telegram" class="block text-sm text-denim-300 mb-2">No WhatsApp *</label>
                        <input type="text" name="telegram" id="telegram" value="{{ old('telegram') }}" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="No. WhatsApp">
                        @error('telegram') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Address --}}
                <div>
                    <label for="address" class="block text-sm text-denim-300 mb-2">Alamat Lengkap Penerima *</label>
                    <textarea name="address" id="address" rows="3" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors resize-none"
                        placeholder="Alamat lengkap untuk pengiriman">{{ old('address') }}</textarea>
                    @error('address') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- 2. Data Denim Section --}}
            <div class="space-y-6 pt-4">
                <div class="border-b border-denim-600/30 pb-3">
                    <h3 class="text-xl font-display font-semibold text-white">Data Denim</h3>
                </div>

                {{-- Category (Kept as it maps to DB) --}}
                <div>
                    <label for="category_id" class="block text-sm text-denim-300 mb-2">Kategori Kompetisi *</label>
                    <select name="category_id" id="category_id" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                        <option value="" class="bg-denim-800">Pilih kategori kompetisi</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}
                                class="bg-denim-800">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Brand & Cut --}}
                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label for="denim_brand" class="block text-sm text-denim-300 mb-2">Brand Artikel *</label>
                        <input type="text" name="denim_brand" id="denim_brand" value="{{ old('denim_brand') }}" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="Nama Brand Denim">
                        @error('denim_brand') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="denim_cut" class="block text-sm text-denim-300 mb-2">Jenis Cuttingan Celana
                            *</label>
                        <input type="text" name="denim_cut" id="denim_cut" value="{{ old('denim_cut') }}" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="Contoh: Slim Straight, Regular, dll">
                        @error('denim_cut') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Oz / Weight & GDrive Link --}}
                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label for="denim_weight" class="block text-sm text-denim-300 mb-2">Oz / Ketebalan Celana Denim
                            *</label>
                        <input type="text" name="denim_weight" id="denim_weight" value="{{ old('denim_weight') }}"
                            required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="Contoh: 14oz, 18oz, dll">
                        @error('denim_weight') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="gdrive_link" class="block text-sm text-denim-300 mb-2">Link Google Drive
                            Portofolio/Bukti *</label>
                        <input type="url" name="gdrive_link" id="gdrive_link" value="{{ old('gdrive_link') }}" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors"
                            placeholder="Masukkan link Google Drive">
                        @error('gdrive_link') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Photos --}}
                <div class="space-y-4">
                    <p
                        class="text-sm border-l-4 border-yellow-500/50 bg-yellow-500/10 p-3 text-yellow-200/90 rounded-r">
                        <strong>Perhatian:</strong> Dalam foto celana denim (Tampak Depan & Belakang) wajib menyertakan
                        Tanggal, Bulan, dan Tahun saat foto diambil.
                    </p>

                    <div>
                        <label for="photo_front" class="block text-sm text-denim-300 mb-2">Foto Celana Denim Tampak
                            Depan *</label>
                        <input type="file" name="photo_front" id="photo_front" accept="image/*" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-denim-500 file:text-white hover:file:bg-denim-400 focus:outline-none focus:border-denim-400 transition-colors">
                        @error('photo_front') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="photo_back" class="block text-sm text-denim-300 mb-2">Foto Celana Denim Tampak
                            Belakang *</label>
                        <input type="file" name="photo_back" id="photo_back" accept="image/*" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-denim-500 file:text-white hover:file:bg-denim-400 focus:outline-none focus:border-denim-400 transition-colors">
                        @error('photo_back') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- 3. Pembayaran Section --}}
            <div class="space-y-6 pt-4">
                <div class="border-b border-denim-600/30 pb-3">
                    <h3 class="text-xl font-display font-semibold text-white">Pembayaran</h3>
                </div>

                <div class="bg-navy-900/40 border border-denim-600/30 rounded-2xl p-6 relative overflow-hidden group">
                    {{-- Decorative Blur --}}
                    <div
                        class="absolute -right-8 -top-8 w-24 h-24 bg-denim-500/10 rounded-full blur-2xl group-hover:bg-denim-500/20 transition-colors duration-500">
                    </div>

                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-denim-500/20 px-3 py-1 rounded-full border border-denim-500/30">
                                    <span class="text-xs font-bold text-denim-300 uppercase tracking-widest">Blue by
                                        BCA</span>
                                </div>
                                <div class="h-4 w-px bg-denim-700/50"></div>
                                <p class="text-sm text-denim-400">Pendaftaran Battle VOL II</p>
                            </div>

                            <div x-data="{ 
                                content: '004840978622',
                                copied: false,
                                copy() {
                                    navigator.clipboard.writeText(this.content);
                                    this.copied = true;
                                    setTimeout(() => this.copied = false, 2000);
                                }
                            }" class="flex items-center gap-4">
                                <span class="text-2xl md:text-3xl font-mono font-bold text-white tracking-widest"
                                    x-text="content"></span>
                                <button type="button" @click="copy()"
                                    class="p-2 rounded-lg bg-denim-700/30 border border-denim-600/30 text-denim-400 hover:text-white hover:bg-denim-600/50 transition-all flex items-center gap-2 group/copy">
                                    <svg x-show="!copied" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                    </svg>
                                    <svg x-show="copied" class="w-5 h-5 text-green-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-xs font-medium" x-text="copied ? 'Tersalin' : 'Salin'"></span>
                                </button>
                            </div>

                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-denim-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <p class="text-denim-200 font-medium">Salwa Fadilla</p>
                            </div>

                            <div class="flex items-start gap-2 pt-2 mt-2 border-t border-denim-600/30">
                                <svg class="w-4 h-4 text-denim-500 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-denim-300">Biaya registrasi VOL II sebesar <span
                                        class="font-bold text-white">Rp 75.000</span></p>
                            </div>
                        </div>

                        <div class="hidden md:block">
                            <div
                                class="w-16 h-16 bg-denim-500/10 rounded-2xl flex items-center justify-center border border-denim-500/20">
                                <svg class="w-8 h-8 text-denim-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="payment_proof" class="block text-sm text-denim-300 mb-2">Foto Bukti Pembayaran *</label>
                    <input type="file" name="payment_proof" id="payment_proof" accept="image/*" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-denim-500 file:text-white hover:file:bg-denim-400 focus:outline-none focus:border-denim-400 transition-colors">
                    @error('payment_proof') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-2" x-data="{ 
                    isExpired: false,
                    checkExpiry() {
                        this.isExpired = new Date('{{ $settings['countdown_deadline'] ?? '2026-06-30 23:59:59' }}').getTime() <= new Date().getTime();
                    }
                }" x-init="checkExpiry(); setInterval(() => checkExpiry(), 1000)"
                @countdown-expired.window="isExpired = true">
                <button type="submit" :disabled="isExpired" @click="if(isExpired) $event.preventDefault()"
                    :class="isExpired ? 'w-full md:w-auto inline-flex items-center justify-center gap-3 px-12 py-4 bg-denim-800/50 text-denim-300/50 cursor-not-allowed font-bold text-base rounded-xl transition-all duration-300 border border-denim-600/30' : 'w-full md:w-auto inline-flex items-center justify-center gap-3 px-12 py-4 bg-white text-denim-900 font-bold text-base rounded-xl hover:bg-denim-100 transition-all duration-300 hover:shadow-2xl hover:shadow-white/10 hover:-translate-y-0.5'">
                    <svg x-show="!isExpired" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span x-text="isExpired ? 'Pendaftaran Ditutup' : 'Daftar sekarang'">Daftar sekarang</span>
                </button>
            </div>
        </form>
    </div>
</section>