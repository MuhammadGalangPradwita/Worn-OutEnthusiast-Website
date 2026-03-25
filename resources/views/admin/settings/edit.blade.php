@extends('admin.layouts.app')
@section('title', 'Site Settings')

@section('content')
    <div class="max-w-2xl">
        <h2 class="font-display font-bold text-xl text-white mb-6">Site Settings</h2>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            {{-- General --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    General
                </h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-denim-300 mb-2">Site Name</label>
                        <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name']) }}"
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm text-denim-300 mb-2">Tagline</label>
                        <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline']) }}"
                            class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                    </div>
                </div>
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $settings['hero_subtitle']) }}"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                </div>
            </div>

            {{-- Countdown --}}
            <div class="bg-denim-800/50 border border-denim-600/20 rounded-xl p-6 space-y-4">
                <h3 class="font-display font-semibold text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-denim-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Countdown
                </h3>
                <div>
                    <label class="block text-sm text-denim-300 mb-2">Registration Deadline</label>
                    <input type="datetime-local" name="countdown_deadline"
                        value="{{ old('countdown_deadline', $settings['countdown_deadline'] ? date('Y-m-d\TH:i', strtotime($settings['countdown_deadline'])) : '') }}"
                        class="w-full bg-denim-700/30 border border-denim-600/30 rounded-lg px-4 py-3 text-white text-sm focus:outline-none focus:border-denim-400 transition-colors">
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-medium rounded-lg transition-colors">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection