<x-flight-ops-layout title="Aircraft Registry">

    <div class="page-header">
        <div class="page-title">🛩 Aircraft Registry</div>
        <div class="page-subtitle">
            Fleet airworthiness register · ICAO Annex 8 ·
            Certificate of Airworthiness tracked per KCAA Airworthiness Division
        </div>
    </div>

    {{-- Summary --}}
    <div class="stat-grid stat-grid-4">
        <div class="stat-card">
            <div class="stat-value">{{ $summary['total'] }}</div>
            <div class="stat-label">Total Fleet</div>
            <div class="stat-sub">Registered aircraft</div>
        </div>
        <div class="stat-card green">
            <div class="stat-value">{{ $summary['airworthy'] }}</div>
            <div class="stat-label">Airworthy</div>
            <div class="stat-sub">COA valid · Cleared for ops</div>
        </div>
        <div class="stat-card red">
            <div class="stat-value">{{ $summary['grounded'] }}</div>
            <div class="stat-label">Grounded</div>
            <div class="stat-sub">COA expired or suspended</div>
        </div>
        <div class="stat-card amber">
            <div class="stat-value">{{ $summary['expiring'] }}</div>
            <div class="stat-label">COA Expiring</div>
            <div class="stat-sub">Within 30 days · Action required</div>
        </div>
    </div>

    {{-- Aircraft Table --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">Fleet Register — Certificate of Airworthiness Status</div>
            <div class="card-meta">ICAO Annex 8 · {{ $summary['total'] }} aircraft registered</div>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Registration</th>
                    <th>Type</th>
                    <th>MSN</th>
                    <th>Year</th>
                    <th>Operator</th>
                    <th>Seats</th>
                    <th>Total Hours</th>
                    <th>Hours (Month)</th>
                    <th>COA Expiry</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aircraft as $a)
                @php
                    $daysLeft = (strtotime($a['coa_expiry']) - time()) / 86400;
                    $coaColor = $daysLeft < 0 ? 'var(--red)' :
                               ($daysLeft <= 30 ? 'var(--amber)' : 'var(--green)');
                    $coaWeight = $daysLeft <= 30 ? '700' : '400';
                @endphp
                <tr>
                    <td>
                        <span class="mono" style="font-weight:700; color:var(--navy);
                              font-size:0.88rem; background:#EEF2FF; color:#3730A3;
                              padding:0.2rem 0.5rem; border-radius:4px;">
                            {{ $a['reg'] }}
                        </span>
                    </td>
                    <td style="font-size:0.82rem; font-weight:500; color:var(--navy);">
                        {{ $a['type'] }}
                        <div style="font-size:0.7rem; color:var(--gray-text);">
                            {{ $a['engines'] }} engine{{ $a['engines'] > 1 ? 's' : '' }}
                        </div>
                    </td>
                    <td class="mono" style="font-size:0.75rem; color:var(--gray-text);">
                        {{ $a['msn'] }}
                    </td>
                    <td style="font-size:0.82rem;">{{ $a['year'] }}</td>
                    <td style="font-size:0.78rem; color:var(--navy);">
                        {{ $a['operator'] }}
                    </td>
                    <td style="text-align:center; font-weight:600;">
                        {{ $a['seats'] > 0 ? $a['seats'] : 'Cargo' }}
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem; font-weight:600;">
                            {{ number_format($a['hours_total']) }}
                        </span>
                        <span style="font-size:0.7rem; color:var(--gray-text);"> hrs</span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              color:{{ $a['hours_month'] > 0 ? 'var(--sky)' : 'var(--gray-text)' }};
                              font-weight:600;">
                            {{ $a['hours_month'] > 0 ? $a['hours_month'].' hrs' : '—' }}
                        </span>
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem;
                              color:{{ $coaColor }}; font-weight:{{ $coaWeight }};">
                            {{ \Carbon\Carbon::parse($a['coa_expiry'])->format('d M Y') }}
                        </span>
                        @if($daysLeft > 0 && $daysLeft <= 30)
                            <div style="font-size:0.68rem; color:var(--amber); font-weight:700;">
                                ⚠ {{ round($daysLeft) }} days left
                            </div>
                        @elseif($daysLeft < 0)
                            <div style="font-size:0.68rem; color:var(--red); font-weight:700;">
                                ✕ EXPIRED
                            </div>
                        @endif
                    </td>
                    <td>
                        <span class="mono" style="font-size:0.78rem; font-weight:600;
                              color:var(--sky);">{{ $a['location'] }}</span>
                    </td>
                    <td>
                        @php
                            $statusMap = [
                                'Airworthy'   => 'badge-green',
                                'Grounded'    => 'badge-red',
                                'Maintenance' => 'badge-amber',
                            ];
                        @endphp
                        <span class="badge {{ $statusMap[$a['status']] ?? 'badge-gray' }}">
                            {{ $a['status'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="padding:0.75rem 1rem; background:#FAFBFD;
                    border-top:1px solid var(--gray-border);
                    font-size:0.72rem; color:var(--gray-text);">
            COA — Certificate of Airworthiness · ICAO Annex 8 ·
            Maintained per KCAA Airworthiness Division ·
            5Y prefix — Kenya ICAO country code
        </div>
    </div>

</x-flight-ops-layout>