<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — WORN-OUT ENTHUSIAST</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-denim-900 text-white font-sans antialiased">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-navy-800 border-r border-denim-700/30 flex-shrink-0 hidden lg:block">
            <div class="p-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3 font-display mb-2" style="text-decoration: none;">
                    <img src="{{ asset('images/logo.png') }}" alt="Worn-Out Enthusiast Logo" style="height: 48px; width: auto;">
                    <div style="line-height: 1.2;">
                        <span style="display: block; font-weight: 800; font-size: 16px; color: #FFFFFF; letter-spacing: 0.5px;">WORN-OUT</span>
                        <span style="display: block; font-weight: 800; font-size: 16px; color: #FFFFFF; letter-spacing: 0.5px;">ENTHUSIAST</span>
                    </div>
                </a>
                <p class="text-denim-600 text-md font-medium mt-6">Admin Panel</p>
            </div>
            <nav class="mt-4 px-4 space-y-1 pb-10">
                {{-- EVENT MANAGEMENT SECTION --}}
                <div class="px-4 py-2 mt-4 border-denim-700/20">
                    <p class="text-[10px] font-bold tracking-widest text-denim-500 uppercase">Event Management</p>
                </div>
                <a href="{{ route('admin.participants.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.participants.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Participants
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.categories.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Categories
                </a>
                <a href="{{ route('admin.timelines.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.timelines.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Timeline
                </a>
                <a href="{{ route('admin.leaderboard.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.leaderboard.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Leaderboard
                </a>
                <a href="{{ route('admin.rules.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.rules.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Competition Rules
                </a>
                <a href="{{ route('admin.doorprizes.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.doorprizes.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                    Doorprize
                </a>

                {{-- PAGE CONTENT SECTION --}}
                <div class="px-4 py-2 mt-6 border-t border-denim-700/20 pt-6">
                    <p class="text-[10px] font-bold tracking-widest text-denim-500 uppercase">Page Content</p>
                </div>


                <a href="{{ route('admin.galleries.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.galleries.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Gallery
                </a>
                <a href="{{ route('admin.sponsors.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.sponsors.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Sponsors
                </a>

                {{-- SYSTEM SECTION --}}
                <div class="px-4 py-2 mt-6 border-t border-denim-700/20 pt-6">
                    <p class="text-[10px] font-bold tracking-widest text-denim-500 uppercase">System</p>
                </div>
                <a href="{{ route('admin.settings.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.settings.*') ? 'bg-denim-700/30 text-white' : 'text-denim-400 hover:text-white hover:bg-denim-700/20' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            {{-- Top bar --}}
            <header class="h-16 bg-navy-800/50 border-b border-denim-700/30 flex items-center justify-between px-6">
                <h1 class="font-display font-bold text-lg text-white">@yield('title', 'Participants')</h1>
                <a href="{{ route('home') }}" target="_blank"
                    class="text-denim-400 text-sm hover:text-denim-200 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View Site
                </a>
            </header>

            {{-- Content --}}
            <main class="flex-1 p-6">
                {{-- Flash Messages --}}
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>