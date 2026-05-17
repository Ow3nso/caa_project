<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Civil Aviation Authority System</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-gray-900 bg-caa-off-white font-sans min-h-screen flex flex-col">
        
        <!-- Navigation -->
        <nav class="bg-caa-dark-navy text-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-caa-light-blue mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="font-bold text-xl tracking-wider">CAA MANAGEMENT SYSTEM</span>
                    </div>
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            <div class="space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="font-semibold text-caa-light-blue hover:text-white transition">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-caa-light-blue hover:text-white transition">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="font-semibold bg-caa-medium-blue text-white px-4 py-2 rounded-md hover:bg-caa-light-blue hover:text-caa-dark-navy transition">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Hero / Portal Area -->
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl w-full space-y-10">
                <div class="text-center">
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-caa-dark-navy tracking-tight mb-4">
                        Welcome to the Civil Aviation Authority
                    </h1>
                    <p class="text-xl text-caa-dark-blue font-medium">
                        What are you looking for today?
                    </p>
                </div>

                <!-- Grid of Modules -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
                    
                    <!-- Aircraft Registration -->
                    <a href="{{ route('services.aircraft') }}" class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col items-center p-8 transform hover:-translate-y-1">
                        <div class="w-20 h-20 bg-caa-light-blue rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-caa-dark-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-caa-dark-navy mb-2">Aircraft</h3>
                        <p class="text-center text-gray-500">Register and manage aircraft documentation and records.</p>
                    </a>

                    <!-- Organization Approvals -->
                    <a href="{{ route('services.organization') }}" class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col items-center p-8 transform hover:-translate-y-1">
                        <div class="w-20 h-20 bg-caa-light-blue rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-caa-dark-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-caa-dark-navy mb-2">Organizations</h3>
                        <p class="text-center text-gray-500">Apply for organization approvals and view certificates.</p>
                    </a>

                    <!-- Personnel Licensing -->
                    <a href="{{ route('services.flight') }}" class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col items-center p-8 transform hover:-translate-y-1">
                        <div class="w-20 h-20 bg-caa-light-blue rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-caa-dark-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-caa-dark-navy mb-2">Personnel</h3>
                        <p class="text-center text-gray-500">Flight operations and personnel licensing management.</p>
                    </a>

                    <!-- Medical Certifications -->
                    <a href="{{ route('services.medical') }}" class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col items-center p-8 transform hover:-translate-y-1">
                        <div class="w-20 h-20 bg-caa-light-blue rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-caa-dark-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-caa-dark-navy mb-2">Medical</h3>
                        <p class="text-center text-gray-500">Access aviation medical certification forms and statuses.</p>
                    </a>

                    <!-- MRO Approvals -->
                    <a href="{{ route('services.mro') }}" class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col items-center p-8 transform hover:-translate-y-1">
                        <div class="w-20 h-20 bg-caa-light-blue rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-caa-dark-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-caa-dark-navy mb-2">MROs</h3>
                        <p class="text-center text-gray-500">Maintenance, Repair, and Overhaul approvals.</p>
                    </a>

                </div>
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="bg-caa-dark-navy py-6 text-center text-caa-light-blue text-sm">
            <p>&copy; {{ date('Y') }} Civil Aviation Authority. All rights reserved.</p>
        </footer>

    </body>
</html>
