<header class="sticky top-0 z-30 flex items-center justify-between px-6 py-4 bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center">
        <button class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>

        @if (isset($header))
            <div class="ml-4 text-xl font-semibold text-gray-800">
                {{ $header }}
            </div>
        @else
            <div class="ml-4 text-xl font-semibold text-gray-800">
                Dashboard
            </div>
        @endif
    </div>

    <div class="flex items-center">
        @auth
            <div class="flex items-center text-sm font-medium text-gray-700 bg-gray-100 px-3 py-2 rounded-lg">
                <span class="hidden sm:inline-block mr-2">{{ Auth::user()->name }}</span>
                <div class="w-8 h-8 overflow-hidden border-2 border-caa-medium-blue rounded-full">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D1B2A&color=fff" class="object-cover w-full h-full" alt="avatar">
                </div>
            </div>
        @else
            <a href="/" class="text-sm font-medium text-gray-700 hover:text-caa-medium-blue">Back to Home</a>
        @endauth
    </div>
</header>
