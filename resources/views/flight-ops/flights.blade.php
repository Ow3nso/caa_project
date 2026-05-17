<x-flight-ops-layout title="Flights Register">

    <div class="page-header">
        <div class="page-title">✈ Flights Register</div>
        <div class="page-subtitle">
            Complete flight movement record · ICAO Annex 6 §11.4 ·
            Journey Log maintained per CAR 2025
        </div>
    </div>

    {{-- Status Summary --}}
    <div class="stat-grid stat-grid-6">
        @foreach([
            ['label'=>'Scheduled', 'value'=>$summary['scheduled'], 'class'=>'gray'],
            ['label'=>'Boarding',  'value'=>$summary['boarding'],  'class'=>'amber'],
            ['label'=>'Departed',  'value'=>$summary['departed'],  'class'=>'sky'],
            ['label'=>'Landed',    'value'=>$summary['landed'],    'class'=>'green'],
            ['label'=>'Delayed',   'value'=>$summary['delayed'],   'class'=>'red'],
            ['label'=>'Cancelled', 'value'=>$summary['cancelled'], 'class'=>'gray'],
        ] as $s)
        <div class="stat-card {{ $s['class'] }}">
            <div class="stat-value">{{ $s['value'] }}</div>
            <div class="stat-label">{{ $s['label'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Flights Table --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">All Flight Records</div>
            <div class="card-meta">{{ count($flights) }} records · All times UTC</div>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Flight No.</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Type</th>
                    <th>STD (UTC)</th>
                    <th>STA (UTC)</th>
                    <th>Aircraft</th>
                    <th>Captain</th>
                    <th>POB</th>
                    <th>Plan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $f)
                <tr>
                    <td>
                        <span class="mono" style="font-weight:700;
                              color:var(--navy); font-size:0.85rem;">
                            {{ $f['id'] }}
                        </span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              color:var(--sky); font-weight:600;">
                            {{ explode(' ', $f['origin'])[1] ?? $f['origin'] }}
                        </span>
                        <div style="font-size:0.7rem; color:var(--gray-text);">
                            {{ explode('(', $f['origin'])[0] }}
                        </div>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              color:var(--sky); font-weight:600;">
                            {{ explode(' ', $f['destination'])[1] ?? $f['destination'] }}
                        </span>
                        <div style="font-size:0.7rem; color:var(--gray-text);">
                            {{ explode('(', $f['destination'])[0] }}
                        </div>
                    </td>
                    <td>
                        @php
                            $typeColors = [
                                'Commercial' => 'badge-navy',
                                'Cargo'      => 'badge-purple',
                                'Training'   => 'badge-blue',
                                'Charter'    => 'badge-amber',
                            ];
                        @endphp
                        <span class="badge {{ $typeColors[$f['type']] ?? 'badge-gray' }}">
                            {{ $f['type'] }}
                        </span>
                    </td>
                    <td class="mono" style="font-size:0.78rem;">
                        {{ \Carbon\Carbon::parse($f['std'])->format('d M H:i') }}
                    </td>
                    <td class="mono" style="font-size:0.78rem;">
                        {{ \Carbon\Carbon::parse($f['sta'])->format('d M H:i') }}
                    </td>
                    <td>
                        <span class="mono" style="background:#EEF2FF; color:#3730A3;
                              padding:0.2rem 0.5rem; border-radius:4px; font-size:0.72rem;">
                            {{ $f['aircraft'] }}
                        </span>
                    </td>
                    <td style="font-size:0.78rem; color:var(--navy);">
                        {{ $f['captain'] }}
                    </td>
                    <td style="text-align:center; font-weight:600;
                               color:{{ $f['pob'] > 0 ? 'var(--navy)' : 'var(--gray-text)' }};">
                        {{ $f['pob'] > 0 ? $f['pob'] : '—' }}
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
                        <span class="badge {{ $planColors[$f['plan_status']] ?? 'badge-gray' }}">
                            {{ $f['plan_status'] }}
                        </span>
                    </td>
                    <td>
                        @php
                            $statusColors = [
                                'Landed'    => 'badge-green',
                                'Departed'  => 'badge-blue',
                                'Boarding'  => 'badge-amber',
                                'Scheduled' => 'badge-gray',
                                'Delayed'   => 'badge-red',
                                'Cancelled' => 'badge-purple',
                            ];
                            $statusIcons = [
                                'Landed'    => '✓',
                                'Departed'  => '↑',
                                'Boarding'  => '⬤',
                                'Scheduled' => '○',
                                'Delayed'   => '!',
                                'Cancelled' => '✕',
                            ];
                        @endphp
                        <span class="badge {{ $statusColors[$f['status']] ?? 'badge-gray' }}">
                            {{ $statusIcons[$f['status']] ?? '' }} {{ $f['status'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="padding:0.75rem 1rem; background:#FAFBFD;
                    border-top:1px solid var(--gray-border);
                    font-size:0.72rem; color:var(--gray-text);">
            {{ count($flights) }} flight records ·
            Journey Log maintained per ICAO Annex 6 §11.4 ·
            AOC-KE-001 · All times UTC
        </div>
    </div>

</x-flight-ops-layout>