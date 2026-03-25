@extends('admin.layouts.app')
@section('title', 'Competition Rules')

@section('content')
    <div class="max-w-3xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">Competition Rules</h2>

        {{-- PDF Upload --}}
        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-5 mb-6">
            <h3 class="font-display font-semibold text-white mb-3 text-sm flex items-center gap-2">
                <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm-1 2l5 5h-5V4zM6 20V4h5v7h7v9H6z" />
                </svg>
                File PDF Rules
            </h3>
            
            @if($rulesPdf)
                <div class="flex items-center justify-between bg-denim-700/20 border border-denim-600/20 rounded-lg px-4 py-3 mb-3">
                    <div class="flex items-center gap-3">
                        <svg class="w-8 h-8 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm-1 2l5 5h-5V4zM6 20V4h5v7h7v9H6z" />
                        </svg>
                        <div>
                            <p class="text-white text-sm font-medium">{{ basename($rulesPdf) }}</p>
                            <a href="{{ asset('storage/' . $rulesPdf) }}" target="_blank" class="text-denim-400 text-xs hover:text-denim-300">Preview PDF</a>
                        </div>
                    </div>
                    <form action="{{ route('admin.rules.delete-pdf') }}" method="POST" onsubmit="return confirm('Delete PDF?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endif

            <form action="{{ route('admin.rules.upload-pdf') }}" method="POST" enctype="multipart/form-data" class="flex items-end gap-3">
                @csrf
                <div class="flex-1">
                    <label class="block text-xs text-denim-400 mb-1">{{ $rulesPdf ? 'Ganti PDF' : 'Upload PDF' }}</label>
                    <input type="file" name="rules_pdf" accept=".pdf" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-xs file:bg-denim-600 file:text-white">
                </div>
                <button type="submit" class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors whitespace-nowrap">
                    Upload
                </button>
            </form>
        </div>

        <div class="bg-denim-800/30 border border-denim-600/10 rounded-xl p-6">
            <p class="text-denim-400 text-sm leading-relaxed">
                <span class="text-white font-medium">Catatan:</span> Rules pada halaman depan kini bersifat hardcoded untuk Battle VOL II. Admin panel ini hanya digunakan untuk mengelola file PDF yang dapat diunduh oleh peserta.
            </p>
        </div>
    </div>
@endsection