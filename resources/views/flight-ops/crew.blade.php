<x-flight-ops-layout title="Crew Members">

    <div class="page-header">
        <div class="page-title">👤 Crew Members</div>
        <div class="page-subtitle">
            Flight crew register · Personnel licensing per ICAO Annex 1 ·
            Duty hour limits enforced per ICAO Annex 6 §4.3
        </div>
    </div>

    {{-- Summary --}}
    <div class="stat-grid stat-grid-6">
        <div class="stat-card">
            <div class="stat-value">{{ $summary['total'] }}</div>
            <div class="stat-label">Total Crew</div>
        </div>
        <div class="stat-card green">
            <div class="stat-value">{{ $summary['on_duty'] }}</div>
            <div class="stat-label">On Duty</div>
            <div class="stat-sub">Active & assigned</div>
        </div>
        <div class="stat-card sky">
            <div class="stat-value">{{ $summary['standby'] }}</div>
            <div class="stat-label">Standby</div>
            <div class="stat-sub">Available if needed</div>
        </div>
        <div class="stat-card gray">
            <div class="stat-value">{{ $summary['off_duty'] }}</div>
            <div class="stat-label">Off Duty</div>
            <div class="stat-sub">Rest period</div>
        </div>
        <div class="stat-card amber">
            <div class="stat-value">{{ $summary['on_leave'] }}</div>
            <div class="stat-label">On Leave</div>
        </div>
        <div class="stat-card red">
            <div class="stat-value">{{ $summary['med_alert'] }}</div>
            <div class="stat-label">Medical Alert</div>
            <div class="stat-sub">Certificate expiring soon</div>
        </div>
    </div>

    {{-- Crew Table --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">Flight Crew Register</div>
            <div class="card-meta">
                ICAO Annex 1 · Annex 6 §4.3 ·
                {{ count($crew) }} personnel on register
            </div>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Emp No.</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>License</th>
                    <th>License No.</th>
                    <th>Lic. Expiry</th>
                    <th>Medical</th>
                    <th>Med. Expiry</th>
                    <th>Hrs/28 Day</th>
                    <th>Hrs/Year</th>
                    <th>Base</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crew as $c)
                @php
                    $licDays = (strtotime($c['license_expiry']) - time()) / 86400;
                    $medDays = (strtotime($c['medical_expiry']) - time()) / 86400;
                    $hrsColor = $c['hours_28day'] >= 90 ? 'var(--red)' :
                               ($c['hours_28day'] >= 75 ? 'var(--amber)' : 'var(--navy)');
                    $yrColor  = $c['hours_year'] >= 800 ? 'var(--red)' :
                               ($c['hours_year'] >= 700 ? 'var(--amber)' : 'var(--navy)');
                @endphp
                <tr>
                    <td>
                        <span class="mono" style="font-size:0.75rem;
                              color:var(--gray-text);">{{ $c['emp'] }}</span>
                    </td>
                    <td style="font-weight:600; color:var(--navy); font-size:0.82rem;">
                        {{ $c['name'] }}
                        @if($c['current_flight'])
                            <div style="font-size:0.68rem; color:var(--sky);
                                        font-family:'JetBrains Mono',monospace;">
                                ✈ {{ $c['current_flight'] }}
                            </div>
                        @endif
                    </td>
                    <td>
                        @php
                            $roleColors = [
                                'Captain'          => 'badge-navy',
                                'First Officer'    => 'badge-blue',
                                'Flight Dispatcher'=> 'badge-purple',
                                'Cabin Crew'       => 'badge-sky',
                            ];
                        @endphp
                        <span class="badge {{ $roleColors[$c['role']] ?? 'badge-gray' }}"
                              style="font-size:0.68rem;">
                            {{ $c['role'] }}
                        </span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem; font-weight:700;
                              color:var(--navy);">{{ $c['license'] }}</span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.72rem;
                              color:var(--gray-text);">{{ $c['license_no'] }}</span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.75rem;
                              color:{{ $licDays <= 30 ? 'var(--red)' : 'var(--green)' }};
                              font-weight:{{ $licDays <= 30 ? '700' : '400' }};">
                            {{ \Carbon\Carbon::parse($c['license_expiry'])->format('d M Y') }}
                        </span>
                        @if($licDays <= 30 && $licDays > 0)
                            <div style="font-size:0.65rem; color:var(--red);">
                                ⚠ {{ round($licDays) }}d
                            </div>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-gray" style="font-size:0.68rem;">
                            {{ $c['medical_class'] }}
                        </span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.75rem;
                              color:{{ $medDays <= 30 ? 'var(--red)' : 'var(--green)' }};
                              font-weight:{{ $medDays <= 30 ? '700' : '400' }};">
                            {{ \Carbon\Carbon::parse($c['medical_expiry'])->format('d M Y') }}
                        </span>
                        @if($medDays <= 30 && $medDays > 0)
                            <div style="font-size:0.65rem; color:var(--red);">
                                ⚠ {{ round($medDays) }}d
                            </div>
                        @endif
                    </td>
                    <td>
                        @if($c['hours_28day'] > 0)
                        <div style="font-size:0.78rem; font-weight:700;
                                    color:{{ $hrsColor }};">
                            {{ $c['hours_28day'] }}/100
                        </div>
                        <div class="progress-bar-wrap" style="width:80px;">
                            <div class="progress-bar-fill
                                {{ $c['hours_28day'] >= 90 ? 'red' : ($c['hours_28day'] >= 75 ? 'amber' : '') }}"
                                 style="width:{{ min(100,($c['hours_28day']/100)*100) }}%;">
                            </div>
                        </div>
                        @else
                            <span style="color:var(--gray-text); font-size:0.78rem;">—</span>
                        @endif
                    </td>
                    <td>
                        @if($c['hours_year'] > 0)
                        <span class="mono" style="font-size:0.78rem;
                              font-weight:600; color:{{ $yrColor }};">
                            {{ $c['hours_year'] }}/900
                        </span>
                        @else
                            <span style="color:var(--gray-text); font-size:0.78rem;">—</span>
                        @endif
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem; font-weight:600;
                              color:var(--sky);">{{ $c['base'] }}</span>
                    </td>
                    <td>
                        @php
                            $statusMap = [
                                'Active'    => 'badge-green',
                                'On Duty'   => 'badge-blue',
                                'Standby'   => 'badge-amber',
                                'Off Duty'  => 'badge-gray',
                                'On Leave'  => 'badge-purple',
                                'Suspended' => 'badge-red',
                            ];
                        @endphp
                        <span class="badge {{ $statusMap[$c['status']] ?? 'badge-gray' }}">
                            {{ $c['status'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="padding:0.75rem 1rem; background:#FAFBFD;
                    border-top:1px solid var(--gray-border);
                    font-size:0.72rem; color:var(--gray-text);">
            ATPL — Airline Transport Pilot Licence ·
            CPL — Commercial Pilot Licence ·
            FOO — Flight Operations Officer ·
            CMC — Cabin Crew Member Certificate ·
            Max 100 hrs/28 days · 900 hrs/year per ICAO Annex 6 §4.3
        </div>
    </div>

</x-flight-ops-layout>