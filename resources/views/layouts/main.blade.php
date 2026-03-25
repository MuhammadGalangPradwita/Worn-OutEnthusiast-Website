<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="WORN-OUT ENTHUSIAST — International Denim Design Competition. Celebrating craftsmanship, innovation, and the art of denim.">
    <title>{{ $settings['site_name'] ?? 'WORN-OUT ENTHUSIAST' }}
        {{ $settings['site_tagline'] ?? 'Where Craftsmanship Meets Innovation' }}
    </title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-denim-900 text-white font-sans antialiased overflow-x-hidden">
    {{-- Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        x-data="{ scrolled: false, mobileOpen: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
        :class="scrolled ? 'bg-denim-900/95 backdrop-blur-md shadow-lg' : 'bg-transparent'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <a href="{{ route('home') }}"
                    class="flex items-center gap-3 font-display">
                    <x-logo class="h-10 lg:h-12 w-auto" />
                </a>
                {{-- Desktop Menu --}}
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('about') }}"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">Tentang</a>
                    <a href="{{ route('home') }}#categories"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">Kategori</a>
                    <a href="{{ route('home') }}#timeline"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">Timeline</a>
                    <a href="{{ route('home') }}#judges"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">Juri</a>
                    <!-- <a href="{{ route('home') }}#gallery"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">Galeri</a> -->
                    <a href="{{ route('home') }}#rules"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">Peraturan</a>
                    <a href="{{ route('home') }}#faq"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">FAQ</a>
                    <!-- <a href="{{ route('recap') }}"
                        class="text-sm font-medium text-denim-200 hover:text-white transition-colors">Recap</a> -->
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 bg-denim-500 hover:bg-denim-400 text-white text-sm font-semibold rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-denim-500/25">
                        Daftar
                    </a>
                </div>
                {{-- Mobile Menu Button --}}
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-white p-2">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        {{-- Mobile Menu --}}
        <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="lg:hidden bg-denim-900/98 backdrop-blur-md border-t border-denim-700/50"
            @click.away="mobileOpen = false">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('about') }}" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">Tentang</a>
                <a href="{{ route('home') }}#categories" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">Kategori</a>
                <a href="{{ route('home') }}#timeline" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">Timeline</a>
                <a href="{{ route('home') }}#judges" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">Juri</a>
                <a href="{{ route('home') }}#rules" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">Peraturan</a>
                <!-- <a href="{{ route('home') }}#gallery" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">Galeri</a> -->
                <a href="{{ route('home') }}#faq" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">FAQ</a>
                <!-- <a href="{{ route('recap') }}" @click="mobileOpen = false"
                    class="block py-2 text-denim-200 hover:text-white transition-colors">Recap</a> -->
                <a href="{{ route('register') }}" @click="mobileOpen = false"
                    class="block py-3 bg-denim-500 text-center text-white font-semibold rounded-lg">Daftar</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>

</html>