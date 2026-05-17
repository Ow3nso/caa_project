<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Organization</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-100 p-6 font-sans">

    <div class="max-w-xl mx-auto bg-gray-800 border border-gray-700 p-8 rounded-lg shadow-xl mt-10">
        <h2 class="text-xl font-bold mb-2 text-white">Register Aviation Organization</h2>
        <p class="text-xs text-gray-400 mb-6">Provide the mandatory legal details required to initialize the profile row.</p>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-900/50 border border-red-700 text-red-200 text-xs rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('organization.store') }}" method="POST" class="space-y-4">
            @csrf <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">Organization Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required 
                       class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-sm text-white focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">Organization Type</label>
                <select name="type" required 
                        class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-sm text-white focus:outline-none focus:border-blue-500">
                    <option value="">Select Type...</option>
                    <option value="AOC" {{ old('type') == 'AOC' ? 'selected' : '' }}>Air Operator Certificate (AOC)</option>
                    <option value="AMO" {{ old('type') == 'AMO' ? 'selected' : '' }}>Approved Maintenance Org (AMO / Part 145)</option>
                    <option value="ATO" {{ old('type') == 'ATO' ? 'selected' : '' }}>Approved Training Org (ATO / Flight School)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">Approval No.</label>
                <input type="text" name="approval_no" value="{{ old('approval_no') }}" required placeholder="e.g., CAA/AOC/042"
                       class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-sm text-white focus:outline-none focus:border-blue-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">Valid Until</label>
                    <input type="date" name="valid_until" value="{{ old('valid_until') }}" required 
                           class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-sm text-white focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">Fleet Size</label>
                    <input type="number" name="fleet_size" value="{{ old('fleet_size', 0) }}" min="0" required 
                           class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-sm text-white focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold p-2.5 rounded text-sm transition duration-150">
                    Save and Initialize Profile
                </button>
            </div>
        </form>
    </div>

</body>
</html>