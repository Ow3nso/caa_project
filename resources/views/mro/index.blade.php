<x-app-layout>
    <x-slot name="header">
        MRO Approvals
    </x-slot>

    {{-- Stats Row --}}
    <div style="display:grid; grid-template-columns: repeat(4, 1fr); gap: 2rem; margin-bottom: 1.5rem;">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-1">Total Facilities</div>
            <div class="text-3xl font-bold text-caa-dark-navy">86</div>
            <div class="text-xs text-gray-400 mt-1">All registered MROs</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 border-t-2 border-t-green-400">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-1">Approved</div>
            <div class="text-3xl font-bold text-green-600">61</div>
            <div class="text-xs text-green-500 mt-1">Currently active</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 border-t-2 border-t-yellow-400">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-1">Pending Audit</div>
            <div class="text-3xl font-bold text-yellow-500">18</div>
            <div class="text-xs text-yellow-500 mt-1">Awaiting inspection</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 border-t-2 border-t-red-400">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-1">Expired</div>
            <div class="text-3xl font-bold text-red-500">7</div>
            <div class="text-xs text-red-400 mt-1">Needs renewal</div>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="flex-1 w-full sm:max-w-md">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input
                    type="text"
                    id="mroSearch"
                    onkeyup="filterTable()"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-caa-medium-blue focus:border-caa-medium-blue sm:text-sm transition"
                    placeholder="Search by name, location or cert number..."
                >
            </div>
        </div>

        <div class="flex items-center space-x-3 w-full sm:w-auto">
            <div class="flex bg-gray-100 p-1 rounded-lg" id="filterBtns">
                <button onclick="setFilter('all', this)" class="filter-btn px-4 py-1.5 text-sm font-medium rounded-md bg-white text-caa-dark-navy shadow-sm">All</button>
                <button onclick="setFilter('approved', this)" class="filter-btn px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-caa-dark-navy">Approved</button>
                <button onclick="setFilter('pending audit', this)" class="filter-btn px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-caa-dark-navy">Pending Audit</button>
                <button onclick="setFilter('expired', this)" class="filter-btn px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-caa-dark-navy">Expired</button>
            </div>

            <a href="{{ route('apply.mro') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-caa-medium-blue hover:bg-caa-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                New MRO Application
            </a>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                        <th class="py-4 px-6 font-semibold">Certificate No.</th>
                        <th class="py-4 px-6 font-semibold">Facility Name</th>
                        <th class="py-4 px-6 font-semibold">Location</th>
                        <th class="py-4 px-6 font-semibold">Ratings</th>
                        <th class="py-4 px-6 font-semibold">Status</th>
                        <th class="py-4 px-6 font-semibold">Expiry Date</th>
                        <th class="py-4 px-6 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="mroBody" class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition" data-status="approved">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">MRO/UG/012</td>
                        <td class="py-4 px-6 text-gray-700 font-medium">AeroFix Engineering</td>
                        <td class="py-4 px-6 text-gray-600">Entebbe, Uganda</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200 mr-1">A1</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">C5</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Approved</span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">15 Aug 2027</td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <button onclick="openModal('MRO/UG/012', 'AeroFix Engineering', 'Entebbe, Uganda', 'A1, C5', 'Approved', '15 Aug 2027')" class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300">|</span>
                            <a href="{{ route('apply.mro') }}" class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition" data-status="pending audit">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">MRO/KE/045</td>
                        <td class="py-4 px-6 text-gray-700 font-medium">Nairobi Aviation Services</td>
                        <td class="py-4 px-6 text-gray-600">Nairobi, Kenya</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200 mr-1">A1</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200 mr-1">B1</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">C3</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending Audit</span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">10 Jun 2026</td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <button onclick="openModal('MRO/KE/045', 'Nairobi Aviation Services', 'Nairobi, Kenya', 'A1, B1, C3', 'Pending Audit', '10 Jun 2026')" class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300">|</span>
                            <a href="{{ route('apply.mro') }}" class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition" data-status="expired">
                        <td class="py-4 px-6 font-medium text-caa-dark-navy">MRO/ZA/008</td>
                        <td class="py-4 px-6 text-gray-700 font-medium">Southern Sky Maintenance</td>
                        <td class="py-4 px-6 text-gray-600">Johannesburg, SA</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">A1</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Expired</span>
                        </td>
                        <td class="py-4 px-6 text-red-500 font-medium">01 Feb 2026</td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <button onclick="openModal('MRO/ZA/008', 'Southern Sky Maintenance', 'Johannesburg, SA', 'A1', 'Expired', '01 Feb 2026')" class="text-gray-400 hover:text-caa-medium-blue font-medium transition">View</button>
                            <span class="text-gray-300">|</span>
                            <a href="{{ route('apply.mro') }}" class="text-gray-400 hover:text-caa-dark-navy font-medium transition">Edit</a>
                        </td>
                    </tr>

                    {{-- Empty state (shown when no results match search/filter) --}}
                    <tr id="emptyState" class="hidden">
                        <td colspan="7" class="py-12 text-center text-gray-400">
                            <svg class="mx-auto h-10 w-10 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-sm">No MRO facilities match your search.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-100 bg-white flex items-center justify-between">
            <p class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">86</span> results
            </p>
            <nav class="inline-flex rounded-md shadow-sm -space-x-px">
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm text-gray-500 hover:bg-gray-50">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </a>
                <a href="#" class="z-10 bg-caa-light-blue border-caa-medium-blue text-caa-dark-navy relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm text-gray-500 hover:bg-gray-50">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                </a>
            </nav>
        </div>
    </div>

    {{-- View Modal --}}
    <div id="viewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-caa-dark-navy">MRO Facility Details</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-sm text-gray-500">Certificate No.</span>
                    <span id="m-cert" class="text-sm font-semibold text-caa-dark-navy"></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-500">Facility Name</span>
                    <span id="m-name" class="text-sm font-medium text-gray-700"></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-500">Location</span>
                    <span id="m-location" class="text-sm text-gray-600"></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-500">Ratings</span>
                    <span id="m-ratings" class="text-sm text-gray-600"></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">Status</span>
                    <span id="m-status" class="text-xs font-medium px-2.5 py-0.5 rounded-full"></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-500">Expiry Date</span>
                    <span id="m-expiry" class="text-sm text-gray-600"></span>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 flex justify-end space-x-3">
                <button onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50 transition">Close</button>
                <a href="{{ route('apply.mro') }}" class="px-4 py-2 bg-caa-medium-blue text-white rounded-lg text-sm font-medium hover:bg-caa-dark-blue transition">Edit Record</a>
            </div>
        </div>
    </div>

    <script>
        let currentFilter = 'all';

        function openModal(cert, name, location, ratings, status, expiry) {
            document.getElementById('m-cert').textContent     = cert;
            document.getElementById('m-name').textContent     = name;
            document.getElementById('m-location').textContent = location;
            document.getElementById('m-ratings').textContent  = ratings;
            document.getElementById('m-expiry').textContent   = expiry;

            const statusEl = document.getElementById('m-status');
            statusEl.textContent = status;
            statusEl.className = 'text-xs font-medium px-2.5 py-0.5 rounded-full ';
            if (status === 'Approved')      statusEl.className += 'bg-green-100 text-green-800';
            else if (status === 'Expired')  statusEl.className += 'bg-red-100 text-red-800';
            else                            statusEl.className += 'bg-yellow-100 text-yellow-800';

            const modal = document.getElementById('viewModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('viewModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('viewModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        function filterTable() {
            const search = document.getElementById('mroSearch').value.toLowerCase();
            const rows = document.querySelectorAll('#mroBody tr[data-status]');
            let visibleCount = 0;
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const status = row.getAttribute('data-status');
                const matchSearch = text.includes(search);
                const matchFilter = currentFilter === 'all' || status === currentFilter;
                const show = matchSearch && matchFilter;
                row.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });
            document.getElementById('emptyState').classList.toggle('hidden', visibleCount > 0);
        }

        function setFilter(filter, btn) {
            currentFilter = filter;
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('bg-white', 'text-caa-dark-navy', 'shadow-sm');
                b.classList.add('text-gray-500');
            });
            btn.classList.add('bg-white', 'text-caa-dark-navy', 'shadow-sm');
            btn.classList.remove('text-gray-500');
            filterTable();
        }
    </script>

</x-app-layout>
