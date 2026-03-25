<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Worn-Out Enthusiast</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-white bg-navy-900 min-h-screen flex flex-col selection:bg-denim-500 selection:text-white relative overflow-hidden">
    
    {{-- Animated Background Effects --}}
    <div class="fixed inset-0 z-0 pointer-events-none opacity-50">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-denim-600/20 rounded-full blur-[120px] mix-blend-screen mix-blend-screen animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 -left-32 w-[600px] h-[600px] bg-navy-500/30 rounded-full blur-[100px] mix-blend-screen animate-blob animation-delay-4000"></div>
    </div>

    {{-- Subtle Pattern Texture --}}
    <div class="fixed inset-0 z-0 opacity-10 pointer-events-none mix-blend-overlay"
        style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22><rect width=%2240%22 height=%2240%22 fill=%22none%22/><circle cx=%2220%22 cy=%2220%22 r=%221%22 fill=%22%23ffffff%22/></svg>'); background-size: 24px 24px;">
    </div>

    <main class="flex-grow flex items-center justify-center p-6 relative z-10">
        <div class="w-full max-w-md">
            {{-- Logo Header --}}
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex justify-center group">
                    <x-logo iconClass="h-16 lg:h-20" />
                </a>
                <h1 class="mt-6 text-2xl font-display font-bold text-white tracking-widest uppercase">Admin Access</h1>
                <p class="mt-2 text-sm text-denim-400 font-light">Secure portal for management.</p>
            </div>

            {{-- Login Card --}}
            <div class="bg-navy-800/60 backdrop-blur-xl border border-denim-600/30 rounded-3xl p-8 sm:p-10 shadow-2xl relative overflow-hidden group">
                {{-- Decorative glare --}}
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-denim-400/50 to-transparent"></div>
                
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        <ul class="text-sm text-red-200/90 leading-relaxed">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs font-semibold text-denim-300 uppercase tracking-widest mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-denim-500 group-focus-within:text-denim-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full bg-navy-900/50 border border-denim-700/50 rounded-xl py-3 pl-11 pr-4 text-white text-sm focus:outline-none focus:ring-2 focus:ring-denim-500/50 focus:border-denim-400 transition-all placeholder-denim-600"
                                placeholder="name@example.com">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-semibold text-denim-300 uppercase tracking-widest">Password</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-denim-500 group-focus-within:text-denim-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="w-full bg-navy-900/50 border border-denim-700/50 rounded-xl py-3 pl-11 pr-4 text-white text-sm focus:outline-none focus:ring-2 focus:ring-denim-500/50 focus:border-denim-400 transition-all placeholder-denim-600"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="remember" type="checkbox" name="remember" class="w-4 h-4 rounded border-denim-700 bg-navy-900 text-denim-500 focus:ring-denim-500 focus:ring-offset-navy-900">
                        <label for="remember" class="ml-2 block text-sm text-denim-400">Remember me</label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full relative inline-flex justify-center items-center gap-2 px-8 py-3.5 bg-white text-navy-900 font-bold text-sm uppercase tracking-widest rounded-xl hover:bg-denim-100 transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] hover:-translate-y-0.5 overflow-hidden group/btn">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/50 to-transparent -translate-x-full group-hover/btn:animate-[shimmer_1.5s_infinite]"></span>
                            <span class="relative">Sign In Securely</span>
                            <svg class="w-4 h-4 relative" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="mt-8 text-center">
                <p class="text-[10px] text-denim-500 uppercase tracking-widest font-semibold flex items-center justify-center gap-2">
                    <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                    256-bit Encrypted Connection
                </p>
            </div>
        </div>
    </main>
</body>
</html>
