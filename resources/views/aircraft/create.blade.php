<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.aircraft') : route('services.aircraft') }}" class="text-gray-400 hover:text-caa-medium-blue mr-3 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            Register New Aircraft
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-caa-dark-navy">Aircraft Registration Form</h3>
                <p class="text-sm text-gray-500 mt-1">Please fill in all the required information to register a new aircraft.</p>
            </div>
            
            <form action="{{ route('success') }}" method="GET" class="p-8">
                @csrf
                
                <!-- Section 1: Aircraft Details -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">1. Aircraft Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Manufacturer <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="e.g. Boeing, Airbus">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Model <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="e.g. 737-800">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Serial Number <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Serial No.">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Year of Manufacture <span class="text-red-500">*</span></label>
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="YYYY">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Registration Mark Requested</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-4 py-2 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    5X-
                                </span>
                                <input type="text" class="flex-1 px-4 py-2 border border-gray-300 rounded-none rounded-r-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue uppercase" placeholder="XXX" maxlength="3">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Leave blank if you want the registry to assign a mark.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Ownership -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">2. Ownership Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Owner Name (Individual or Company) <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Full Legal Name">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Physical Address <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Street Address, City, Country">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="email@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="+256 ...">
                        </div>
                    </div>
                </div>

                <!-- Section 3: Document Uploads -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">3. Required Documents</h4>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mt-2 text-sm text-gray-600">Click or drag and drop to upload Bill of Sale, Customs Clearance, etc.</p>
                        <p class="text-xs text-gray-500 mt-1">PDF, JPG, PNG up to 10MB</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.aircraft') : route('services.aircraft') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                        Submit Registration
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
