<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Flight Operations' }} | KCAA Flight Ops</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy:       #003366;
            --navy-dark:  #002244;
            --navy-light: #004488;
            --sky:        #0099CC;
            --sky-light:  #33BBEE;
            --red:        #CC0000;
            --amber:      #FF8C00;
            --green:      #007A33;
            --green-lt:   #00A845;
            --gray-bg:    #F4F6F9;
            --gray-border:#DDE3EC;
            --gray-text:  #6B7A99;
            --white:      #FFFFFF;
            --sidebar-w:  260px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-bg);
            color: #1A2B4A;
            min-height: 100vh;
            display: flex;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: var(--navy-dark);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-brand-top {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.4rem;
        }

        .brand-emblem {
            width: 36px; height: 36px;
            background: var(--sky);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 0.88rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            letter-spacing: 0.02em;
        }

        .brand-sub {
            font-size: 0.68rem;
            color: rgba(255,255,255,0.45);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-top: 0.2rem;
        }

        .sidebar-section-label {
            padding: 1.25rem 1.5rem 0.4rem;
            font-size: 0.65rem;
            font-weight: 600;
            color: rgba(255,255,255,0.3);
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .sidebar-nav { flex: 1; padding-bottom: 1rem; }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.72rem 1.5rem;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.15s ease;
            border-left: 3px solid transparent;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.06);
            color: #fff;
            border-left-color: rgba(0,153,204,0.5);
        }

        .nav-item.active {
            background: rgba(0,153,204,0.15);
            color: #fff;
            border-left-color: var(--sky);
        }

        .nav-item.active .nav-icon { color: var(--sky); }

        .nav-icon {
            font-size: 1rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--red);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 0.15rem 0.45rem;
            border-radius: 20px;
            min-width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .icao-badge {
            background: rgba(0,153,204,0.12);
            border: 1px solid rgba(0,153,204,0.25);
            border-radius: 8px;
            padding: 0.65rem 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .icao-badge-icon { font-size: 1rem; }

        .icao-badge-text {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.5);
            line-height: 1.4;
        }

        .icao-badge-text strong {
            color: var(--sky-light);
            display: block;
            font-size: 0.72rem;
            margin-bottom: 0.1rem;
        }

        /* ── MAIN CONTENT ── */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--gray-border);
            padding: 0 2rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .topbar-breadcrumb {
            font-size: 0.8rem;
            color: var(--gray-text);
        }

        .topbar-breadcrumb span {
            color: var(--navy);
            font-weight: 600;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .topbar-time {
            font-size: 0.8rem;
            color: var(--gray-text);
            font-family: 'JetBrains Mono', monospace;
        }

        .topbar-time strong {
            color: var(--navy);
            font-size: 0.82rem;
        }

        .status-pill {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            background: #EAFAF0;
            border: 1px solid #B0E8C5;
            border-radius: 20px;
            padding: 0.3rem 0.85rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--green);
        }

        .status-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--green-lt);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.82rem;
            color: var(--navy);
            font-weight: 500;
        }

        .user-avatar {
            width: 32px; height: 32px;
            background: var(--navy);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* ── PAGE CONTENT ── */
        .page-content {
            padding: 1.75rem 2rem;
            flex: 1;
        }

        .page-header {
            margin-bottom: 1.75rem;
        }

        .page-title {
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 0.25rem;
            letter-spacing: -0.01em;
        }

        .page-subtitle {
            font-size: 0.85rem;
            color: var(--gray-text);
        }

        /* ── STAT CARDS ── */
        .stat-grid {
            display: grid;
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .stat-grid-4 { grid-template-columns: repeat(4, 1fr); }
        .stat-grid-6 { grid-template-columns: repeat(6, 1fr); }
        .stat-grid-3 { grid-template-columns: repeat(3, 1fr); }

        .stat-card {
            background: var(--white);
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            border: 1px solid var(--gray-border);
            border-top: 3px solid var(--navy);
        }

        .stat-card.sky   { border-top-color: var(--sky); }
        .stat-card.green { border-top-color: var(--green-lt); }
        .stat-card.red   { border-top-color: var(--red); }
        .stat-card.amber { border-top-color: var(--amber); }
        .stat-card.gray  { border-top-color: var(--gray-text); }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--navy);
            line-height: 1;
            margin-bottom: 0.35rem;
        }

        .stat-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .stat-sub {
            font-size: 0.72rem;
            color: #B0B8C9;
            margin-top: 0.15rem;
        }

        /* ── CARDS ── */
        .card {
            background: var(--white);
            border-radius: 12px;
            border: 1px solid var(--gray-border);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--gray-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #FAFBFD;
        }

        .card-title {
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--navy);
            letter-spacing: 0.01em;
        }

        .card-meta {
            font-size: 0.78rem;
            color: var(--gray-text);
        }

        /* ── TABLE ── */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.82rem;
        }

        .data-table thead tr {
            background: var(--navy);
            color: #fff;
        }

        .data-table thead th {
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.72rem;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .data-table tbody tr {
            border-bottom: 1px solid var(--gray-border);
            transition: background 0.1s;
        }

        .data-table tbody tr:hover { background: #F7F9FC; }
        .data-table tbody tr:last-child { border-bottom: none; }

        .data-table td {
            padding: 0.8rem 1rem;
            color: #1A2B4A;
            vertical-align: middle;
        }

        .data-table .mono {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.78rem;
            font-weight: 500;
        }

        /* ── BADGES ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.25rem 0.7rem;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-green   { background: #E6F7EE; color: #007A33; }
        .badge-red     { background: #FDEAEA; color: #CC0000; }
        .badge-amber   { background: #FFF4E5; color: #CC6600; }
        .badge-blue    { background: #E5F4FB; color: #006699; }
        .badge-gray    { background: #F0F2F5; color: #6B7A99; }
        .badge-navy    { background: #E5EBF5; color: #003366; }
        .badge-purple  { background: #F0E8FF; color: #5B21B6; }

        /* ── ALERTS ── */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            padding: 0.85rem 1.1rem;
            border-radius: 8px;
            margin-bottom: 0.65rem;
            font-size: 0.82rem;
        }

        .alert-danger  { background: #FEF2F2; border-left: 3px solid var(--red);   color: #7F1D1D; }
        .alert-warning { background: #FFFBEB; border-left: 3px solid var(--amber); color: #78350F; }
        .alert-info    { background: #EFF6FF; border-left: 3px solid var(--sky);   color: #1E3A5F; }

        .alert-icon { font-size: 1rem; flex-shrink: 0; margin-top: 0.05rem; }
        .alert-ref  { font-family: 'JetBrains Mono', monospace; font-size: 0.72rem; margin-top: 0.2rem; opacity: 0.6; }

        /* ── GRID LAYOUTS ── */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .grid-3-1 { display: grid; grid-template-columns: 3fr 1fr; gap: 1.5rem; }
        .grid-2-1 { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }

        /* ── DETAIL ROW ── */
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 0;
            border-bottom: 1px solid var(--gray-border);
            font-size: 0.82rem;
        }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { color: var(--gray-text); font-weight: 500; }
        .detail-value { color: var(--navy); font-weight: 600; }

        /* ── PROGRESS BAR ── */
        .progress-bar-wrap {
            background: #E8ECF4;
            border-radius: 4px;
            height: 6px;
            overflow: hidden;
            margin-top: 0.5rem;
        }
        .progress-bar-fill {
            height: 100%;
            border-radius: 4px;
            background: var(--sky);
        }
        .progress-bar-fill.red   { background: var(--red); }
        .progress-bar-fill.amber { background: var(--amber); }
        .progress-bar-fill.green { background: var(--green-lt); }

        /* ── FLIGHT STATUS TIMELINE ── */
        .status-timeline {
            display: flex;
            align-items: center;
            gap: 0;
            padding: 1rem 1.5rem;
        }

        .tl-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            position: relative;
        }

        .tl-dot {
            width: 28px; height: 28px;
            border-radius: 50%;
            background: var(--gray-border);
            border: 2px solid var(--gray-border);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.7rem;
            color: #aaa;
            z-index: 1;
            position: relative;
        }

        .tl-dot.done  { background: var(--green-lt); border-color: var(--green-lt); color: #fff; }
        .tl-dot.active{ background: var(--sky);      border-color: var(--sky);      color: #fff; }
        .tl-dot.alert { background: var(--red);      border-color: var(--red);      color: #fff; }

        .tl-label {
            font-size: 0.65rem;
            color: var(--gray-text);
            margin-top: 0.4rem;
            text-align: center;
            font-weight: 500;
        }

        .tl-line {
            flex: 1;
            height: 2px;
            background: var(--gray-border);
            margin-top: -14px;
        }
        .tl-line.done { background: var(--green-lt); }

        /* ── FOOTER ── */
        .page-footer {
            background: var(--white);
            border-top: 1px solid var(--gray-border);
            padding: 0.75rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.72rem;
            color: var(--gray-text);
        }

        .footer-ref {
            font-family: 'JetBrains Mono', monospace;
            color: #B0B8C9;
        }
    </style>
</head>
<body>

{{-- ── SIDEBAR ── --}}
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="sidebar-brand-top">
            <div class="brand-emblem">✈</div>
            <div>
                <div class="brand-name">KCAA</div>
                <div class="brand-sub">Kenya Civil Aviation Authority</div>
            </div>
        </div>
    </div>

    <div class="sidebar-section-label">Flight Operations</div>

    <nav class="sidebar-nav">
        <a href="{{ route('flight-ops.dashboard') }}"
           class="nav-item {{ request()->routeIs('flight-ops.dashboard') ? 'active' : '' }}">
            <span class="nav-icon">▣</span>
            Operations Dashboard
        </a>
        <a href="{{ route('flight-ops.flights') }}"
           class="nav-item {{ request()->routeIs('flight-ops.flights') ? 'active' : '' }}">
            <span class="nav-icon">✈</span>
            Flights Register
        </a>
        <a href="{{ route('flight-ops.flight-plans') }}"
           class="nav-item {{ request()->routeIs('flight-ops.flight-plans') ? 'active' : '' }}">
            <span class="nav-icon">📋</span>
            Flight Plans
        </a>
        <a href="{{ route('flight-ops.aircraft') }}"
           class="nav-item {{ request()->routeIs('flight-ops.aircraft') ? 'active' : '' }}">
            <span class="nav-icon">🛩</span>
            Aircraft Registry
        </a>
        <a href="{{ route('flight-ops.crew') }}"
           class="nav-item {{ request()->routeIs('flight-ops.crew') ? 'active' : '' }}">
            <span class="nav-icon">👤</span>
            Crew Members
        </a>
        <a href="{{ route('flight-ops.incidents') }}"
           class="nav-item {{ request()->routeIs('flight-ops.incidents') ? 'active' : '' }}">
            <span class="nav-icon">⚠</span>
            Incident Reports
            <span class="nav-badge">3</span>
        </a>

        <div class="sidebar-section-label" style="margin-top:1rem;">System</div>
        <a href="{{ route('dashboard') }}" class="nav-item">
            <span class="nav-icon">←</span>
            Back to Main App
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="icao-badge">
            <div class="icao-badge-icon">🌐</div>
            <div class="icao-badge-text">
                <strong>ICAO Annex 6 Compliant</strong>
                Civil Aviation Act 2013 · KCAA Reg 2025
            </div>
        </div>
    </div>
</aside>

{{-- ── TOPBAR ── --}}
<div class="main">
    <header class="topbar">
        <div class="topbar-left">
            <div class="topbar-breadcrumb">
                Flight Operations &rsaquo; <span>{{ $title ?? 'Dashboard' }}</span>
            </div>
        </div>
        <div class="topbar-right">
            <div class="topbar-time">
                UTC <strong id="utc-clock">--:--:--</strong>
            </div>
            <div class="status-pill">
                <div class="status-dot"></div>
                OPS NORMAL
            </div>
            <div class="topbar-user">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                {{ Auth::user()->name }}
            </div>
        </div>
    </header>

    {{-- ── PAGE SLOT ── --}}
    <div class="page-content">
        {{ $slot }}
    </div>

    <footer class="page-footer">
        <div>Kenya Civil Aviation Authority &mdash; Flight Operations Management System</div>
        <div class="footer-ref">ICAO Annex 6 &bull; CAR 2025 &bull; AOC-KE-001</div>
    </footer>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const h = String(now.getUTCHours()).padStart(2,'0');
        const m = String(now.getUTCMinutes()).padStart(2,'0');
        const s = String(now.getUTCSeconds()).padStart(2,'0');
        const el = document.getElementById('utc-clock');
        if(el) el.textContent = h+':'+m+':'+s;
    }
    updateClock();
    setInterval(updateClock, 1000);
</script>

</body>
</html>