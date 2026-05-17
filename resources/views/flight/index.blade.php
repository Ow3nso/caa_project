<x-app-layout>
    <x-slot name="header">
        Personnel Licensing
    </x-slot>

    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="flex-1 w-full sm:max-w-md">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-caa-medium-blue focus:border-caa-medium-blue sm:text-sm transition duration-150 ease-in-out" placeholder="Search by license number, name, or type...">
            </div>
        </div>
        
        <div class="flex items-center space-x-3 w-full sm:w-auto">
            <div class="flex bg-gray-100 p-1 rounded-lg">
                <button class="px-4 py-1.5 text-sm font-medium rounded-md bg-white text-caa-dark-navy shadow-sm">All</button>
                <button class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-caa-dark-navy">Valid</button>
                <button class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-caa-dark-navy">Expiring Soon</button>
            </div>
            
            <a href="{{ route('apply.flight') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-caa-medium-blue hover:bg-caa-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                New License App
            </a>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                        <th class="py-4 px-6 font-semibold">License No.</th>
                        <th class="py-4 px-6 font-semibold">Personnel Name</th>
                        <th class="py-4 px-6 font-semibold">Type</th>
                        <th class="py-4 px-6 font-semibold">Ratings</th>
                        <th class="py-4 px-6 font-semibold">Status</th>
                        <th class="py-4 px-6 font-semibold">Expiry Date</th>
                        <th class="py-4 px-6 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">UG/ATPL/1042</td>
                        <td class="py-4 px-6 text-gray-700 font-medium">Capt. John Doe</td>
                        <td class="py-4 px-6 text-gray-600">ATPL</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 mr-1">A330</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 mr-1">IR</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Valid
                            </span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">14 Nov 2026</td>
                        <td class="py-4 px-6 text-right">
                            <button class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300 mx-2">|</span>
                            <button class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">UG/CPL/2188</td>
                        <td class="py-4 px-6 text-gray-700 font-medium">Jane Smith</td>
                        <td class="py-4 px-6 text-gray-600">CPL</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 mr-1">B737</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 mr-1">IR</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Expiring Soon
                            </span>
                        </td>
                        <td class="py-4 px-6 text-yellow-600 font-medium">10 Jun 2026</td>
                        <td class="py-4 px-6 text-right">
                            <button class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300 mx-2">|</span>
                            <button class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">UG/PPL/5401</td>
                        <td class="py-4 px-6 text-gray-700 font-medium">Michael Johnson</td>
                        <td class="py-4 px-6 text-gray-600">PPL</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 mr-1">SEP</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Suspended
                            </span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">22 Mar 2025</td>
                        <td class="py-4 px-6 text-right">
                            <button class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300 mx-2">|</span>
                            <button class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Placeholder -->
        <div class="px-6 py-4 border-t border-gray-100 bg-white flex items-center justify-between sm:px-6">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">4,592</span> results
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-caa-light-blue border-caa-medium-blue text-caa-dark-navy relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
