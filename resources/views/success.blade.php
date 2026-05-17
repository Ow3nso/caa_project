<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Application Submitted - CAA</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-gray-900 bg-gray-50 font-sans min-h-screen flex flex-col items-center justify-center">
        
        <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center transform hover:-translate-y-1 transition duration-300">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <h2 class="text-3xl font-extrabold text-caa-dark-navy mb-4">Success!</h2>
            <p class="text-gray-500 mb-8">
                Your application has been successfully submitted to the Civil Aviation Authority. Our team will review your details and contact you shortly with further instructions.
            </p>
            
            <a href="/" class="inline-flex justify-center w-full px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-caa-medium-blue hover:bg-caa-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
                Return to Home
            </a>
        </div>
        
    </body>
</html>
