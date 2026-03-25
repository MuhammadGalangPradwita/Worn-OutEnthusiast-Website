@extends('admin.layouts.app')
@section('title', 'Recap VOL I')

@section('content')
    <div class="max-w-3xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">Recap VOL I Content</h2>

        {{-- Text Content --}}
        <form action="{{ route('admin.content.recap.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 mb-8">
            @csrf @method('PUT')

            {{-- Champion Circle --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    Pemenang (Champion Circle)
                </h3>
                <div class="space-y-6">
                    @for ($i = 0; $i < 3; $i++)
                        @php 
                            $winner = (isset($settings['recap_winners']) && is_array($settings['recap_winners']) && isset($settings['recap_winners'][$i])) 
                                ? $settings['recap_winners'][$i] 
                                : ['name' => '', 'brand' => '', 'quote' => '', 'photo' => '']; 
                        @endphp
                        <div class="border border-denim-700/50 rounded-lg p-4 bg-navy-800/50">
                            <h4 class="text-denim-400 text-sm font-bold mb-3">Juara {{ $i + 1 }}</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs text-denim-400 mb-1">Nama Peserta</label>
                                    <input type="text" name="recap_winners[{{ $i }}][name]" value="{{ old('recap_winners.'.$i.'.name', $winner['name'] ?? '') }}" placeholder="Nama Peserta" class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400">
                                </div>
                                <div>
                                    <label class="block text-xs text-denim-400 mb-1">Brand Denim</label>
                                    <input type="text" name="recap_winners[{{ $i }}][brand]" value="{{ old('recap_winners.'.$i.'.brand', $winner['brand'] ?? '') }}" placeholder="LokalBrand Co." class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400">
                                </div>
                                <div class="md:col-span-2" x-data="{
                                    existingPhotos: '{{ old('recap_winners.'.$i.'.photo', $winner['photo'] ?? '') }}'.split(',').filter(Boolean).map(url => url.trim()),
                                    removeExisting(index) {
                                        this.existingPhotos.splice(index, 1);
                                    }
                                }">
                                    <label class="block text-xs text-denim-400 mb-2">Foto (Upload File)</label>
                                    
                                    {{-- Existing Photos Preview --}}
                                    <template x-if="existingPhotos.length > 0">
                                        <div class="mb-3">
                                            <p class="text-[10px] text-denim-400 mb-2 uppercase tracking-wider">Foto Tersimpan:</p>
                                            <div class="flex flex-wrap gap-2">
                                                <template x-for="(photo, index) in existingPhotos" :key="index">
                                                    <div class="relative group w-16 h-16 rounded-md overflow-hidden bg-denim-900 border border-denim-600/30">
                                                        <img :src="photo" class="w-full h-full object-cover">
                                                        {{-- Hidden input to keep this photo in the final array during submit --}}
                                                        <input type="hidden" :name="'recap_winners[{{ $i }}][existing_photos][]'" :value="photo">
                                                        <button type="button" @click="removeExisting(index)" class="absolute inset-0 bg-red-500/80 text-white opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity" title="Hapus foto ini">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>

                                    {{-- File Upload Input --}}
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1 w-full">
                                            <input type="file" name="recap_winners[{{ $i }}][images][]" accept="image/*" multiple
                                                class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-xs file:bg-denim-600 file:text-white">
                                        </div>
                                    </div>
                                    <p class="text-[10px] text-denim-400 mt-1">Bisa pilih lebih dari satu file (multiple) untuk carousel.</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs text-denim-400 mb-1">Highlight Fade / Quote</label>
                                    <textarea name="recap_winners[{{ $i }}][quote]" rows="2" placeholder="Hasil fade kontras tinggi dengan whisker tajam..." class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 resize-none">{{ old('recap_winners.'.$i.'.quote', $winner['quote'] ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Best Fades Spotlight --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    Best Fades Spotlight
                </h3>
                <div class="space-y-6">
                    @for ($i = 0; $i < 4; $i++)
                        @php 
                            $fade = (isset($settings['recap_best_fades']) && is_array($settings['recap_best_fades']) && isset($settings['recap_best_fades'][$i])) 
                                ? $settings['recap_best_fades'][$i] 
                                : ['title' => '', 'participant' => '', 'desc' => '', 'photo' => '']; 
                        @endphp
                        <div class="border border-denim-700/50 rounded-lg p-4 bg-navy-800/50">
                            <h4 class="text-denim-400 text-sm font-bold mb-3">Fade {{ $i + 1 }}</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs text-denim-400 mb-1">Judul Fade</label>
                                    <input type="text" name="recap_best_fades[{{ $i }}][title]" value="{{ old('recap_best_fades.'.$i.'.title', $fade['title'] ?? '') }}" placeholder="High Contrast Honeycomb" class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400">
                                </div>
                                <div>
                                    <label class="block text-xs text-denim-400 mb-1">Peserta & Specs</label>
                                    <input type="text" name="recap_best_fades[{{ $i }}][participant]" value="{{ old('recap_best_fades.'.$i.'.participant', $fade['participant'] ?? '') }}" placeholder="Peserta X • 18oz Selvedge" class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400">
                                </div>
                                <div class="md:col-span-2" x-data="{
                                    existingPhotos: '{{ old('recap_best_fades.'.$i.'.photo', $fade['photo'] ?? '') }}'.split(',').filter(Boolean).map(url => url.trim()),
                                    removeExisting(index) {
                                        this.existingPhotos.splice(index, 1);
                                    }
                                }">
                                    <label class="block text-xs text-denim-400 mb-2">Foto (Upload File)</label>
                                    
                                    {{-- Existing Photos Preview --}}
                                    <template x-if="existingPhotos.length > 0">
                                        <div class="mb-3">
                                            <p class="text-[10px] text-denim-400 mb-2 uppercase tracking-wider">Foto Tersimpan:</p>
                                            <div class="flex flex-wrap gap-2">
                                                <template x-for="(photo, index) in existingPhotos" :key="index">
                                                    <div class="relative group w-16 h-16 rounded-md overflow-hidden bg-denim-900 border border-denim-600/30">
                                                        <img :src="photo" class="w-full h-full object-cover">
                                                        {{-- Hidden input to keep this photo in the final array during submit --}}
                                                        <input type="hidden" :name="'recap_best_fades[{{ $i }}][existing_photos][]'" :value="photo">
                                                        <button type="button" @click="removeExisting(index)" class="absolute inset-0 bg-red-500/80 text-white opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity" title="Hapus foto ini">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>

                                    {{-- File Upload Input --}}
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1 w-full">
                                            <input type="file" name="recap_best_fades[{{ $i }}][images][]" accept="image/*" multiple
                                                class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-xs file:bg-denim-600 file:text-white">
                                        </div>
                                    </div>
                                    <p class="text-[10px] text-denim-400 mt-1">Bisa pilih lebih dari satu file (multiple) untuk carousel.</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs text-denim-400 mb-1">Deskripsi Singkat</label>
                                    <textarea name="recap_best_fades[{{ $i }}][desc]" rows="2" placeholder="Pemakaian aktif 6 bulan tanpa pencucian awal..." class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 resize-none">{{ old('recap_best_fades.'.$i.'.desc', $fade['desc'] ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button type="submit"
                    class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">
                    Save Recap Content
                </button>
            </div>
        </form>

        {{-- Recap Images --}}
        <div>
            <h3 class="font-display font-semibold text-white mb-4 flex items-center gap-2">
                <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Foto Recap
            </h3>

            {{-- Upload --}}
            <form action="{{ route('admin.recap-images.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-5 mb-4">
                @csrf
                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3">
                    <div class="flex-1 w-full">
                        <label class="block text-xs text-denim-400 mb-1">Image</label>
                        <input type="file" name="image" accept="image/*" required
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-xs file:bg-denim-600 file:text-white">
                    </div>
                    <div class="flex-1 w-full">
                        <label class="block text-xs text-denim-400 mb-1">Caption</label>
                        <input type="text" name="caption" placeholder="Deskripsi gambar"
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors whitespace-nowrap">
                        Upload
                    </button>
                </div>
            </form>

            {{-- Grid --}}
            @if($images->count())
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach($images as $img)
                        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl overflow-hidden group relative">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->caption }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-3">
                                <p class="text-white text-xs font-medium truncate">{{ $img->caption ?? 'No caption' }}</p>
                                <div class="flex items-center justify-end mt-2">
                                    <form action="{{ route('admin.recap-images.destroy', $img) }}" method="POST"
                                        onsubmit="return confirm('Delete?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-denim-800/30 border border-denim-600/10 rounded-xl p-8 text-center">
                    <p class="text-denim-500 text-sm">Belum ada foto recap. Upload di atas.</p>
                </div>
            @endif
        </div>
    </div>
@endsection