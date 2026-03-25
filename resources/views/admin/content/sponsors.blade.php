@extends('admin.layouts.app')
@section('title', 'Sponsors & Partners')

@section('content')
    <div class="max-w-3xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">Sponsors & Partners</h2>

        {{-- Add Sponsor Form --}}
        <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 mb-8">
            @csrf
            <h3 class="font-display font-semibold text-white mb-4 text-sm">Upload Logo Sponsor / Partner Baru</h3>
            
            <div class="flex items-end gap-4">
                <div class="flex-1">
                    <label class="block text-xs text-denim-400 mb-2 text-uppercase tracking-wider font-bold">Logo Gambar *</label>
                    <input type="file" name="logo" accept="image/*" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-denim-500 file:text-white hover:file:bg-denim-400">
                </div>
                <button type="submit"
                    class="px-8 py-3 bg-denim-500 hover:bg-denim-400 text-white text-sm font-bold rounded-lg transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                    Upload Logo
                </button>
            </div>
            <p class="mt-4 text-[10px] text-denim-500 leading-relaxed">
                * Format yang disarankan: PNG (Transparan) dengan ukurna Max 2,5 Mb.
            </p>
        </form>

        {{-- Sponsor Grid --}}
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-display font-semibold text-white text-sm">Daftar Logo Tersimpan</h3>
            <span class="text-[10px] text-denim-500 uppercase tracking-widest font-bold">{{ $sponsors->count() }} LOGO</span>
        </div>

        @if($sponsors->count())
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach($sponsors as $sponsor)
                    <div class="bg-denim-800/50 border border-denim-600/20 rounded-2xl overflow-hidden group relative">
                        {{-- Delete overlay --}}
                        <div class="absolute inset-0 bg-navy-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 z-10">
                            <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST"
                                onsubmit="return confirm('Hapus logo ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500/20 hover:bg-red-600 text-white px-4 py-2 rounded-full border border-red-500/50 text-[10px] font-bold uppercase tracking-widest flex items-center gap-2 transition-all transform hover:scale-105 active:scale-95">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>

                        <div class="aspect-square flex items-center justify-center p-6 bg-white shrink-0">
                            <img src="{{ asset('storage/' . $sponsor->logo_path) }}" 
                                class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-denim-800/30 border border-denim-600/10 rounded-2xl p-12 text-center border-dashed">
                <div class="w-16 h-16 bg-denim-700/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-denim-600/30">
                    <svg class="w-8 h-8 text-denim-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-denim-500 text-sm font-medium">Belum ada logo sponsor terseimpan.</p>
            </div>
        @endif

    </div>
@endsection