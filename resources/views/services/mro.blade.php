<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MRO Approvals - CAA Services</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-gray-900 bg-caa-off-white font-sans min-h-screen flex flex-col">
        
        <nav class="bg-caa-dark-navy text-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="flex items-center">
                            <svg class="w-8 h-8 text-caa-light-blue mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="font-bold text-xl tracking-wider">CAA SERVICES</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-grow">
            <div class="bg-caa-dark-blue py-20 px-6">
                <div class="max-w-4xl mx-auto text-center text-white">
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-6">MRO Approvals</h1>
                    <p class="text-lg md:text-xl text-caa-light-blue leading-relaxed">
                        Become a certified Maintenance, Repair, and Overhaul facility. Ensure the highest standards of safety and compliance in aviation maintenance.
                    </p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto py-16 px-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-caa-dark-navy mb-6">Service Overview</h2>
                    <div class="space-y-6 text-gray-600 leading-relaxed">
                        <p>
                            Organizations intending to perform maintenance on aircraft, engines, or components must hold an Approved Maintenance Organization (AMO/MRO) certificate. 
                        </p>
                        
                        <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-caa-medium-blue">
                            <h3 class="font-bold text-caa-dark-navy mb-2">Requirements</h3>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Comprehensive Maintenance Procedures Manual (MPM)</li>
                                <li>List of qualified certifying staff</li>
                                <li>Facility inspection reports</li>
                                <li>Tooling and equipment inventory</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-12 text-center border-t border-gray-100 pt-8">
                        <p class="text-gray-500 mb-4">Ready to start your application?</p>
                        <a href="{{ route('apply.mro') }}" class="inline-flex justify-center px-8 py-4 border border-transparent rounded-lg shadow-md text-lg font-bold text-white bg-caa-medium-blue hover:bg-caa-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition transform hover:-translate-y-1">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="bg-caa-dark-navy py-6 text-center text-caa-light-blue text-sm">
            <p>&copy; {{ date('Y') }} Civil Aviation Authority. All rights reserved.</p>
        </footer>
    </body>
</html>
