@extends('admin.layouts.app')
@section('title', 'Doorprize')

@section('content')
    <div class="max-w-3xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">Doorprize</h2>

        {{-- Add Doorprize Form --}}
        <form action="{{ route('admin.doorprizes.store') }}" method="POST"
            class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-5 mb-6">
            @csrf
            <h3 class="font-display font-semibold text-white mb-4 text-sm">+ Tambah Doorprize</h3>
            <div class="grid sm:grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Juara Ke *</label>
                    <select name="rank" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                        <option value="1">Juara 1</option>
                        <option value="2">Juara 2</option>
                        <option value="3">Juara 3</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Nama Hadiah *</label>
                    <input type="text" name="name" required
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="Contoh: Grand Prize">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Jumlah Hadiah (Rp) *</label>
                    <input type="number" name="prize_amount" required min="0"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="5000000">
                </div>
                <div>
                    <label class="block text-xs text-denim-400 mb-1">Keterangan</label>
                    <input type="text" name="description"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors"
                        placeholder="+ Trophy + Sertifikat">
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">
                    Tambah
                </button>
            </div>
        </form>

        {{-- Doorprize List --}}
        @if($doorprizes->count())
            <div class="space-y-3">
                @foreach($doorprizes as $dp)
                    <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-5 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full flex items-center justify-center font-display font-bold text-lg
                                    {{ $dp->rank === 1 ? 'bg-gold-400/20 text-gold-400' : ($dp->rank === 2 ? 'bg-gray-400/20 text-gray-300' : 'bg-amber-700/20 text-amber-600') }}">
                                {{ $dp->rank }}
                            </div>
                            <div>
                                <h4 class="text-white font-semibold text-sm">{{ $dp->name }}</h4>
                                <p class="text-gold-400 font-display font-bold text-lg">Rp
                                    {{ number_format($dp->prize_amount, 0, ',', '.') }}</p>
                                @if($dp->description)
                                    <p class="text-denim-400 text-xs mt-1">{{ $dp->description }}</p>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('admin.doorprizes.destroy', $dp) }}" method="POST"
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
                @endforeach
            </div>
        @else
            <div class="bg-denim-800/30 border border-denim-600/10 rounded-xl p-8 text-center">
                <p class="text-denim-500 text-sm">Belum ada doorprize. Tambahkan di form di atas.</p>
            </div>
        @endif
    </div>
@endsection