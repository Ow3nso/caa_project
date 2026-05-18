<x-flight-ops-layout title="Operations Dashboard">

    <div class="page-header">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <div class="page-title">Operations Dashboard</div>
                <div class="page-subtitle">
                    Flight Operations Control · HKJK Area Control Centre ·
                    {{ now()->format('l, d F Y') }}
                </div>
            </div>
            <div style="text-align:right;">
                <div style="font-size:0.72rem; color:var(--gray-text); margin-bottom:0.2rem;">
                    OPERATIONAL PERIOD
                </div>
                <div style="font-size:0.88rem; font-weight:700; color:var(--navy);
                            font-family:'JetBrains Mono',monospace;">
                    {{ now()->format('d M Y') }} 00:00 – 23:59 UTC
                </div>
            </div>
        </div>
    </div>

    {{-- ── STAT CARDS ── --}}
    <div class="stat-grid stat-grid-6">
        <div class="stat-card sky">
            <div class="stat-value">{{ $stats['flights_today'] }}</div>
            <div class="stat-label">Flights Today</div>
            <div class="stat-sub">{{ $stats['total_flights'] }} total in register</div>
        </div>
        <div class="stat-card green">
            <div class="stat-value">{{ $stats['aircraft_active'] }}</div>
            <div class="stat-label">Aircraft Active</div>
            <div class="stat-sub">Fleet airworthy & dispatched</div>
        </div>
        <div class="stat-card red">
            <div class="stat-value">{{ $stats['aircraft_grounded'] }}</div>
            <div class="stat-label">Grounded</div>
            <div class="stat-sub">Awaiting COA / maintenance</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $stats['crew_on_duty'] }}</div>
            <div class="stat-label">Crew On Duty</div>
            <div class="stat-sub">Pilots, F/O, cabin, dispatch</div>
        </div>
        <div class="stat-card amber">
            <div class="stat-value">{{ $stats['open_incidents'] }}</div>
            <div class="stat-label">Open Incidents</div>
            <div class="stat-sub">Require inspector action</div>
        </div>
        <div class="stat-card sky">
            <div class="stat-value">98<span style="font-size:1rem;">%</span></div>
            <div class="stat-label">Dispatch Rate</div>
            <div class="stat-sub">On-time performance MTD</div>
        </div>
    </div>

    {{-- ── FLIGHT STATUS SUMMARY BAR ── --}}
    <div class="card" style="margin-bottom:1.5rem;">
        <div class="card-header">
            <div class="card-title">✈ Today's Flight Status Overview</div>
            <div class="card-meta">{{ now()->format('d M Y') }} · All times UTC</div>
        </div>
        <div style="display:grid; grid-template-columns:repeat(6,1fr);
                    border-bottom:1px solid var(--gray-border);">
            @foreach([
                ['label'=>'Scheduled', 'count'=>2, 'color'=>'var(--gray-text)',  'bg'=>'#F0F2F5'],
                ['label'=>'Boarding',  'count'=>1, 'color'=>'var(--amber)',       'bg'=>'#FFF4E5'],
                ['label'=>'Departed',  'count'=>1, 'color'=>'var(--sky)',         'bg'=>'#E5F4FB'],
                ['label'=>'Landed',    'count'=>2, 'color'=>'var(--green-lt)',    'bg'=>'#E6F7EE'],
                ['label'=>'Delayed',   'count'=>1, 'color'=>'var(--red)',         'bg'=>'#FDEAEA'],
                ['label'=>'Cancelled', 'count'=>1, 'color'=>'#5B21B6',           'bg'=>'#F0E8FF'],
            ] as $s)
            <div style="padding:1rem; text-align:center;
                        border-right:1px solid var(--gray-border);
                        background:{{ $s['bg'] }};">
                <div style="font-size:1.8rem; font-weight:700;
                            color:{{ $s['color'] }};">{{ $s['count'] }}</div>
                <div style="font-size:0.72rem; font-weight:600;
                            color:{{ $s['color'] }}; letter-spacing:0.04em;
                            text-transform:uppercase;">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── MAIN GRID ── --}}
    <div class="grid-3-1" style="align-items:start;">

        {{-- LEFT — Today's Flights Table --}}
        <div class="card" style="margin-bottom:0;">
            <div class="card-header">
                <div class="card-title">Flight Movement Register — {{ now()->format('d M Y') }}</div>
                <div class="card-meta">Journey Log · ICAO Annex 6 §11.4</div>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Flight</th>
                        <th>Route</th>
                        <th>STD</th>
                        <th>STA</th>
                        <th>Aircraft</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todays_flights as $f)
                    <tr>
                        <td>
                            <span class="mono" style="font-weight:700;
                                color:var(--navy);">{{ $f['flight'] }}</span>
                        </td>
                        <td>
                            <div style="font-size:0.8rem; color:var(--navy);
                                        font-weight:500;">{{ $f['route'] }}</div>
                            <div style="font-size:0.7rem; color:var(--gray-text);">
                                {{ $f['destination'] }}
                            </div>
                        </td>
                        <td class="mono">{{ $f['std'] }}</td>
                        <td class="mono">{{ $f['sta'] }}</td>
                        <td>
                            <span class="mono"
                                  style="background:#EEF2FF; color:#3730A3;
                                         padding:0.2rem 0.5rem; border-radius:4px;
                                         font-size:0.72rem;">
                                {{ $f['aircraft'] }}
                            </span>
                        </td>
                        <td>
                            @php
                                $map = [
                                    'Landed'    => 'badge-green',
                                    'Departed'  => 'badge-blue',
                                    'Boarding'  => 'badge-amber',
                                    'Scheduled' => 'badge-gray',
                                    'Delayed'   => 'badge-red',
                                    'Cancelled' => 'badge-purple',
                                ];
                                $icons = [
                                    'Landed'    => '✓',
                                    'Departed'  => '↑',
                                    'Boarding'  => '⬤',
                                    'Scheduled' => '○',
                                    'Delayed'   => '!',
                                    'Cancelled' => '✕',
                                ];
                            @endphp
                            <span class="badge {{ $map[$f['status']] ?? 'badge-gray' }}">
                                {{ $icons[$f['status']] ?? '' }} {{ $f['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding:0.75rem 1rem; background:#FAFBFD;
                        border-top:1px solid var(--gray-border);
                        font-size:0.72rem; color:var(--gray-text);">
                Showing {{ count($todays_flights) }} movements ·
                All times UTC · AOC-KE-001
            </div>
        </div>

        {{-- RIGHT — Alerts & Quick Info --}}
        <div style="display:flex; flex-direction:column; gap:1.5rem;">

            {{-- Operational Alerts --}}
            <div class="card" style="margin-bottom:0;">
                <div class="card-header">
                    <div class="card-title">⚠ Operational Alerts</div>
                    <div class="card-meta">{{ count($alerts) }} active</div>
                </div>
                <div style="padding:1rem;">
                    @foreach($alerts as $alert)
                    <div class="alert alert-{{ $alert['type'] === 'danger' ? 'danger' : ($alert['type'] === 'warning' ? 'warning' : 'info') }}">
                        <div class="alert-icon">{{ $alert['icon'] }}</div>
                        <div>
                            <div>{{ $alert['message'] }}</div>
                            <div class="alert-ref">{{ $alert['ref'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Regulatory Reference --}}
            <div class="card" style="margin-bottom:0;">
                <div class="card-header">
                    <div class="card-title">📘 Regulatory Reference</div>
                </div>
                <div style="padding:1rem;">
                    @foreach([
                        ['ref'=>'ICAO Annex 6',  'desc'=>'Operation of Aircraft · Part I'],
                        ['ref'=>'ICAO Annex 2',  'desc'=>'Rules of the Air · Flight Plans'],
                        ['ref'=>'CAR 2025',      'desc'=>'Kenya Civil Aviation Regulations'],
                        ['ref'=>'AOC-KE-001',    'desc'=>'Air Operator Certificate · Active'],
                        ['ref'=>'Annex 6 §4.3',  'desc'=>'Flight Time Limitations · Crew'],
                        ['ref'=>'MOR System',    'desc'=>'Mandatory Occurrence Reporting'],
                    ] as $r)
                    <div class="detail-row">
                        <span class="mono" style="font-size:0.75rem;
                              color:var(--sky); font-weight:600;">{{ $r['ref'] }}</span>
                        <span style="font-size:0.75rem;
                              color:var(--gray-text);">{{ $r['desc'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Duty Hours Monitor --}}
            <div class="card" style="margin-bottom:0;">
                <div class="card-header">
                    <div class="card-title">⏱ Duty Hours Monitor</div>
                    <div class="card-meta">ICAO Annex 6 §4.3</div>
                </div>
                <div style="padding:1rem;">
                    @foreach([
                        ['name'=>'Capt. D. Kamau',  'hrs'=>87,  'max'=>100, 'label'=>'87/100 hrs (28-day)'],
                        ['name'=>'Capt. A. Mutua',  'hrs'=>95,  'max'=>100, 'label'=>'95/100 hrs (28-day)'],
                        ['name'=>'Capt. S. Wanjiku','hrs'=>91,  'max'=>100, 'label'=>'91/100 hrs (28-day)'],
                        ['name'=>'F/O M. Njoroge',  'hrs'=>92,  'max'=>100, 'label'=>'92/100 hrs (28-day)'],
                    ] as $dh)
                    @php $pct = min(100, round(($dh['hrs']/$dh['max'])*100)); @endphp
                    <div style="margin-bottom:0.85rem;">
                        <div style="display:flex; justify-content:space-between;
                                    font-size:0.75rem; margin-bottom:0.3rem;">
                            <span style="font-weight:600;
                                  color:var(--navy);">{{ $dh['name'] }}</span>
                            <span style="color:{{ $pct >= 90 ? 'var(--red)' : ($pct >= 75 ? 'var(--amber)' : 'var(--gray-text)') }};
                                  font-weight:600;">{{ $dh['label'] }}</span>
                        </div>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar-fill {{ $pct >= 90 ? 'red' : ($pct >= 75 ? 'amber' : '') }}"
                                 style="width:{{ $pct }}%;"></div>
                        </div>
                    </div>
                    @endforeach
                    <div style="font-size:0.7rem; color:var(--gray-text); margin-top:0.5rem;
                                padding-top:0.5rem; border-top:1px solid var(--gray-border);">
                        Max 100 hrs/28 days · 900 hrs/year per ICAO Annex 6
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-flight-ops-layout>