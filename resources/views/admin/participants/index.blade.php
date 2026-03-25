@extends('admin.layouts.app')
@section('title', 'Participants')

@section('content')
    {{-- Stats --}}
    <div class="grid sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-4 flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-denim-700/50 flex items-center justify-center">
                <svg class="w-5 h-5 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <p class="text-denim-400 text-xs">Total</p>
                <p class="font-display font-bold text-xl text-white">{{ $counts['total'] }}</p>
            </div>
        </div>
        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-4 flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-yellow-500/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-denim-400 text-xs">Pending</p>
                <p class="font-display font-bold text-xl text-yellow-400">{{ $counts['pending'] }}</p>
            </div>
        </div>
        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-4 flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-green-500/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-denim-400 text-xs">Approved</p>
                <p class="font-display font-bold text-xl text-green-400">{{ $counts['approved'] }}</p>
            </div>
        </div>
    </div>

    {{-- Filters --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-6">
        <form method="GET" action="{{ route('admin.participants.index') }}"
            class="flex flex-wrap items-center gap-3 w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, instagram, brand..."
                class="flex-1 min-w-[200px] bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-2.5 text-white text-sm placeholder-denim-500 focus:outline-none focus:border-denim-400 transition-colors">
            <select name="status"
                class="bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-2.5 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                <option value="">All Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <button type="submit"
                class="px-4 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">Filter</button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.participants.index') }}"
                    class="px-4 py-2.5 border border-denim-600/30 text-denim-400 text-sm rounded-lg hover:bg-denim-700/20 transition-colors">Clear</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl overflow-hidden overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-denim-700/30">
                    <th class="text-left px-5 py-4 text-denim-400 font-medium">#</th>
                    <th class="text-left px-5 py-4 text-denim-400 font-medium">Name</th>
                    <th class="text-left px-5 py-4 text-denim-400 font-medium hidden md:table-cell">Instagram</th>
                    <th class="text-left px-5 py-4 text-denim-400 font-medium hidden lg:table-cell">Category</th>
                    <th class="text-left px-5 py-4 text-denim-400 font-medium hidden lg:table-cell">Brand</th>
                    <th class="text-left px-5 py-4 text-denim-400 font-medium">Status</th>
                    <th class="text-left px-5 py-4 text-denim-400 font-medium hidden md:table-cell">Registered</th>
                    <th class="text-right px-5 py-4 text-denim-400 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($participants as $i => $p)
                    <tr class="border-b border-denim-700/20 hover:bg-denim-700/10 transition-colors">
                        <td class="px-5 py-4 text-denim-300">{{ $i + 1 }}</td>
                        <td class="px-5 py-4 text-white font-medium">{{ $p->name }}</td>
                        <td class="px-5 py-4 text-denim-300 hidden md:table-cell">{{ $p->instagram }}</td>
                        <td class="px-5 py-4 text-denim-300 hidden lg:table-cell">{{ $p->category?->name ?? '-' }}</td>
                        <td class="px-5 py-4 text-denim-300 hidden lg:table-cell">{{ $p->denim_brand ?? '-' }}</td>
                        <td class="px-5 py-4">
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-yellow-500/10 text-yellow-400',
                                    'approved' => 'bg-green-500/10 text-green-400',
                                    'rejected' => 'bg-red-500/10 text-red-400',
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded-full text-xs {{ $statusClasses[$p->status] ?? '' }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-denim-400 text-xs hidden md:table-cell">{{ $p->created_at->format('d M Y') }}
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.participants.show', $p) }}"
                                    class="px-3 py-1.5 bg-denim-700/30 text-denim-300 text-xs rounded-lg hover:bg-denim-700/50 transition-colors">View</a>
                                @if($p->status !== 'approved')
                                    <form action="{{ route('admin.participants.status', $p) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-green-500/10 text-green-400 text-xs rounded-lg hover:bg-green-500/20 transition-colors">Approve</button>
                                    </form>
                                @endif
                                @if($p->status !== 'rejected')
                                    <form action="{{ route('admin.participants.status', $p) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-red-500/10 text-red-400 text-xs rounded-lg hover:bg-red-500/20 transition-colors">Reject</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-5 py-8 text-center text-denim-400">No participants yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection