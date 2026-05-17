<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicalApplicationRequest;
use App\Models\MedicalApplication;
use App\Services\MedicalApplicationService;
use Illuminate\Http\Request;

class MedicalApplicationController extends Controller
{
    public function __construct(private MedicalApplicationService $service) {}

    public function store(StoreMedicalApplicationRequest $request)
    {
        $app = $this->service->submit($request->validated(), $request->user()?->id);
        return response()->json($app, 201);
    }

    
    public function adminIndex()
    {
        $applications = MedicalApplication::orderBy('created_at', 'desc')->paginate(15);
        return view('medical.index', compact('applications'));
    }

    
    public function adminShow(MedicalApplication $application)
    {
        $application->loadMissing('user');
        return view('medical.show', compact('application'));
    }

    public function ameDecision(Request $request, MedicalApplication $application)
    {
        $data = $request->validate([
            'ame_decision'         => 'required|in:issue,issue_with_limitations,deny,reexam',
            'ame_clinical_notes'   => 'required|string',
            'limitations'          => 'required_if:ame_decision,issue_with_limitations|nullable|string',
            'denial_grounds'       => 'required_if:ame_decision,deny|nullable|string',
            'reexam_reason'        => 'required_if:ame_decision,reexam|nullable|string',
            'reexam_scheduled_date'=> 'required_if:ame_decision,reexam|nullable|date',
            'validity_reduction'   => 'in:standard,6m,3m,custom',
            'ame_signed_date'      => 'required|date',
            'referred_to_authority'=> 'boolean',
        ]);
        $app = $this->service->recordAMEDecision($application, $data);
        if ($request->wantsJson()) {
            return response()->json($app);
        }

        return redirect()->route('admin.medical.show', $application->id)->with('status', 'Decision saved.');
    }

    public function submitToAuthority(MedicalApplication $application)
    {
        $app = $this->service->markSubmittedToAuthority($application);
        return response()->json($app);
    }
}