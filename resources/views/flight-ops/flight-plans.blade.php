<x-flight-ops-layout title="Flight Plans">

    <div class="page-header">
        <div class="page-title">📋 Flight Plans</div>
        <div class="page-subtitle">
            Filed flight plans · ICAO Annex 2 · All plans logged
            per KCAA Air Navigation Services requirements
        </div>
    </div>

    {{-- Summary --}}
    <div class="stat-grid stat-grid-4">
        @foreach([
            ['label'=>'Total Plans',  'value'=>count($plans), 'class'=>''],
            ['label'=>'Approved',     'value'=>collect($plans)->where('status','Approved')->count(), 'class'=>'green'],
            ['label'=>'Filed',        'value'=>collect($plans)->where('status','Filed')->count(),    'class'=>'sky'],
            ['label'=>'Draft',        'value'=>collect($plans)->where('status','Draft')->count(),    'class'=>'amber'],
        ] as $s)
        <div class="stat-card {{ $s['class'] }}">
            <div class="stat-value">{{ $s['value'] }}</div>
            <div class="stat-label">{{ $s['label'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Plans Table --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">Flight Plan Register</div>
            <div class="card-meta">ICAO Annex 2 · {{ count($plans) }} plans on record</div>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Plan Ref</th>
                    <th>Flight</th>
                    <th>Route</th>
                    <th>Alt</th>
                    <th>Speed</th>
                    <th>EET</th>
                    <th>Fuel</th>
                    <th>Alternate</th>
                    <th>POB</th>
                    <th>Filed By</th>
                    <th>Filed At</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $p)
                <tr>
                    <td>
                        <span class="mono" style="font-size:0.75rem;
                              color:var(--sky); font-weight:600;">
                            {{ $p['ref'] }}
                        </span>
                    </td>
                    <td>
                        <span class="mono" style="font-weight:700;
                              color:var(--navy);">{{ $p['flight'] }}</span>
                        <div style="font-size:0.7rem; color:var(--gray-text);">
                            {{ $p['origin'] }} → {{ $p['destination'] }}
                        </div>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.72rem;
                              color:var(--navy);">{{ $p['route'] }}</span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              font-weight:600; color:var(--navy);">
                            {{ $p['altitude'] }}
                        </span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;">
                            {{ $p['speed'] }}
                        </span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              color:var(--green);">{{ $p['eet'] }}</span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              color:var(--sky);">{{ $p['fuel_hrs'] }}</span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              color:var(--amber); font-weight:600;">
                            {{ $p['alternate'] }}
                        </span>
                    </td>
                    <td style="text-align:center; font-weight:600;">
                        {{ $p['pob'] > 0 ? $p['pob'] : '—' }}
                    </td>
                    <td style="font-size:0.75rem; color:var(--navy);">
                        {{ $p['filed_by'] }}
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.72rem;
                              color:var(--gray-text);">
                            {{ \Carbon\Carbon::parse($p['filed_at'])->format('d M H:i') }}
                        </span>
                    </td>
                    <td>
                        @php
                            $planColors = [
                                'Closed'   => 'badge-gray',
                                'Approved' => 'badge-green',
                                'Filed'    => 'badge-blue',
                                'Draft'    => 'badge-amber',
                            ];
                        @endphp
                        <span class="badge {{ $planColors[$p['status']] ?? 'badge-gray' }}">
                            {{ $p['status'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="padding:0.75rem 1rem; background:#FAFBFD;
                    border-top:1px solid var(--gray-border);
                    font-size:0.72rem; color:var(--gray-text);">
            All flight plans filed per ICAO Annex 2 ·
            Alternate aerodromes designated per CAR 2025 ·
            Fuel reserves calculated per ICAO Doc 9976
        </div>
    </div>

</x-flight-ops-layout>