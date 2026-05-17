<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.flight') : route('services.flight') }}" class="text-gray-400 hover:text-caa-medium-blue mr-3 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            New License Application
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-caa-dark-navy">Personnel License Application</h3>
                <p class="text-sm text-gray-500 mt-1">Application for issue, renewal, or variation of a personnel license.</p>
            </div>
            
            <form action="{{ route('success') }}" method="GET" class="p-8">
                @csrf
                
                <!-- Section 1: Applicant Details -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">1. Applicant Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="First Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Last Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nationality <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Nationality">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Permanent Address</label>
                            <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Full Address"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Section 2: License Requirements -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">2. License Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Application Type <span class="text-red-500">*</span></label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option>Initial Issue</option>
                                <option>Renewal</option>
                                <option>Validation of Foreign License</option>
                                <option>Addition of Rating</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">License Category <span class="text-red-500">*</span></label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option>ATPL (Airline Transport Pilot License)</option>
                                <option>CPL (Commercial Pilot License)</option>
                                <option>PPL (Private Pilot License)</option>
                                <option>ATC (Air Traffic Controller)</option>
                                <option>AME (Aircraft Maintenance Engineer)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Total Flight Hours (If applicable)</label>
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Hours">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Medical Certificate</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option>Class 1</option>
                                <option>Class 2</option>
                                <option>Class 3</option>
                                <option>Not Applicable</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Document Uploads -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">3. Logbooks & Certifications</h4>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mt-2 text-sm text-gray-600">Upload scanned logbook pages, training certificates, and medical certificate.</p>
                        <p class="text-xs text-gray-500 mt-1">PDF up to 20MB</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.flight') : route('services.flight') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
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
