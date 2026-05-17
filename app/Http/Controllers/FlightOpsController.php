<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightOpsController extends Controller
{
    // ─── DASHBOARD ───────────────────────────────────────────────
    public function dashboard()
    {
        $stats = [
            'total_flights'     => 24,
            'flights_today'     => 8,
            'aircraft_active'   => 12,
            'aircraft_grounded' => 2,
            'crew_on_duty'      => 31,
            'open_incidents'    => 3,
        ];

        $todays_flights = [
            ['flight'=>'KQ101', 'route'=>'HKJK → HKMO', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Mombasa (HKMO)', 'std'=>'06:00', 'sta'=>'07:05', 'aircraft'=>'5Y-KQA', 'status'=>'Landed',    'status_color'=>'green'],
            ['flight'=>'KQ203', 'route'=>'HKJK → HKKI', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Kisumu (HKKI)',  'std'=>'08:30', 'sta'=>'09:20', 'aircraft'=>'5Y-KQB', 'status'=>'Landed',    'status_color'=>'green'],
            ['flight'=>'KQ305', 'route'=>'HKJK → HKEL', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Eldoret (HKEL)','std'=>'10:00', 'sta'=>'10:55', 'aircraft'=>'5Y-KQC', 'status'=>'Departed',   'status_color'=>'blue'],
            ['flight'=>'KQ407', 'route'=>'HKMO → HKJK', 'origin'=>'Mombasa (HKMO)', 'destination'=>'Nairobi (HKJK)','std'=>'11:30', 'sta'=>'12:35', 'aircraft'=>'5Y-KQD', 'status'=>'Boarding',   'status_color'=>'amber'],
            ['flight'=>'KQ501', 'route'=>'HKJK → HTDA', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Dar es Salaam (HTDA)', 'std'=>'13:00', 'sta'=>'14:10', 'aircraft'=>'5Y-KQE', 'status'=>'Scheduled', 'status_color'=>'gray'],
            ['flight'=>'KQ603', 'route'=>'HKJK → HAAB', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Addis Ababa (HAAB)', 'std'=>'14:30', 'sta'=>'16:45', 'aircraft'=>'5Y-KQF', 'status'=>'Scheduled', 'status_color'=>'gray'],
            ['flight'=>'KQ702', 'route'=>'HKJK → FMMI', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Antananarivo (FMMI)', 'std'=>'15:45', 'sta'=>'19:30','aircraft'=>'5Y-KQG', 'status'=>'Delayed',    'status_color'=>'red'],
            ['flight'=>'KQ801', 'route'=>'HKJK → FAOR', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Johannesburg (FAOR)','std'=>'18:00','sta'=>'21:15','aircraft'=>'5Y-KQH', 'status'=>'Scheduled', 'status_color'=>'gray'],
        ];

        $alerts = [
            ['type'=>'warning', 'icon'=>'⚠',  'message'=>'Aircraft 5Y-KQB — Certificate of Airworthiness expires in 12 days', 'ref'=>'COA-2024-112'],
            ['type'=>'danger',  'icon'=>'✕',  'message'=>'Flight KQ702 delayed — weather hold at HKJK. ATC coordination required', 'ref'=>'FLT-KQ702'],
            ['type'=>'warning', 'icon'=>'⚠',  'message'=>'Capt. James Omondi — Medical Certificate Class 1 expires in 18 days', 'ref'=>'MED-JO-2024'],
            ['type'=>'danger',  'icon'=>'✕',  'message'=>'Incident Report IR-2024-031 — Open. Assigned to Safety Inspector', 'ref'=>'IR-2024-031'],
            ['type'=>'info',    'icon'=>'ℹ',  'message'=>'AOC renewal due in 45 days — Kenya Airways AOC-KE-001', 'ref'=>'AOC-KE-001'],
        ];

        return view('flight-ops.dashboard', compact('stats', 'todays_flights', 'alerts'));
    }

    // ─── FLIGHTS REGISTER ────────────────────────────────────────
    public function flights()
    {
        $flights = [
            ['id'=>'KQ101', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Mombasa (HKMO)',         'type'=>'Commercial', 'std'=>'2025-05-16 06:00', 'sta'=>'2025-05-16 07:05', 'aircraft'=>'5Y-KQA', 'captain'=>'Capt. David Kamau',   'status'=>'Landed',    'pob'=>87,  'plan_status'=>'Closed'],
            ['id'=>'KQ203', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Kisumu (HKKI)',           'type'=>'Commercial', 'std'=>'2025-05-16 08:30', 'sta'=>'2025-05-16 09:20', 'aircraft'=>'5Y-KQB', 'captain'=>'Capt. Sarah Wanjiku', 'status'=>'Landed',    'pob'=>54,  'plan_status'=>'Closed'],
            ['id'=>'KQ305', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Eldoret (HKEL)',          'type'=>'Commercial', 'std'=>'2025-05-16 10:00', 'sta'=>'2025-05-16 10:55', 'aircraft'=>'5Y-KQC', 'captain'=>'Capt. Peter Otieno',  'status'=>'Departed',  'pob'=>62,  'plan_status'=>'Approved'],
            ['id'=>'KQ407', 'origin'=>'Mombasa (HKMO)', 'destination'=>'Nairobi (HKJK)',          'type'=>'Commercial', 'std'=>'2025-05-16 11:30', 'sta'=>'2025-05-16 12:35', 'aircraft'=>'5Y-KQD', 'captain'=>'Capt. Grace Achieng', 'status'=>'Boarding',  'pob'=>91,  'plan_status'=>'Approved'],
            ['id'=>'KQ501', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Dar es Salaam (HTDA)',    'type'=>'Commercial', 'std'=>'2025-05-16 13:00', 'sta'=>'2025-05-16 14:10', 'aircraft'=>'5Y-KQE', 'captain'=>'Capt. James Omondi',  'status'=>'Scheduled', 'pob'=>73,  'plan_status'=>'Filed'],
            ['id'=>'KQ603', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Addis Ababa (HAAB)',      'type'=>'Commercial', 'std'=>'2025-05-16 14:30', 'sta'=>'2025-05-16 16:45', 'aircraft'=>'5Y-KQF', 'captain'=>'Capt. Anne Mutua',    'status'=>'Scheduled', 'pob'=>108, 'plan_status'=>'Filed'],
            ['id'=>'KQ702', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Antananarivo (FMMI)',     'type'=>'Commercial', 'std'=>'2025-05-16 15:45', 'sta'=>'2025-05-16 19:30', 'aircraft'=>'5Y-KQG', 'captain'=>'Capt. John Maina',    'status'=>'Delayed',   'pob'=>0,   'plan_status'=>'Draft'],
            ['id'=>'KQ801', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Johannesburg (FAOR)',     'type'=>'Commercial', 'std'=>'2025-05-16 18:00', 'sta'=>'2025-05-16 21:15', 'aircraft'=>'5Y-KQH', 'captain'=>'Capt. Lucy Ndungu',   'status'=>'Scheduled', 'pob'=>134, 'plan_status'=>'Draft'],
            ['id'=>'KQ102', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Malindi (HKML)',          'type'=>'Commercial', 'std'=>'2025-05-15 07:00', 'sta'=>'2025-05-15 07:50', 'aircraft'=>'5Y-KQA', 'captain'=>'Capt. David Kamau',   'status'=>'Landed',    'pob'=>38,  'plan_status'=>'Closed'],
            ['id'=>'KQ910', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Nairobi (HKJK)',          'type'=>'Training',   'std'=>'2025-05-15 09:00', 'sta'=>'2025-05-15 11:00', 'aircraft'=>'5Y-KQJ', 'captain'=>'Capt. Robert Njeru',  'status'=>'Landed',    'pob'=>2,   'plan_status'=>'Closed'],
            ['id'=>'KQ550', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Entebbe (HUEN)',          'type'=>'Cargo',      'std'=>'2025-05-15 22:00', 'sta'=>'2025-05-15 23:10', 'aircraft'=>'5Y-KQK', 'captain'=>'Capt. Mary Chebet',   'status'=>'Landed',    'pob'=>4,   'plan_status'=>'Closed'],
            ['id'=>'KQ620', 'origin'=>'Nairobi (HKJK)', 'destination'=>'Kigali (HRYR)',           'type'=>'Commercial', 'std'=>'2025-05-15 16:00', 'sta'=>'2025-05-15 17:05', 'aircraft'=>'5Y-KQL', 'captain'=>'Capt. Simon Kariuki',  'status'=>'Cancelled', 'pob'=>0,   'plan_status'=>'Closed'],
        ];

        $summary = [
            'scheduled' => collect($flights)->where('status','Scheduled')->count(),
            'departed'  => collect($flights)->where('status','Departed')->count(),
            'landed'    => collect($flights)->where('status','Landed')->count(),
            'delayed'   => collect($flights)->where('status','Delayed')->count(),
            'cancelled' => collect($flights)->where('status','Cancelled')->count(),
            'boarding'  => collect($flights)->where('status','Boarding')->count(),
        ];

        return view('flight-ops.flights', compact('flights', 'summary'));
    }

    // ─── FLIGHT PLANS ────────────────────────────────────────────
    public function flightPlans()
    {
        $plans = [
            ['ref'=>'FP-2025-0841', 'flight'=>'KQ101', 'origin'=>'HKJK', 'destination'=>'HKMO', 'alternate'=>'HKML', 'route'=>'HKJK DCT TORVO DCT HKMO', 'altitude'=>'FL180', 'speed'=>'250KT', 'eet'=>'01:05', 'fuel_hrs'=>'03:30', 'pob'=>87,  'filed_by'=>'Disp. Kevin Mwangi', 'filed_at'=>'2025-05-16 04:15', 'status'=>'Closed'],
            ['ref'=>'FP-2025-0842', 'flight'=>'KQ203', 'origin'=>'HKJK', 'destination'=>'HKKI', 'alternate'=>'HKJK', 'route'=>'HKJK DCT EMABA DCT HKKI',  'altitude'=>'FL160', 'speed'=>'230KT', 'eet'=>'00:50', 'fuel_hrs'=>'03:00', 'pob'=>54,  'filed_by'=>'Disp. Kevin Mwangi', 'filed_at'=>'2025-05-16 06:30', 'status'=>'Closed'],
            ['ref'=>'FP-2025-0843', 'flight'=>'KQ305', 'origin'=>'HKJK', 'destination'=>'HKEL', 'alternate'=>'HKJK', 'route'=>'HKJK DCT NAKURU DCT HKEL',  'altitude'=>'FL170', 'speed'=>'240KT', 'eet'=>'00:55', 'fuel_hrs'=>'03:00', 'pob'=>62,  'filed_by'=>'Disp. Alice Njoki',  'filed_at'=>'2025-05-16 08:00', 'status'=>'Approved'],
            ['ref'=>'FP-2025-0844', 'flight'=>'KQ407', 'origin'=>'HKMO', 'destination'=>'HKJK', 'alternate'=>'HKML', 'route'=>'HKMO DCT MALEV DCT HKJK',  'altitude'=>'FL200', 'speed'=>'260KT', 'eet'=>'01:05', 'fuel_hrs'=>'03:30', 'pob'=>91,  'filed_by'=>'Disp. Alice Njoki',  'filed_at'=>'2025-05-16 09:30', 'status'=>'Approved'],
            ['ref'=>'FP-2025-0845', 'flight'=>'KQ501', 'origin'=>'HKJK', 'destination'=>'HTDA', 'alternate'=>'HTMB', 'route'=>'HKJK DCT AMBOS DCT HTDA',   'altitude'=>'FL310', 'speed'=>'420KT', 'eet'=>'01:10', 'fuel_hrs'=>'04:00', 'pob'=>73,  'filed_by'=>'Disp. Brian Ochieng','filed_at'=>'2025-05-16 10:45', 'status'=>'Filed'],
            ['ref'=>'FP-2025-0846', 'flight'=>'KQ603', 'origin'=>'HKJK', 'destination'=>'HAAB', 'alternate'=>'HDAM', 'route'=>'HKJK DCT KISAM DCT HAAB',   'altitude'=>'FL350', 'speed'=>'450KT', 'eet'=>'02:15', 'fuel_hrs'=>'05:30', 'pob'=>108, 'filed_by'=>'Disp. Brian Ochieng','filed_at'=>'2025-05-16 11:30', 'status'=>'Filed'],
            ['ref'=>'FP-2025-0847', 'flight'=>'KQ702', 'origin'=>'HKJK', 'destination'=>'FMMI', 'alternate'=>'FMCH', 'route'=>'HKJK DCT TORVO DCT FMMI',   'altitude'=>'FL370', 'speed'=>'460KT', 'eet'=>'03:45', 'fuel_hrs'=>'06:00', 'pob'=>0,   'filed_by'=>'Disp. Kevin Mwangi', 'filed_at'=>'2025-05-16 12:00', 'status'=>'Draft'],
            ['ref'=>'FP-2025-0848', 'flight'=>'KQ801', 'origin'=>'HKJK', 'destination'=>'FAOR', 'alternate'=>'FALA', 'route'=>'HKJK DCT AMBOS DOTLU FAOR',  'altitude'=>'FL380', 'speed'=>'470KT', 'eet'=>'03:15', 'fuel_hrs'=>'06:30', 'pob'=>134, 'filed_by'=>'Disp. Alice Njoki',  'filed_at'=>'2025-05-16 14:00', 'status'=>'Draft'],
        ];

        return view('flight-ops.flight-plans', compact('plans'));
    }

    // ─── AIRCRAFT REGISTRY ───────────────────────────────────────
    public function aircraft()
    {
        $aircraft = [
            ['reg'=>'5Y-KQA', 'type'=>'Bombardier Q400',  'msn'=>'4382', 'year'=>2015, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>78,  'hours_total'=>18420, 'hours_month'=>187, 'coa_expiry'=>'2026-03-15', 'status'=>'Airworthy',  'location'=>'HKJK'],
            ['reg'=>'5Y-KQB', 'type'=>'Bombardier Q400',  'msn'=>'4401', 'year'=>2016, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>78,  'hours_total'=>16240, 'hours_month'=>201, 'coa_expiry'=>'2025-05-28', 'status'=>'Airworthy',  'location'=>'HKMO'],
            ['reg'=>'5Y-KQC', 'type'=>'Embraer E190',     'msn'=>'19000721', 'year'=>2017, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>96, 'hours_total'=>14380, 'hours_month'=>195, 'coa_expiry'=>'2026-01-10', 'status'=>'Airworthy',  'location'=>'HKEL'],
            ['reg'=>'5Y-KQD', 'type'=>'Embraer E190',     'msn'=>'19000788', 'year'=>2018, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>96, 'hours_total'=>11920, 'hours_month'=>178, 'coa_expiry'=>'2026-06-22', 'status'=>'Airworthy',  'location'=>'HKMO'],
            ['reg'=>'5Y-KQE', 'type'=>'Boeing 737-800',   'msn'=>'40912',    'year'=>2014, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>162,'hours_total'=>24610, 'hours_month'=>312, 'coa_expiry'=>'2025-11-30', 'status'=>'Airworthy',  'location'=>'HKJK'],
            ['reg'=>'5Y-KQF', 'type'=>'Boeing 737-800',   'msn'=>'41033',    'year'=>2015, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>162,'hours_total'=>22180, 'hours_month'=>298, 'coa_expiry'=>'2026-02-14', 'status'=>'Airworthy',  'location'=>'HKJK'],
            ['reg'=>'5Y-KQG', 'type'=>'Boeing 737-800',   'msn'=>'41204',    'year'=>2016, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>162,'hours_total'=>19870, 'hours_month'=>276, 'coa_expiry'=>'2026-04-08', 'status'=>'Airworthy',  'location'=>'HKJK'],
            ['reg'=>'5Y-KQH', 'type'=>'Boeing 787-8',     'msn'=>'38084',    'year'=>2014, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>234,'hours_total'=>31240, 'hours_month'=>421, 'coa_expiry'=>'2025-12-01', 'status'=>'Airworthy',  'location'=>'HKJK'],
            ['reg'=>'5Y-KQJ', 'type'=>'Cessna 172',       'msn'=>'17281234', 'year'=>2012, 'operator'=>'EASA Training', 'engines'=>1, 'seats'=>4,  'hours_total'=>4210,  'hours_month'=>42,  'coa_expiry'=>'2025-09-15', 'status'=>'Airworthy',  'location'=>'HKJK'],
            ['reg'=>'5Y-KQK', 'type'=>'Boeing 737-300F',  'msn'=>'27092',    'year'=>2008, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>0,  'hours_total'=>44120, 'hours_month'=>388, 'coa_expiry'=>'2025-07-30', 'status'=>'Airworthy',  'location'=>'HKJK'],
            ['reg'=>'5Y-KQL', 'type'=>'Bombardier Q400',  'msn'=>'4445', 'year'=>2019, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>78,  'hours_total'=>8640,  'hours_month'=>0,   'coa_expiry'=>'2025-04-10', 'status'=>'Grounded',   'location'=>'HKJK'],
            ['reg'=>'5Y-KQM', 'type'=>'Boeing 737-800',   'msn'=>'41890',    'year'=>2020, 'operator'=>'Kenya Airways', 'engines'=>2, 'seats'=>162,'hours_total'=>6320,  'hours_month'=>0,   'coa_expiry'=>'2026-08-20', 'status'=>'Maintenance','location'=>'HKJK'],
        ];

        $summary = [
            'total'       => count($aircraft),
            'airworthy'   => collect($aircraft)->where('status','Airworthy')->count(),
            'grounded'    => collect($aircraft)->where('status','Grounded')->count(),
            'maintenance' => collect($aircraft)->where('status','Maintenance')->count(),
            'expiring'    => collect($aircraft)->filter(function($a) {
                                $days = (strtotime($a['coa_expiry']) - time()) / 86400;
                                return $days > 0 && $days <= 30;
                            })->count(),
        ];

        return view('flight-ops.aircraft', compact('aircraft', 'summary'));
    }

    // ─── CREW MEMBERS ────────────────────────────────────────────
    public function crew()
    {
        $crew = [
            ['emp'=>'KQ-001', 'name'=>'Capt. David Kamau',    'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0041', 'license_expiry'=>'2026-08-14', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-11-20', 'hours_month'=>87,  'hours_28day'=>87,  'hours_year'=>842, 'base'=>'HKJK', 'status'=>'Active',   'current_flight'=>'KQ102'],
            ['emp'=>'KQ-002', 'name'=>'Capt. Sarah Wanjiku',   'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0067', 'license_expiry'=>'2026-03-22', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-12-10', 'hours_month'=>91,  'hours_28day'=>91,  'hours_year'=>876, 'base'=>'HKJK', 'status'=>'Active',   'current_flight'=>'KQ203'],
            ['emp'=>'KQ-003', 'name'=>'Capt. Peter Otieno',    'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0089', 'license_expiry'=>'2025-09-30', 'medical_class'=>'Class 1', 'medical_expiry'=>'2026-01-15', 'hours_month'=>78,  'hours_28day'=>78,  'hours_year'=>790, 'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>'KQ305'],
            ['emp'=>'KQ-004', 'name'=>'Capt. Grace Achieng',   'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0102', 'license_expiry'=>'2026-05-18', 'medical_class'=>'Class 1', 'medical_expiry'=>'2026-03-22', 'hours_month'=>83,  'hours_28day'=>83,  'hours_year'=>814, 'base'=>'HKMO', 'status'=>'On Duty',  'current_flight'=>'KQ407'],
            ['emp'=>'KQ-005', 'name'=>'Capt. James Omondi',    'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0118', 'license_expiry'=>'2025-12-01', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-06-03', 'hours_month'=>72,  'hours_28day'=>72,  'hours_year'=>701, 'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>'KQ501'],
            ['emp'=>'KQ-006', 'name'=>'Capt. Anne Mutua',      'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0134', 'license_expiry'=>'2026-07-09', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-10-28', 'hours_month'=>95,  'hours_28day'=>95,  'hours_year'=>921, 'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>'KQ603'],
            ['emp'=>'KQ-007', 'name'=>'Capt. John Maina',      'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0156', 'license_expiry'=>'2026-01-25', 'medical_class'=>'Class 1', 'medical_expiry'=>'2026-05-10', 'hours_month'=>66,  'hours_28day'=>66,  'hours_year'=>648, 'base'=>'HKJK', 'status'=>'Standby',  'current_flight'=>'KQ702'],
            ['emp'=>'KQ-008', 'name'=>'Capt. Lucy Ndungu',     'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0171', 'license_expiry'=>'2026-04-12', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-08-30', 'hours_month'=>88,  'hours_28day'=>88,  'hours_year'=>856, 'base'=>'HKJK', 'status'=>'Active',   'current_flight'=>''],
            ['emp'=>'KQ-009', 'name'=>'F/O Michael Njoroge',   'role'=>'First Officer',   'license'=>'CPL',   'license_no'=>'KE-CPL-0234',  'license_expiry'=>'2025-10-15', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-09-22', 'hours_month'=>92,  'hours_28day'=>92,  'hours_year'=>891, 'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>'KQ305'],
            ['emp'=>'KQ-010', 'name'=>'F/O Amina Hassan',      'role'=>'First Officer',   'license'=>'CPL',   'license_no'=>'KE-CPL-0267',  'license_expiry'=>'2026-02-28', 'medical_class'=>'Class 1', 'medical_expiry'=>'2026-02-28', 'hours_month'=>88,  'hours_28day'=>88,  'hours_year'=>854, 'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>'KQ407'],
            ['emp'=>'KQ-011', 'name'=>'F/O Brian Kipchoge',    'role'=>'First Officer',   'license'=>'CPL',   'license_no'=>'KE-CPL-0289',  'license_expiry'=>'2025-07-20', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-07-20', 'hours_month'=>76,  'hours_28day'=>76,  'hours_year'=>741, 'base'=>'HKMO', 'status'=>'Off Duty', 'current_flight'=>''],
            ['emp'=>'KQ-012', 'name'=>'Disp. Kevin Mwangi',    'role'=>'Flight Dispatcher','license'=>'FOO',  'license_no'=>'KE-FOO-0045',  'license_expiry'=>'2026-06-30', 'medical_class'=>'Class 2', 'medical_expiry'=>'2026-06-30', 'hours_month'=>0,   'hours_28day'=>0,   'hours_year'=>0,   'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>''],
            ['emp'=>'KQ-013', 'name'=>'Disp. Alice Njoki',     'role'=>'Flight Dispatcher','license'=>'FOO',  'license_no'=>'KE-FOO-0061',  'license_expiry'=>'2025-12-15', 'medical_class'=>'Class 2', 'medical_expiry'=>'2025-12-15', 'hours_month'=>0,   'hours_28day'=>0,   'hours_year'=>0,   'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>''],
            ['emp'=>'KQ-014', 'name'=>'CC. Rose Auma',         'role'=>'Cabin Crew',      'license'=>'CMC',   'license_no'=>'KE-CMC-0312',  'license_expiry'=>'2026-03-01', 'medical_class'=>'Class 2', 'medical_expiry'=>'2026-01-10', 'hours_month'=>94,  'hours_28day'=>94,  'hours_year'=>910, 'base'=>'HKJK', 'status'=>'On Duty',  'current_flight'=>'KQ603'],
            ['emp'=>'KQ-015', 'name'=>'Capt. Robert Njeru',    'role'=>'Captain',         'license'=>'ATPL',  'license_no'=>'KE-ATPL-0199', 'license_expiry'=>'2026-09-14', 'medical_class'=>'Class 1', 'medical_expiry'=>'2025-07-01', 'hours_month'=>44,  'hours_28day'=>44,  'hours_year'=>432, 'base'=>'HKJK', 'status'=>'On Leave', 'current_flight'=>''],
        ];

        $summary = [
            'total'      => count($crew),
            'on_duty'    => collect($crew)->whereIn('status',['On Duty','Active'])->count(),
            'standby'    => collect($crew)->where('status','Standby')->count(),
            'off_duty'   => collect($crew)->where('status','Off Duty')->count(),
            'on_leave'   => collect($crew)->where('status','On Leave')->count(),
            'med_alert'  => collect($crew)->filter(function($c) {
                                $days = (strtotime($c['medical_expiry']) - time()) / 86400;
                                return $days > 0 && $days <= 30;
                            })->count(),
        ];

        return view('flight-ops.crew', compact('crew', 'summary'));
    }

    // ─── INCIDENTS ───────────────────────────────────────────────
    public function incidents()
    {
        $incidents = [
            ['ref'=>'IR-2024-028', 'flight'=>'KQ305', 'type'=>'Technical',  'severity'=>'Low',      'date'=>'2025-05-14', 'location'=>'HKJK', 'aircraft'=>'5Y-KQC', 'reported_by'=>'Capt. Peter Otieno',  'description'=>'Minor hydraulic pressure fluctuation observed during cruise phase. Returned to normal within 2 minutes. Logged per ICAO Annex 6 requirements.',        'status'=>'Closed',              'inspector'=>'Insp. Daniel Waweru'],
            ['ref'=>'IR-2024-029', 'flight'=>'KQ203', 'type'=>'Weather',    'severity'=>'Medium',   'date'=>'2025-05-14', 'location'=>'HKKI', 'aircraft'=>'5Y-KQB', 'reported_by'=>'Capt. Sarah Wanjiku', 'description'=>'Severe turbulence encountered at FL160 approaching HKKI. Two cabin crew members sustained minor injuries. Diverted to holding pattern for 20 minutes.', 'status'=>'Under Investigation', 'inspector'=>'Insp. Jane Otieno'],
            ['ref'=>'IR-2024-030', 'flight'=>'KQ801', 'type'=>'Security',   'severity'=>'High',     'date'=>'2025-05-15', 'location'=>'HKJK', 'aircraft'=>'5Y-KQH', 'reported_by'=>'Security Officer T. Mwenda', 'description'=>'Unscreened baggage item discovered post-boarding. Flight delayed 45 minutes for full security re-screen per KCAA Aviation Security requirements.', 'status'=>'Under Investigation', 'inspector'=>'Insp. Paul Kimani'],
            ['ref'=>'IR-2024-031', 'flight'=>'KQ702', 'type'=>'Technical',  'severity'=>'High',     'date'=>'2025-05-16', 'location'=>'HKJK', 'aircraft'=>'5Y-KQG', 'reported_by'=>'Capt. John Maina',    'description'=>'Engine 2 start fault indication on pre-departure check. Aircraft returned to stand. Engineering dispatched. Flight currently on weather delay hold pending clearance.', 'status'=>'Open',                'inspector'=>'Insp. Daniel Waweru'],
            ['ref'=>'IR-2024-032', 'flight'=>'KQ910', 'type'=>'Near Miss',  'severity'=>'Critical', 'date'=>'2025-05-15', 'location'=>'HKJK', 'aircraft'=>'5Y-KQJ', 'reported_by'=>'Capt. Robert Njeru',  'description'=>'Training flight reported proximity conflict with unidentified UAS (drone) at 1,200ft AGL on final approach to runway 06. ATC notified. KCAA UAS enforcement alerted per mandatory occurrence reporting (MOR) obligations.', 'status'=>'Open', 'inspector'=>'Insp. Jane Otieno'],
            ['ref'=>'IR-2024-027', 'flight'=>'KQ550', 'type'=>'Medical',    'severity'=>'Medium',   'date'=>'2025-05-13', 'location'=>'In-flight HKJK-HUEN', 'aircraft'=>'5Y-KQK', 'reported_by'=>'Capt. Mary Chebet',   'description'=>'Crew member reported acute abdominal pain during cruise. Aircraft continued to destination. Medical team met aircraft on arrival at HUEN. Crew member transported to hospital for assessment.', 'status'=>'Closed', 'inspector'=>'Insp. Paul Kimani'],
            ['ref'=>'IR-2024-026', 'flight'=>'KQ101', 'type'=>'Technical',  'severity'=>'Low',      'date'=>'2025-05-12', 'location'=>'HKMO', 'aircraft'=>'5Y-KQA', 'reported_by'=>'Capt. David Kamau',   'description'=>'APU unserviceable on ground at HKMO. External GPU connected. Aircraft airworthy for dispatch per MEL provisions. Maintenance notified for repair at HKJK base.',       'status'=>'Closed',              'inspector'=>'Insp. Daniel Waweru'],
        ];

        $summary = [
            'total'               => count($incidents),
            'open'                => collect($incidents)->where('status','Open')->count(),
            'under_investigation' => collect($incidents)->where('status','Under Investigation')->count(),
            'closed'              => collect($incidents)->where('status','Closed')->count(),
            'critical'            => collect($incidents)->where('severity','Critical')->count(),
            'high'                => collect($incidents)->where('severity','High')->count(),
        ];

        return view('flight-ops.incidents', compact('incidents', 'summary'));
    }
}