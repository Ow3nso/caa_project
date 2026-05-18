@extends('layouts.organization', ['activeNav' => 'organization'])

@section('title', 'Organization Details')

@section('header')
<header class="shrink-0 border-b border-surface-border bg-surface-elevated/80 backdrop-blur px-6 lg:px-8 py-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-black tracking-tight">{{ $organization->name }}</h1>
            <p class="mt-1 text-sm text-black">Viewing registration profile and approval records.</p>
        </div>
        <a href="{{ route('organization.dashboard') }}" class="rounded-lg border border-surface-border bg-surface-elevated px-4 py-2 text-sm font-medium text-black hover:bg-white/5 transition">
            Back to Dashboard
        </a>
    </div>
</header>
@endsection

@section('content')
<div class="max-w-3xl rounded-xl border border-surface-border bg-surface-elevated p-6 shadow-xl shadow-black/20 text-black">
    <h2 class="text-lg font-medium text-black border-b border-surface-border pb-3 mb-6">Profile Information</h2>
    
    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
        <div>
            <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Organization Name</dt>
            <dd class="mt-1 text-base font-semibold text-black">{{ $organization->name }}</dd>
        </div>
        <div>
            <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Operation Type</dt>
            <dd class="mt-1 text-base text-black"><span class="inline-flex rounded-md bg-surface-border px-2 py-0.5 text-xs font-medium">{{ $organization->type }}</span></dd>
        </div>
        <div>
            <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Approval Number</dt>
            <dd class="mt-1 font-mono text-sm text-black">{{ $organization->approval_no }}</dd>
        </div>
        <div>
            <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Fleet Size</dt>
            <dd class="mt-1 text-base text-black">{{ $organization->fleet_size }} aircraft</dd>
        </div>
        <div>
            <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Valid Until</dt>
            <dd class="mt-1 text-base text-black">{{ $organization->valid_until?->format('M j, Y') ?? $organization->valid_until }}</dd>
        </div>
        <div>
            <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Approval Status</dt>
            <dd class="mt-1">
                @if(strtolower($organization->status) === 'valid')
                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/15 px-2.5 py-1 text-xs font-medium text-emerald-400">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Valid
                    </span>
                @else
                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-500/15 px-2.5 py-1 text-xs font-medium text-amber-400">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span> Pending Review
                    </span>
                @endif
            </dd>
        </div>
    </dl>
</div>
@endsection