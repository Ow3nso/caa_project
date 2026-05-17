<x-app-layout>
    <x-slot name="header">
        Medical Certification
    </x-slot>

    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="flex-1 w-full sm:max-w-md">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-caa-medium-blue focus:border-caa-medium-blue sm:text-sm transition duration-150 ease-in-out" placeholder="Search medical records...">
            </div>
        </div>
        
        <div class="flex items-center space-x-3 w-full sm:w-auto">
            <div class="flex bg-gray-100 p-1 rounded-lg">
                <button class="px-4 py-1.5 text-sm font-medium rounded-md bg-white text-caa-dark-navy shadow-sm">All</button>
                <button class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-caa-dark-navy">Valid</button>
                <button class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-caa-dark-navy">Expired</button>
            </div>
            
            <a href="{{ route('apply.medical') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-caa-medium-blue hover:bg-caa-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                New Application
            </a>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                        <th class="py-4 px-6 font-semibold">Certificate Number</th>
                        <th class="py-4 px-6 font-semibold">Applicant Name</th>
                        <th class="py-4 px-6 font-semibold">Class</th>
                        <th class="py-4 px-6 font-semibold">Status</th>
                        <th class="py-4 px-6 font-semibold">Expiry Date</th>
                        <th class="py-4 px-6 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">MED-24-0012</td>
                        <td class="py-4 px-6 text-gray-700">James Walker</td>
                        <td class="py-4 px-6 text-gray-600">Class 1</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Valid
                            </span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">12 Nov 2026</td>
                        <td class="py-4 px-6 text-right">
                            <button class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300 mx-2">|</span>
                            <button class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">MED-23-0841</td>
                        <td class="py-4 px-6 text-gray-700">Sarah Jenkins</td>
                        <td class="py-4 px-6 text-gray-600">Class 2</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Expired
                            </span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">01 Feb 2025</td>
                        <td class="py-4 px-6 text-right">
                            <button class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300 mx-2">|</span>
                            <button class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-100 bg-white flex items-center justify-between sm:px-6">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">2</span> of <span class="font-medium">45</span> results
                    </p>
                </div>
                <div>
                    <!-- Pagination... -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
