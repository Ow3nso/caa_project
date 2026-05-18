<?php

namespace App\Services;

use App\Models\MedicalApplication;
use Illuminate\Support\Facades\DB;

class MedicalApplicationService
{
    public function submit(array $data, ?int $userId = null): MedicalApplication
    {
        return DB::transaction(function () use ($data, $userId) {
            $app = new MedicalApplication($data);
            if ($userId !== null) {
                $app->user_id = $userId;
            }
            $app->status  = 'submitted';
            $app->computeValidityStart();
            $app->setAuthoritySubmissionDue();
            $app->save();
            return $app;
        });
    }

    
    public function recordAMEDecision(MedicalApplication $app, array $data): MedicalApplication
    {
        if (! $app->allDeclarationsAccepted()) {
            throw new \DomainException('All declarations must be accepted before a certificate can be issued.');
        }

        DB::transaction(function () use ($app, $data) {
            $app->fill($data);
            $app->status = match($data['ame_decision']) {
                'issue'               => 'issued',
                'issue_with_limitations' => 'issued_limited',
                'deny'                => 'denied',
                'reexam'              => 'reexam_required',
            };
            $app->save();
        });

        return $app;
    }

    
    public function markSubmittedToAuthority(MedicalApplication $app): MedicalApplication
    {
        $app->status = 'submitted_to_authority';
        $app->authority_submitted_at = now();
        $app->save();
        return $app;
    }

    
    public function requireReexamination(MedicalApplication $app, string $reason, string $date): MedicalApplication
    {
        $app->ame_decision            = 'reexam';
        $app->reexam_reason           = $reason;
        $app->reexam_scheduled_date   = $date;
        $app->status                  = 'reexam_required';
        $app->save();
        return $app;
    }
}