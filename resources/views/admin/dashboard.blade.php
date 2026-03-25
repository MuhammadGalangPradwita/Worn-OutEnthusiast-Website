@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-denim-700/50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <p class="text-denim-400 text-sm">Categories</p>
                    <p class="font-display font-bold text-2xl text-white">{{ $stats['categories'] }}</p>
                </div>
            </div>
        </div>
        <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-denim-700/50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-denim-400 text-sm">Gallery Items</p>
                    <p class="font-display font-bold text-2xl text-white">{{ $stats['galleries'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6">
        <h2 class="font-display font-bold text-lg text-white mb-4">Quick Actions</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.categories.create') }}"
                class="flex items-center gap-3 p-4 bg-denim-700/30 rounded-lg hover:bg-denim-700/50 transition-colors">
                <svg class="w-5 h-5 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm text-denim-200">Add Category</span>
            </a>
            <a href="{{ route('admin.galleries.create') }}"
                class="flex items-center gap-3 p-4 bg-denim-700/30 rounded-lg hover:bg-denim-700/50 transition-colors">
                <svg class="w-5 h-5 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm text-denim-200">Add Gallery</span>
            </a>
            <a href="{{ route('admin.settings.edit') }}"
                class="flex items-center gap-3 p-4 bg-denim-700/30 rounded-lg hover:bg-denim-700/50 transition-colors">
                <svg class="w-5 h-5 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="text-sm text-denim-200">Settings</span>
            </a>
        </div>
    </div>
@endsection