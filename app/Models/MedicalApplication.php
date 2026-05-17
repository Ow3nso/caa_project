<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalApplication extends Model
{
    protected $table = 'medical_application_form';
    protected $guarded = [];

    protected $casts = [
        'exam_date'              => 'date',
        'current_expiry_date'    => 'date',
        'validity_start_date'    => 'date',
        'date_of_birth'          => 'date',
        'ame_signed_date'        => 'date',
        'reexam_scheduled_date'  => 'date',
        'authority_submission_due' => 'date',
        'authority_submitted_at' => 'date',

        'cond_heart'             => 'boolean',
        'cond_hypertension'      => 'boolean',
        'cond_diabetes'          => 'boolean',
        'cond_epilepsy'          => 'boolean',
        'cond_loss_consciousness'=> 'boolean',
        'cond_mental_health'     => 'boolean',
        'cond_vision'            => 'boolean',
        'cond_hearing'           => 'boolean',
        'cond_asthma'            => 'boolean',
        'cond_substance'         => 'boolean',
        'cond_neuro'             => 'boolean',
        'cond_surgery_12m'       => 'boolean',
        'decl_truthful'          => 'boolean',
        'decl_consent_release'   => 'boolean',
        'decl_no_psychoactive'   => 'boolean',
        'decl_fitness_awareness' => 'boolean',
        'referred_to_authority'  => 'boolean',
    ];

    
    public function computeValidityStart(): void
    {
        if ($this->application_type === 'renewal' && $this->current_expiry_date) {
            $daysBeforeExpiry = $this->exam_date->diffInDays($this->current_expiry_date, false);
            
            $this->validity_start_date = ($daysBeforeExpiry >= 0 && $daysBeforeExpiry <= 45)
                ? $this->current_expiry_date
                : $this->exam_date;
        } else {
            $this->validity_start_date = $this->exam_date;
        }
    }

    
    public function setAuthoritySubmissionDue(): void
    {
        $this->authority_submission_due = $this->exam_date->addDays(14);
    }

    public function allDeclarationsAccepted(): bool
    {
        return $this->decl_truthful
            && $this->decl_consent_release
            && $this->decl_no_psychoactive
            && $this->decl_fitness_awareness;
    }

    public function isOverdueForAuthoritySubmission(): bool
    {
        return $this->authority_submission_due
            && now()->greaterThan($this->authority_submission_due)
            && ! $this->authority_submitted_at;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
