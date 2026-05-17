<x-flight-ops-layout title="Incident Reports">

    <div class="page-header">
        <div class="page-title">⚠ Incident Reports</div>
        <div class="page-subtitle">
            Safety occurrence register · ICAO Annex 13 ·
            Mandatory Occurrence Reporting per KCAA MOR System ·
            Civil Aviation Act 2013 §54
        </div>
    </div>

    {{-- Summary --}}
    <div class="stat-grid stat-grid-6">
        <div class="stat-card">
            <div class="stat-value">{{ $summary['total'] }}</div>
            <div class="stat-label">Total Reports</div>
        </div>
        <div class="stat-card red">
            <div class="stat-value">{{ $summary['open'] }}</div>
            <div class="stat-label">Open</div>
            <div class="stat-sub">Immediate action required</div>
        </div>
        <div class="stat-card amber">
            <div class="stat-value">{{ $summary['under_investigation'] }}</div>
            <div class="stat-label">Under Investigation</div>
        </div>
        <div class="stat-card green">
            <div class="stat-value">{{ $summary['closed'] }}</div>
            <div class="stat-label">Closed</div>
            <div class="stat-sub">Resolved & documented</div>
        </div>
        <div class="stat-card red">
            <div class="stat-value">{{ $summary['critical'] }}</div>
            <div class="stat-label">Critical</div>
            <div class="stat-sub">Highest severity</div>
        </div>
        <div class="stat-card amber">
            <div class="stat-value">{{ $summary['high'] }}</div>
            <div class="stat-label">High Severity</div>
        </div>
    </div>

    {{-- Incidents --}}
    @foreach($incidents as $inc)
    @php
        $sevColors = [
            'Critical' => ['bg'=>'#FEF2F2', 'border'=>'var(--red)',   'badge'=>'badge-red',    'label'=>'🔴'],
            'High'     => ['bg'=>'#FEF2F2', 'border'=>'var(--red)',   'badge'=>'badge-red',    'label'=>'🔴'],
            'Medium'   => ['bg'=>'#FFFBEB', 'border'=>'var(--amber)', 'badge'=>'badge-amber',  'label'=>'🟡'],
            'Low'      => ['bg'=>'#F0FDF4', 'border'=>'var(--green)', 'badge'=>'badge-green',  'label'=>'🟢'],
        ];
        $sc = $sevColors[$inc['severity']] ?? $sevColors['Low'];

        $statusColors = [
            'Open'                => 'badge-red',
            'Under Investigation' => 'badge-amber',
            'Closed'              => 'badge-gray',
        ];

        $typeColors = [
            'Technical' => 'badge-navy',
            'Weather'   => 'badge-blue',
            'Security'  => 'badge-red',
            'Medical'   => 'badge-purple',
            'Near Miss' => 'badge-red',
        ];
    @endphp

    <div class="card" style="margin-bottom:1rem; border-left:4px solid {{ $sc['border'] }};">
        <div class="card-header" style="background:{{ $sc['bg'] }};">
            <div style="display:flex; align-items:center; gap:1rem; flex-wrap:wrap;">
                <span class="mono" style="font-size:0.88rem; font-weight:700;
                      color:var(--navy);">{{ $inc['ref'] }}</span>
                <span class="badge {{ $typeColors[$inc['type']] ?? 'badge-gray' }}">
                    {{ $inc['type'] }}
                </span>
                <span class="badge {{ $sc['badge'] }}">
                    {{ $sc['label'] }} {{ $inc['severity'] }}
                </span>
                <span class="badge {{ $statusColors[$inc['status']] ?? 'badge-gray' }}">
                    {{ $inc['status'] }}
                </span>
            </div>
            <div style="font-size:0.75rem; color:var(--gray-text); text-align:right;">
                <span class="mono">{{ $inc['date'] }}</span> ·
                {{ $inc['location'] }}
            </div>
        </div>

        <div style="padding:1.25rem; display:grid;
                    grid-template-columns:2fr 1fr; gap:1.5rem;">
            <div>
                <div style="font-size:0.82rem; font-weight:600;
                            color:var(--navy); margin-bottom:0.5rem;">
                    Occurrence Description
                </div>
                <div style="font-size:0.82rem; color:#374151; line-height:1.7;">
                    {{ $inc['description'] }}
                </div>
            </div>
            <div>
                <div class="detail-row">
                    <span class="detail-label">Flight</span>
                    <span class="mono" style="font-weight:700;
                          color:var(--navy); font-size:0.82rem;">
                        {{ $inc['flight'] }}
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Aircraft</span>
                    <span class="mono" style="font-size:0.82rem;
                          color:#3730A3; font-weight:600;">
                        {{ $inc['aircraft'] }}
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Reported By</span>
                    <span class="detail-value" style="font-size:0.78rem;">
                        {{ $inc['reported_by'] }}
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Inspector</span>
                    <span class="detail-value" style="font-size:0.78rem;">
                        {{ $inc['inspector'] }}
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Location</span>
                    <span class="mono" style="font-size:0.78rem;
                          color:var(--sky); font-weight:600;">
                        {{ $inc['location'] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div style="padding:0.75rem 1rem; background:var(--white);
                border:1px solid var(--gray-border); border-radius:8px;
                font-size:0.72rem; color:var(--gray-text);">
        All occurrences reported per ICAO Annex 13 ·
        Mandatory Occurrence Reporting (MOR) via KCAA eServices Portal ·
        Voluntary Occurrence Reporting (VOR) per CAR 2025 ·
        Civil Aviation Act 2013 §54
    </div>

</x-flight-ops-layout>