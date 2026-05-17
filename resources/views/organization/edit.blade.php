@extends('layouts.organization', ['activeNav' => 'organization'])

@section('title', 'Edit Organization')

@section('header')
<header class="shrink-0 border-b border-surface-border bg-surface-elevated/80 backdrop-blur px-6 lg:px-8 py-5">
    <div>
        <h1 class="text-2xl font-semibold text-black tracking-tight">Edit & Approve</h1>
        <p class="mt-1 text-sm text-black">Modify properties or authorize approval credentials for {{ $organization->name }}.</p>
    </div>
</header>
@endsection

@section('content')
<div class="max-w-xl rounded-xl border border-surface-border bg-surface-elevated p-6 shadow-xl shadow-black/20">
    <form action="{{ route('organization.update', $organization->id) }}" method="POST" class="space-y-5 text-black">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-black">Organization Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $organization->name) }}" class="mt-1.5 w-full rounded-lg border border-surface-border bg-surface/50 py-2 px-3 text-sm text-black focus:border-accent focus:ring-1 focus:ring-accent" required>
            @error('name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-black">Organization Type</label>
            <input type="text" name="type" id="type" value="{{ old('type', $organization->type) }}" placeholder="e.g., AOC, AMO, ATO" class="mt-1.5 w-full rounded-lg border border-surface-border bg-surface/50 py-2 px-3 text-sm text-black focus:border-accent focus:ring-1 focus:ring-accent" required>
            @error('type') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="approval_no" class="block text-sm font-medium text-black">Approval Number</label>
            <input type="text" name="approval_no" id="approval_no" value="{{ old('approval_no', $organization->approval_no) }}" class="mt-1.5 w-full rounded-lg border border-surface-border bg-surface/50 py-2 px-3 text-sm font-mono text-black focus:border-accent focus:ring-1 focus:ring-accent" required>
            @error('approval_no') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="fleet_size" class="block text-sm font-medium text-black">Fleet Size</label>
                <input type="number" name="fleet_size" id="fleet_size" min="0" value="{{ old('fleet_size', $organization->fleet_size) }}" class="mt-1.5 w-full rounded-lg border border-surface-border bg-surface/50 py-2 px-3 text-sm text-black focus:border-accent focus:ring-1 focus:ring-accent" required>
                @error('fleet_size') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="valid_until" class="block text-sm font-medium text-black">Valid Until</label>
                <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until', $organization->valid_until ? \Carbon\Carbon::parse($organization->valid_until)->format('Y-m-d') : '') }}" class="mt-1.5 w-full rounded-lg border border-surface-border bg-surface/50 py-2 px-3 text-sm text-black focus:border-accent focus:ring-1 focus:ring-accent" required>
                @error('valid_until') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Admin Status Approval Section --}}
        <div class="border-t border-surface-border pt-4">
            <label for="status" class="block text-sm font-medium text-black">Administrative Status (Approval)</label>
            <select name="status" id="status" class="mt-1.5 w-full rounded-lg border border-surface-border bg-surface py-2 px-3 text-sm text-black focus:border-accent focus:ring-1 focus:ring-accent">
                <option value="pending" {{ old('status', $organization->status) === 'pending' ? 'selected' : '' }}>Pending Review</option>
                <option value="valid" {{ old('status', $organization->status) === 'valid' ? 'selected' : '' }}>Valid (Approved)</option>
            </select>
            @error('status') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="{{ route('organization.dashboard') }}" class="rounded-lg border border-surface-border px-4 py-2 text-sm font-medium text-black hover:bg-white/5 transition">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-accent px-4 py-2 text-sm font-semibold text-white hover:bg-accent-hover transition">
                Save & Update Changes
            </button>
        </div>
    </form>
</div>
@endsection