<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    /**
     * Display the registration form view page.
     */
    public function create()
    {
        return view('organization.create');
    }

    /**
     * Validate and process the incoming form intake data packet.
     */
    public function store(Request $request)
    {
        // 1. Strict validation matching ONLY the fields present in the dashboard design
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255', // e.g., AOC, AMO, ATO
            'approval_no' => 'required|string|max:255|unique:organizations,approval_no', // Unique constraint against renamed column
            'valid_until' => 'required|date',
            'fleet_size' => 'required|integer|min:0',
        ]);

        // 2. Automatically inject the baseline operational workflow status flag
        $validatedData['status'] = 'pending';

        // 3. Commit the cleaned data straight to your database execution layer
        Organization::create($validatedData);

        // 4. Redirect to dashboard with a feedback alert notification component
        return redirect()->route('organization.dashboard')
            ->with('success', 'Aviation Organization created successfully.');
    }

    /**
     * Render the administrative grid dashboard with operational data lists.
     */
    public function dashboard(Request $request)
    {
        $query = Organization::query();

        // 1. Handle live string filtering matching the top header text navbar
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            
            $query->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('name', 'like', $searchTerm)
                         ->orWhere('approval_no', 'like', $searchTerm); // Replaced old column key references
            });
        }

        // 2. Handle quick-state query limits matching your design's Valid/Pending filter actions
        if ($request->filled('status') && in_array($request->status, ['valid', 'pending'])) {
            $query->where('status', $request->status);
        }

        $organizations = $query->latest()->get();

        $stats = [
            'total' => Organization::count(),
            'pending' => Organization::where('status', 'pending')->count(),
            'valid' => Organization::where('status', 'valid')->count(),
        ];

        $currentStatus = $request->filled('status') && in_array($request->status, ['valid', 'pending'])
            ? $request->status
            : null;

        return view('organization.dashboard', compact('organizations', 'stats', 'currentStatus'));
    }
}