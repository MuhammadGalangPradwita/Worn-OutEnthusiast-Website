@extends('admin.layouts.app')
@section('title', 'Leaderboard')

@section('content')
    <div class="max-w-3xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">Leaderboard Content</h2>

        {{-- Add Entry Form --}}
        <form action="{{ route('admin.leaderboard.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-5 mb-8">
            @csrf
            <h3 class="font-display font-semibold text-white mb-4 text-sm">+ Tambah Entry Baru</h3>
            <div class="grid sm:grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Nama Peserta *</label>
                    <input type="text" name="participant_name" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="Nama peserta">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Kategori *</label>
                    <select name="category" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                        <option value="top_monthly">Top Peserta Bulan Ini</option>
                        <option value="top_fade">Top Fade Ranking</option>
                        <option value="best_story">Best Story</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Bulan</label>
                    <input type="text" name="month_label"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="e.g. Maret 2026">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Rank</label>
                    <input type="number" name="rank" value="1" min="1"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Foto</label>
                    <input type="file" name="image" accept="image/*"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-xs file:bg-denim-600 file:text-white">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Deskripsi</label>
                    <input type="text" name="description"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="Deskripsi singkat">
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">
                    Tambah
                </button>
            </div>
        </form>

        {{-- Top Peserta Bulan Ini --}}
        @foreach([
            ['key' => 'top_monthly', 'label' => '🏆 Top Peserta Bulan Ini', 'data' => $topMonthly],
            ['key' => 'top_fade', 'label' => '👖 Top Fade Ranking', 'data' => $topFade],
            ['key' => 'best_story', 'label' => '📖 Best Story', 'data' => $bestStory],
        ] as $section)
        <div class="mb-6">
            <h3 class="font-display font-semibold text-white mb-3">{{ $section['label'] }}</h3>
            @if($section['data']->count())
            <div class="space-y-2">
                @foreach($section['data'] as $entry)
                <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-4 flex items-center gap-4">
                    {{-- Rank --}}
                    <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold
                        {{ $entry->rank === 1 ? 'bg-gold-400/20 text-gold-400' : ($entry->rank === 2 ? 'bg-gray-400/20 text-gray-300' : ($entry->rank === 3 ? 'bg-amber-600/20 text-amber-500' : 'bg-denim-600/30 text-denim-300')) }}">
                        #{{ $entry->rank }}
                    </div>
                    {{-- Image --}}
                    @if($entry->image_path)
                    <img src="{{ asset('storage/' . $entry->image_path) }}" class="w-10 h-10 rounded-full object-cover flex-shrink-0">
                    @else
                    <div class="w-10 h-10 rounded-full bg-denim-600/30 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    @endif
                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ $entry->participant_name }}</p>
                        <p class="text-denim-400 text-xs truncate">{{ $entry->description ?? '' }} {{ $entry->month_label ? '· ' . $entry->month_label : '' }}</p>
                    </div>
                    {{-- Delete --}}
                    <form action="{{ route('admin.leaderboard.destroy', $entry) }}" method="POST" onsubmit="return confirm('Delete this entry?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            @else
            <div class="bg-denim-800/30 border border-denim-600/10 rounded-xl p-6 text-center">
                <p class="text-denim-500 text-sm">Belum ada entry. Tambahkan di form di atas.</p>
            </div>
            @endif
        </div>
        @endforeach
    </div>
@endsection
