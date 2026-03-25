@extends('admin.layouts.app')
@section('title', 'Participant Detail')

@section('content')
    <div class="max-w-3xl">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.participants.index') }}" class="text-denim-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-display font-bold text-xl text-white">Participant Detail</h2>
        </div>

        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 md:p-8">
            {{-- Header --}}
            <div class="flex items-start justify-between mb-6 pb-6 border-b border-denim-700/30">
                <div>
                    <h3 class="font-display font-bold text-2xl text-white">{{ $participant->name }}</h3>
                    <p class="text-denim-400 text-sm mt-1">Registered {{ $participant->created_at->format('d M Y, H:i') }}
                    </p>
                </div>
                @php
                    $statusClasses = [
                        'pending' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/30',
                        'approved' => 'bg-green-500/10 text-green-400 border-green-500/30',
                        'rejected' => 'bg-red-500/10 text-red-400 border-red-500/30',
                    ];
                @endphp
                <span
                    class="px-3 py-1.5 rounded-full text-sm font-medium border {{ $statusClasses[$participant->status] ?? '' }}">
                    {{ ucfirst($participant->status) }}
                </span>
            </div>

            {{-- Details Grid --}}
            <div class="grid md:grid-cols-2 gap-6 pb-6">
                <div>
                    <label class="text-xs text-denim-500 uppercase tracking-wider">Usia</label>
                    <p class="text-white mt-1">{{ $participant->age }} Tahun</p>
                </div>
                <div>
                    <label class="text-xs text-denim-500 uppercase tracking-wider">Jenis Kelamin</label>
                    <p class="text-white mt-1">{{ $participant->gender }}</p>
                </div>
                <div>
                    <label class="text-xs text-denim-500 uppercase tracking-wider">Size Baju</label>
                    <p class="text-white mt-1">{{ $participant->shirt_size }}</p>
                </div>
                <div>
                    <label class="text-xs text-denim-500 uppercase tracking-wider">Kategori</label>
                    <p class="text-white mt-1">{{ $participant->category?->name ?? '-' }}</p>
                </div>
                <div>
                    <label class="text-xs text-denim-500 uppercase tracking-wider">Instagram</label>
                    <p class="text-white mt-1">
                        <a href="https://instagram.com/{{ ltrim($participant->instagram, '@') }}" target="_blank"
                            class="text-denim-300 hover:text-white transition-colors underline">{{ $participant->instagram }}</a>
                    </p>
                </div>
                <div>
                    <label class="text-xs text-denim-500 uppercase tracking-wider">Telegram</label>
                    <p class="text-white mt-1">{{ $participant->telegram }}</p>
                </div>
            </div>

            <div class="border-t border-denim-700/30 pt-6 pb-6 space-y-4">
                <label class="text-xs text-denim-500 uppercase tracking-wider">Alamat Penerima</label>
                <p class="text-white mt-1 leading-relaxed">{{ $participant->address }}</p>
            </div>

            {{-- Denim Data --}}
            <div class="border-t border-denim-700/30 pt-6 pb-6">
                <h4 class="font-display font-bold text-lg text-white mb-4">Data Denim & Portofolio</h4>
                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="text-xs text-denim-500 uppercase tracking-wider">Brand</label>
                        <p class="text-white mt-1">{{ $participant->denim_brand }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-denim-500 uppercase tracking-wider">Cut/Fit</label>
                        <p class="text-white mt-1">{{ $participant->denim_cut }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-denim-500 uppercase tracking-wider">Oz/Weight</label>
                        <p class="text-white mt-1">{{ $participant->denim_weight }}</p>
                    </div>
                </div>
                <div>
                    <label class="text-xs text-denim-500 uppercase tracking-wider">Link Google Drive Portofolio</label>
                    <p class="text-white mt-1">
                        @if($participant->gdrive_link)
                            <a href="{{ $participant->gdrive_link }}" target="_blank" class="text-denim-300 hover:text-white transition-colors underline break-all">{{ $participant->gdrive_link }}</a>
                        @else
                            <span class="text-denim-400 italic">Tidak ada link terlampir</span>
                        @endif
                    </p>
                </div>
            </div>

            {{-- Photos --}}
            <div class="border-t border-denim-700/30 pt-6">
                <h4 class="font-display font-bold text-lg text-white mb-4">Foto & Pembayaran</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label class="text-xs text-denim-500 uppercase tracking-wider block mb-2">Tampak Depan</label>
                        <a href="{{ asset('storage/' . $participant->photo_front) }}" target="_blank"
                            class="block group relative rounded-lg overflow-hidden border border-denim-600/30 aspect-[3/4]">
                            <img src="{{ asset('storage/' . $participant->photo_front) }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-navy-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="text-white text-sm font-medium">Lihat Penuh</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <label class="text-xs text-denim-500 uppercase tracking-wider block mb-2">Tampak Belakang</label>
                        <a href="{{ asset('storage/' . $participant->photo_back) }}" target="_blank"
                            class="block group relative rounded-lg overflow-hidden border border-denim-600/30 aspect-[3/4]">
                            <img src="{{ asset('storage/' . $participant->photo_back) }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-navy-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="text-white text-sm font-medium">Lihat Penuh</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <label class="text-xs text-denim-500 uppercase tracking-wider block mb-2">Bukti Bayar</label>
                        <a href="{{ asset('storage/' . $participant->payment_proof) }}" target="_blank"
                            class="block group relative rounded-lg overflow-hidden border border-denim-600/30 aspect-[3/4]">
                            <img src="{{ asset('storage/' . $participant->payment_proof) }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-navy-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="text-white text-sm font-medium">Lihat Penuh</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="mt-8 pt-6 border-t border-denim-700/30 flex flex-wrap items-center gap-3">
                @if($participant->status !== 'approved')
                    <form action="{{ route('admin.participants.status', $participant) }}" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="approved">
                        <button type="submit"
                            class="px-5 py-2.5 bg-green-500/10 border border-green-500/30 text-green-400 text-sm font-medium rounded-lg hover:bg-green-500/20 transition-colors">✓
                            Approve</button>
                    </form>
                @endif
                @if($participant->status !== 'rejected')
                    <form action="{{ route('admin.participants.status', $participant) }}" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit"
                            class="px-5 py-2.5 bg-red-500/10 border border-red-500/30 text-red-400 text-sm font-medium rounded-lg hover:bg-red-500/20 transition-colors">✕
                            Reject</button>
                    </form>
                @endif
                @if($participant->status !== 'pending')
                    <form action="{{ route('admin.participants.status', $participant) }}" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="pending">
                        <button type="submit"
                            class="px-5 py-2.5 bg-yellow-500/10 border border-yellow-500/30 text-yellow-400 text-sm font-medium rounded-lg hover:bg-yellow-500/20 transition-colors">↻
                            Set Pending</button>
                    </form>
                @endif
                <form action="{{ route('admin.participants.destroy', $participant) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this participant?')" class="ml-auto">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="px-5 py-2.5 border border-red-500/30 text-red-400 text-sm rounded-lg hover:bg-red-500/10 transition-colors">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection