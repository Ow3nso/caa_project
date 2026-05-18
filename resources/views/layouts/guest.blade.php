<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CAA Portal') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&family=Syne:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --deep:  #0D1B2A;
            --dark:  #1D3557;
            --mid:   #5D8AA8;
            --light: #B0C4DE;
            --pale:  #F8F9FA;
        }

        body {
            min-height: 100vh;
            background-color: var(--deep);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Syne', sans-serif;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(29,53,87,0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(29,53,87,0.2) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        body::after {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(93,138,168,0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        /* ── Card ── */
        .card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 400px;
            background: var(--dark);
            border: 1px solid rgba(119,141,169,0.2);
            border-radius: 16px;
            padding: 40px 36px 36px;
            box-shadow:
                0 0 0 1px rgba(13,27,42,0.6),
                0 32px 64px rgba(13,27,42,0.6),
                0 0 80px rgba(65,90,119,0.08);
            animation: fadeUp 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Header ── */
        .card-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .emblem {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 52px; height: 52px;
            background: var(--mid);
            border-radius: 14px;
            margin-bottom: 14px;
            position: relative;
        }

        .emblem::after {
            content: '';
            position: absolute; inset: -1px;
            border-radius: 14px;
            border: 1px solid rgba(224,225,221,0.15);
        }

        .emblem svg {
            width: 24px; height: 24px;
            fill: var(--pale);
        }

        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px; font-weight: 600;
            color: var(--pale); letter-spacing: 0.01em;
        }

        .card-sub {
            font-size: 11px; color: var(--light);
            margin-top: 4px; letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        /* ── Form ── */
        .form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .field {
            display: flex;
            flex-direction:
            column; gap: 6px;
        }

        .field label {
            font-size: 11px; font-weight: 600;
            color: var(--light); letter-spacing: 0.09em;
            text-transform: uppercase;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .ico {
            position: absolute;
            left: 12px; top: 50%;
            transform: translateY(-50%);
            width: 15px; height: 15px;
            stroke: var(--mid); fill: none;
            stroke-width: 1.8;
            stroke-linecap: round; stroke-linejoin: round;
            pointer-events: none;
        }

        .field input {
            width: 100%;
            background: var(--deep);
            border: 1px solid rgba(65,90,119,0.4);
            border-radius: 9px;
            padding: 11px 13px 11px 38px;
            font-family: 'Syne', sans-serif;
            font-size: 13px; color: var(--pale);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .field input::placeholder {
            color: rgba(119,141,169,0.45);
        }

        .field input:focus {
            border-color: var(--mid);
            box-shadow: 0 0 0 3px rgba(65,90,119,0.15);
        }

        .toggle-pw {
            position: absolute; right: 11px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            cursor: pointer; padding: 2px;
            display: flex; align-items: center;
        }

        .toggle-pw svg {
            width: 15px; height: 15px;
            stroke: var(--mid); fill: none;
            stroke-width: 1.8;
            stroke-linecap: round; stroke-linejoin: round;
            transition: stroke 0.2s;
        }

        .toggle-pw:hover svg {
            stroke: var(--light);
        }

        .forgot-row {
            display: flex;
            justify-content: flex-end;
            margin-top: -4px;
        }

        .forgot-row a {
            font-size: 12px; color: var(--light);
            text-decoration: none; transition: color 0.2s;
        }

        .forgot-row a:hover {
            color: var(--pale);
        }

        .btn {
            width: 100%; background: var(--mid);
            color: var(--pale); border: none;
            border-radius: 9px; padding: 12px;
            font-family: 'Syne', sans-serif;
            font-size: 13px; font-weight: 600;
            letter-spacing: 0.06em; cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            margin-top: 4px;
        }

        .btn:hover  {
            background: #4a7a9b;
        }

        .btn:active {
            transform: scale(0.98);
        }

        /* ── Alerts ── */
        .alert-error {
            background: rgba(248,113,113,0.08);
            border: 1px solid rgba(248,113,113,0.25);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px; color: #f87171;
            margin-bottom: 12px;
        }

        .error-msg {
            font-size: 11px;
            color: #f87171;
            margin-top: 3px;
        }

        /* ── Footer ── */
        .card-footer {
            margin-top: 22px; padding-top: 16px;
            border-top: 1px solid rgba(65,90,119,0.2);
            text-align: center; font-size: 11px;
            color: rgba(119,141,169,0.55);
            line-height: 1.6; letter-spacing: 0.03em;
        }
    </style>
</head>
<body>
    {{ $slot }}
</body>
</html>
