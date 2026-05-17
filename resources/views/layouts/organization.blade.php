<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CAA Portal') — {{ config('app.name', 'CAA') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        surface: { DEFAULT: '#ffffff', elevated: '#f5f5f5', border: '#e5e5e5' },
                        accent: { DEFAULT: '#3b82f6', hover: '#2563eb' },
                    }
                }
            }
        }
    </script>
    @stack('head')
</head>
<body class="min-h-screen bg-surface text-black antialiased">
    <div class="flex min-h-screen">
        <aside class="w-64 shrink-0 border-r border-surface-border bg-surface-elevated flex flex-col">
            <div class="px-5 py-6 border-b border-surface-border">
                <a href="{{ route('organization.dashboard') }}" class="flex items-center gap-3 group">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-accent/20 text-accent font-bold text-sm">CAA</span>
                    <span>
                        <span class="block text-sm font-semibold text-black group-hover:text-accent transition">Aviation Portal</span>
                        <span class="block text-xs text-gray-600">Regulatory modules</span>
                    </span>
                </a>
            </div>

            <nav class="flex-1 px-3 py-4 space-y-1" aria-label="Main navigation">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition {{ ($activeNav ?? '') === 'dashboard' ? 'bg-accent/15 text-accent' : 'text-gray-700 hover:bg-gray-100 hover:text-black' }}">
                    <svg class="h-5 w-5 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>

                @foreach([
                    ['label' => 'Aircraft', 'icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8'],
                    ['label' => 'MRO', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                    ['label' => 'Flight Operations', 'icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8'],
                    ['label' => 'Medical', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                ] as $item)
                    <span class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-gray-500 cursor-not-allowed" title="Coming soon">
                        <svg class="h-5 w-5 shrink-0 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                        {{ $item['label'] }}
                        
                    </span>
                @endforeach

                <a href="{{ route('organization.dashboard') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition {{ ($activeNav ?? '') === 'organization' ? 'bg-accent/15 text-accent' : 'text-gray-700 hover:bg-gray-100 hover:text-black' }}">
                    <svg class="h-5 w-5 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Organizations
                </a>
            </nav>

            <div class="border-t border-surface-border p-4">
                <div class="flex items-center gap-3">
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-surface-border text-sm font-semibold text-gray-700">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </span>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-black">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="truncate text-xs text-gray-600">{{ auth()->user()->email ?? '' }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="w-full rounded-lg border border-surface-border px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-100 hover:text-black transition">
                        Sign out
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            @yield('header')

            <main class="flex-1 overflow-auto p-6 lg:p-8">
                @if (session('success'))
                    <div class="mb-6 flex items-center gap-3 rounded-lg border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-800" role="alert">
                        <svg class="h-5 w-5 shrink-0 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>



