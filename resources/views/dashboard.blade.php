<x-app-layout>
    <x-slot name="header">
        Dashboard Overview
    </x-slot>

    <!-- Metrics Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        
        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-lg bg-caa-off-white text-caa-dark-blue mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Aircraft</p>
                <p class="text-2xl font-bold text-caa-dark-navy">1,248</p>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-lg bg-caa-off-white text-caa-dark-blue mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Approved MROs</p>
                <p class="text-2xl font-bold text-caa-dark-navy">86</p>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-lg bg-caa-off-white text-caa-dark-blue mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Active Personnel</p>
                <p class="text-2xl font-bold text-caa-dark-navy">4,592</p>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-lg bg-caa-off-white text-caa-dark-blue mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Medicals Pending</p>
                <p class="text-2xl font-bold text-yellow-600">34</p>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-lg bg-caa-off-white text-caa-dark-blue mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Organizations</p>
                <p class="text-2xl font-bold text-caa-dark-navy">112</p>
            </div>
        </div>

    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <!-- Left Column: Approvals & Analytics -->
        <div class="xl:col-span-2 space-y-8">
            <!-- Pending Approvals Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="text-lg font-bold text-caa-dark-navy">Pending Approvals</h3>
                    <a href="{{ route('admin.medical') }}" class="text-sm text-caa-medium-blue hover:text-caa-dark-blue font-medium">View All &rarr;</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white text-gray-500 text-sm border-b border-gray-100">
                                <th class="py-3 px-6 font-semibold">Application ID</th>
                                <th class="py-3 px-6 font-semibold">Type</th>
                                <th class="py-3 px-6 font-semibold">Applicant</th>
                                <th class="py-3 px-6 font-semibold">Date Submitted</th>
                                <th class="py-3 px-6 font-semibold text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-medium text-caa-dark-navy">APP-2026-089</td>
                                <td class="py-4 px-6"><span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">Aircraft Registration</span></td>
                                <td class="py-4 px-6 text-gray-600">Skyways Airlines Ltd.</td>
                                <td class="py-4 px-6 text-gray-500">12 May 2026</td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('admin.medical') }}" class="text-caa-medium-blue hover:text-caa-dark-blue font-medium">Review</a>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-medium text-caa-dark-navy">MED-2026-412</td>
                                <td class="py-4 px-6"><span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">Class 1 Medical</span></td>
                                <td class="py-4 px-6 text-gray-600">John Doe</td>
                                <td class="py-4 px-6 text-gray-500">10 May 2026</td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('admin.medical') }}" class="text-caa-medium-blue hover:text-caa-dark-blue font-medium">Review</a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-medium text-caa-dark-navy">MRO-2026-005</td>
                                <td class="py-4 px-6"><span class="px-2 py-1 rounded-full text-xs bg-purple-100 text-purple-800">MRO Renewal</span></td>
                                <td class="py-4 px-6 text-gray-600">AeroFix Engineering</td>
                                <td class="py-4 px-6 text-gray-500">08 May 2026</td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-caa-medium-blue hover:text-caa-dark-blue font-medium">Review</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- System Analytics -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-caa-dark-navy mb-4">Application Processing Trends</h3>
                <div class="h-64 flex items-end justify-between space-x-2 relative">
                    <!-- Simple CSS bar chart placeholder -->
                    <div class="w-full bg-gray-50 h-full absolute top-0 left-0 rounded-lg flex flex-col justify-between py-2 z-0">
                        <div class="border-b border-gray-200 w-full"></div>
                        <div class="border-b border-gray-200 w-full"></div>
                        <div class="border-b border-gray-200 w-full"></div>
                        <div class="border-b border-gray-200 w-full"></div>
                    </div>
                    
                    <div class="w-1/12 bg-caa-light-blue rounded-t-md h-24 z-10 hover:bg-caa-medium-blue transition relative group">
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">45</span>
                    </div>
                    <div class="w-1/12 bg-caa-light-blue rounded-t-md h-32 z-10 hover:bg-caa-medium-blue transition relative group">
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">62</span>
                    </div>
                    <div class="w-1/12 bg-caa-medium-blue rounded-t-md h-48 z-10 hover:bg-caa-dark-blue transition relative group">
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">89</span>
                    </div>
                    <div class="w-1/12 bg-caa-light-blue rounded-t-md h-40 z-10 hover:bg-caa-medium-blue transition relative group">
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">75</span>
                    </div>
                    <div class="w-1/12 bg-caa-light-blue rounded-t-md h-56 z-10 hover:bg-caa-medium-blue transition relative group">
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">105</span>
                    </div>
                    <div class="w-1/12 bg-caa-dark-blue rounded-t-md h-full z-10 hover:bg-caa-dark-navy transition relative group">
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">142</span>
                    </div>
                </div>
                <div class="flex justify-between mt-3 text-xs text-gray-500">
                    <span>Dec</span>
                    <span>Jan</span>
                    <span>Feb</span>
                    <span>Mar</span>
                    <span>Apr</span>
                    <span>May</span>
                </div>
            </div>
        </div>

        <!-- Right Column: Notifications & Actions -->
        <div class="space-y-8">
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-caa-dark-navy mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="/aircraft/create" class="flex items-center p-3 rounded-lg border border-gray-200 hover:border-caa-medium-blue hover:bg-gray-50 transition group">
                        <div class="p-2 bg-gray-100 rounded text-gray-600 group-hover:bg-caa-light-blue group-hover:text-caa-dark-navy transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="ml-3 font-medium text-gray-700 group-hover:text-caa-dark-navy">Register New Aircraft</span>
                    </a>
                    <a href="{{ route('admin.medical') }}" class="flex items-center p-3 rounded-lg border border-gray-200 hover:border-caa-medium-blue hover:bg-gray-50 transition group">
                        <div class="p-2 bg-gray-100 rounded text-gray-600 group-hover:bg-caa-light-blue group-hover:text-caa-dark-navy transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <span class="ml-3 font-medium text-gray-700 group-hover:text-caa-dark-navy">Process Medical Cert</span>
                    </a>
                    <a href="/mro/create" class="flex items-center p-3 rounded-lg border border-gray-200 hover:border-caa-medium-blue hover:bg-gray-50 transition group">
                        <div class="p-2 bg-gray-100 rounded text-gray-600 group-hover:bg-caa-light-blue group-hover:text-caa-dark-navy transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="ml-3 font-medium text-gray-700 group-hover:text-caa-dark-navy">Add MRO Facility</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity / System Notifications -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-caa-dark-navy">System Notifications</h3>
                    <span class="bg-red-100 text-red-600 py-1 px-2 rounded-full text-xs font-bold">3 New</span>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-800">License Expiry Warning</p>
                            <p class="text-xs text-gray-500 mt-0.5">15 pilot licenses expiring in &lt; 30 days.</p>
                            <p class="text-xs text-gray-400 mt-1">10 mins ago</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-2 h-2 bg-caa-medium-blue rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-800">System Maintenance</p>
                            <p class="text-xs text-gray-500 mt-0.5">Scheduled for Saturday, 02:00 AM EAT.</p>
                            <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-800">Database Backup Complete</p>
                            <p class="text-xs text-gray-500 mt-0.5">Daily backup successfully saved to AWS.</p>
                            <p class="text-xs text-gray-400 mt-1">Yesterday, 11:30 PM</p>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="block text-center mt-5 text-sm text-caa-medium-blue font-medium hover:underline">View All Notifications</a>
            </div>
        </div>
        
    </div>

</x-app-layout>
