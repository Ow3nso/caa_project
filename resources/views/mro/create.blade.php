<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.mro') : route('services.mro') }}" class="text-gray-400 hover:text-caa-medium-blue mr-3 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            New MRO Application
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-caa-dark-navy">Maintenance Organization Approval Form</h3>
                <p class="text-sm text-gray-500 mt-1">Submit details for a new AMO/MRO facility approval or renewal.</p>
            </div>
            
            <form action="{{ route('success') }}" method="GET" class="p-8">
                @csrf
                
                <!-- Section 1: Facility Details -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">1. Organization Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Registered Name of Organization <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="e.g. AeroFix Engineering Ltd">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Principal Place of Business <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Full Address">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Country <span class="text-red-500">*</span></label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option>Uganda</option>
                                <option>Kenya</option>
                                <option>Tanzania</option>
                                <option>South Africa</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Application Type <span class="text-red-500">*</span></label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option>Initial Grant</option>
                                <option>Renewal</option>
                                <option>Variation / Amendment</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Scope of Approval -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">2. Requested Scope of Approval (Ratings)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-caa-medium-blue h-4 w-4 text-caa-medium-blue border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="font-medium text-gray-700">A1 - Aeroplanes above 5700 kg</label>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-caa-medium-blue h-4 w-4 text-caa-medium-blue border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="font-medium text-gray-700">A2 - Aeroplanes 5700 kg & below</label>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-caa-medium-blue h-4 w-4 text-caa-medium-blue border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="font-medium text-gray-700">A3 - Helicopters</label>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-caa-medium-blue h-4 w-4 text-caa-medium-blue border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="font-medium text-gray-700">B1 - Turbine Engines</label>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-caa-medium-blue h-4 w-4 text-caa-medium-blue border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="font-medium text-gray-700">B2 - Piston Engines</label>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-caa-medium-blue h-4 w-4 text-caa-medium-blue border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="font-medium text-gray-700">C - Components</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Personnel -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">3. Key Personnel</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Accountable Manager <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Full Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quality Manager <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Full Name">
                        </div>
                    </div>
                </div>

                <!-- Section 4: Document Uploads -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">4. Manuals & Documents</h4>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mt-2 text-sm text-gray-600">Upload Maintenance Organization Exposition (MOE), Quality Manual, etc.</p>
                        <p class="text-xs text-gray-500 mt-1">PDF up to 50MB</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.mro') : route('services.mro') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
