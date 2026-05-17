<aside class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-caa-dark-navy border-r rtl:border-r-0 rtl:border-l border-caa-dark-blue">
    <div class="flex items-center space-x-3 mb-6 px-2">
        <svg class="w-8 h-8 text-caa-light-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="text-xl font-bold text-white uppercase">CAA System</span>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="space-y-2">
            <a href="/dashboard" class="flex items-center px-4 py-2 text-caa-light-blue rounded-lg hover:bg-caa-dark-blue hover:text-white transition-colors {{ request()->is('dashboard') ? 'bg-caa-dark-blue text-white' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="mx-4 font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.aircraft') }}" class="flex items-center px-4 py-2 text-caa-light-blue rounded-lg hover:bg-caa-dark-blue hover:text-white transition-colors {{ request()->is('admin/aircraft*') ? 'bg-caa-dark-blue text-white' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                <span class="mx-4 font-medium">Aircrafts</span>
            </a>

            <a href="{{ route('admin.mro') }}" class="flex items-center px-4 py-2 text-caa-light-blue rounded-lg hover:bg-caa-dark-blue hover:text-white transition-colors {{ request()->is('admin/mro*') ? 'bg-caa-dark-blue text-white' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="mx-4 font-medium">MROs</span>
            </a>

            <a href="{{ route('flight-ops.dashboard') }}" class="flex items-center px-4 py-2 text-caa-light-blue rounded-lg hover:bg-caa-dark-blue hover:text-white transition-colors {{ request()->is('admin/flight*') ? 'bg-caa-dark-blue text-white' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                <span class="mx-4 font-medium">Flight Operations</span>
            </a>

            <a href="{{ route('admin.medical') }}" class="flex items-center px-4 py-2 text-caa-light-blue rounded-lg hover:bg-caa-dark-blue hover:text-white transition-colors {{ request()->is('admin/medical*') ? 'bg-caa-dark-blue text-white' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                <span class="mx-4 font-medium">Medical</span>
            </a>

            <a href="{{ route('admin.organization') }}" class="flex items-center px-4 py-2 text-caa-light-blue rounded-lg hover:bg-caa-dark-blue hover:text-white transition-colors {{ request()->is('admin/organization*') ? 'bg-caa-dark-blue text-white' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <span class="mx-4 font-medium">Organizations</span>
            </a>
        </nav>

        <div>
            <hr class="border-caa-dark-blue my-4" />
            <a href="/profile" class="flex items-center px-4 py-2 mt-5 text-caa-light-blue transition-colors rounded-lg hover:bg-caa-dark-blue hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="mx-4 font-medium">Settings</span>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-2 text-caa-light-blue transition-colors rounded-lg hover:bg-red-600 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="mx-4 font-medium">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
