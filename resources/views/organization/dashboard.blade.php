@extends('layouts.organization', ['activeNav' => 'organization'])

@section('title', 'Organizations')

@section('header')
<header class="shrink-0 border-b border-surface-border bg-surface-elevated/80 backdrop-blur px-6 lg:px-8 py-5">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-black tracking-tight">Organizations</h1>
            <p class="mt-1 text-sm text-slate-400">Manage registered aviation operators, maintenance orgs, and training schools.</p>
        </div>
    </div>
</header>
@endsection

@section('content')
@php
    $search = request('search');
    $filterParams = fn (?string $status = null) => array_filter([
        'search' => $search,
        'status' => $status,
    ]);
@endphp

{{-- Stats --}}
<section class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <article class="rounded-xl border border-surface-border bg-surface-elevated p-5">
        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Total registered</p>
        <p class="mt-2 text-3xl font-semibold text-black">{{ $stats['total'] ?? 0 }}</p>
    </article>
    <article class="rounded-xl border border-emerald-500/20 bg-emerald-500/5 p-5">
        <p class="text-xs font-medium uppercase tracking-wider text-emerald-400/80">Valid approvals</p>
        <p class="mt-2 text-3xl font-semibold text-emerald-300">{{ $stats['valid'] ?? 0 }}</p>
    </article>
    <article class="rounded-xl border border-amber-500/20 bg-amber-500/5 p-5">
        <p class="text-xs font-medium uppercase tracking-wider text-amber-400/80">Pending review</p>
        <p class="mt-2 text-3xl font-semibold text-amber-300">{{ $stats['pending'] ?? 0 }}</p>
    </article>
</section>

{{-- Toolbar: search + filters --}}
<section class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
    <form action="{{ route('organization.dashboard') }}" method="GET" class="flex flex-1 max-w-xl gap-2">
        @if ($currentStatus)
            <input type="hidden" name="status" value="{{ $currentStatus }}">
        @endif
        <label for="search" class="sr-only">Search organizations</label>
        <div class="relative flex-1">
            <svg class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="search" id="search" name="search" value="{{ $search }}"
                   placeholder="Search by name or approval number…"
                   class="w-full rounded-lg border border-surface-border bg-surface-elevated py-2.5 pl-10 pr-4 text-sm text-black placeholder-slate-500 focus:border-accent focus:ring-1 focus:ring-accent">
        </div>
        <button type="submit"
                class="shrink-0 rounded-lg border border-surface-border bg-surface-elevated px-4 py-2.5 text-sm font-medium text-black hover:bg-white/5 transition">
            Search
        </button>
    </form>

    <div class="flex flex-wrap items-center gap-2">
        <span class="text-xs text-slate-500 mr-1">Status:</span>
        <a href="{{ route('organization.dashboard', $filterParams(null)) }}"
           class="rounded-lg px-4 py-2 text-sm font-medium transition {{ !$currentStatus ? 'bg-accent text-white' : 'border border-surface-border text-slate-300 hover:bg-white/5' }}">
            All
        </a>
        <a href="{{ route('organization.dashboard', $filterParams('valid')) }}"
           class="rounded-lg px-4 py-2 text-sm font-medium transition {{ $currentStatus === 'valid' ? 'bg-emerald-600 text-white' : 'border border-surface-border text-slate-300 hover:bg-white/5' }}">
            Valid
        </a>
        <a href="{{ route('organization.dashboard', $filterParams('pending')) }}"
           class="rounded-lg px-4 py-2 text-sm font-medium transition {{ $currentStatus === 'pending' ? 'bg-amber-600 text-white' : 'border border-surface-border text-slate-300 hover:bg-white/5' }}">
            Pending
        </a>
        @if ($search || $currentStatus)
            <a href="{{ route('organization.dashboard') }}"
               class="rounded-lg px-3 py-2 text-sm text-slate-400 hover:text-white transition underline-offset-2 hover:underline">
                Clear filters
            </a>
        @endif
    </div>
</section>

{{-- Table --}}
<section class="rounded-xl border border-surface-border bg-surface-elevated overflow-hidden shadow-xl shadow-black/20">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-surface-border bg-surface/50">
                    <th class="px-5 py-3.5 font-medium text-slate-400">Organization</th>
                    <th class="px-5 py-3.5 font-medium text-slate-400">Type</th>
                    <th class="px-5 py-3.5 font-medium text-slate-400">Approval No.</th>
                    <th class="px-5 py-3.5 font-medium text-slate-400">Valid until</th>
                    <th class="px-5 py-3.5 font-medium text-slate-400 text-center">Fleet</th>
                    <th class="px-5 py-3.5 font-medium text-slate-400 text-center">Status</th>
                    <th class="px-5 py-3.5 font-medium text-slate-400 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-border">
                @forelse ($organizations as $org)
                    @php
                        $status = strtolower($org->status ?? '');
                        $isValid = $status === 'valid';
                        $isPending = $status === 'pending';
                    @endphp
                    <tr class="hover:bg-white/[0.02] transition">
                        <td class="px-5 py-4">
                            <span class="font-medium text-black">{{ $org->name }}</span>
                        </td>
                        <td class="px-5 py-4">
                            <span class="inline-flex rounded-md bg-surface-border/80 px-2 py-0.5 text-xs font-medium text-black">{{ $org->type }}</span>
                        </td>
                        <td class="px-5 py-4 font-mono text-xs text-black">{{ $org->approval_no }}</td>
                        <td class="px-5 py-4 text-black">
                            {{ $org->valid_until?->format('M j, Y') ?? '—' }}
                        </td>
                        <td class="px-5 py-4 text-center text-black">{{ $org->fleet_size }}</td>
                        <td class="px-5 py-4 text-center">
                            @if ($isValid)
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/15 px-2.5 py-1 text-xs font-medium text-emerald-400">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                    Valid
                                </span>
                            @elseif ($isPending)
                                <span class="inline-flex items-center gap-1 rounded-full bg-amber-500/15 px-2.5 py-1 text-xs font-medium text-amber-400">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                    Pending
                                </span>
                            @else
                                <span class="inline-flex rounded-full bg-slate-500/15 px-2.5 py-1 text-xs font-medium text-slate-400">{{ ucfirst($org->status) }}</span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-right">
    <div class="inline-flex items-center gap-2">
        {{-- View Button --}}
        <!-- Changed from organization.show -->
        <a href="{{ route('organization.show', $org->id) }}" 
           class="rounded-md border border-surface-border bg-surface px-2.5 py-1.5 text-xs font-medium text-slate-300 hover:bg-white/5 hover:text-black transition"
           title="View Details">
            View
        </a>

        {{-- Edit / Approve Button --}}
        <!-- Changed from organization.edit -->
        <a href="{{ route('organization.edit', $org->id) }}" 
           class="rounded-md border border-surface-border bg-surface px-2.5 py-1.5 text-xs font-medium text-amber-400 hover:bg-amber-500/10 transition"
           title="Edit & Approve">
            Edit
        </a>

        {{-- Delete Button Form --}}
        <!-- Changed from organization.destroy -->
        <form action="{{ route('organization.destroy', $org->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this organization? This action cannot be undone.');" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="rounded-md border border-red-500/20 bg-surface px-2.5 py-1.5 text-xs font-medium text-red-400 hover:bg-red-500/10 transition"
                    title="Delete Organization">
                Delete
            </button>
        </form>
    </div>
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-5 py-16 text-center">
                            <div class="mx-auto max-w-sm">
                                <svg class="mx-auto h-12 w-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <p class="mt-4 text-base font-medium text-slate-300">No organizations found</p>
                                <p class="mt-1 text-sm text-slate-500">
                                    @if ($search || $currentStatus)
                                        Try adjusting your search or filters.
                                    @else
                                        Get started by registering your first aviation organization.
                                    @endif
                                </p>
                                <a href="{{ route('organization.create') }}"
                                   class="mt-6 inline-flex items-center gap-2 rounded-lg bg-accent px-4 py-2 text-sm font-semibold text-white hover:bg-accent-hover transition">
                                    Register organization
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($organizations->isNotEmpty())
        <footer class="border-t border-surface-border px-5 py-3 text-xs text-slate-500">
            Showing {{ $organizations->count() }} {{ Str::plural('organization', $organizations->count()) }}
            @if ($currentStatus)
                · filtered by <span class="text-slate-400">{{ $currentStatus }}</span>
            @endif
            @if ($search)
                · matching "<span class="text-slate-400">{{ $search }}</span>"
            @endif
        </footer>
    @endif
</section>
@endsection