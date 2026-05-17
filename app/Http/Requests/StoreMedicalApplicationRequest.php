<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'application_type'   => 'required|in:initial,renewal,reissue,reexam,deferral',
            'exam_date'          => 'required|date',
            'current_expiry_date'=> 'required_if:application_type,renewal|nullable|date',
            'certificate_class'  => 'required|in:1,2,3',
            'licence_type'       => 'required|in:ATPL,CPL,PPL,Cabin Crew,ATC',
            'licence_number'     => 'nullable|string',
            
            
            'full_name'          => 'required|string',
            'date_of_birth'      => 'required|date',
            'gender'             => 'required|in:Male,Female,Other',
            'nationality'        => 'required|string',
            'id_type'            => 'required|in:National ID,Passport,Military ID',
            'id_number'          => 'required|string',
            'phone'              => 'required|string',
            'email'              => 'required|email',
            'address'            => 'required|string',
            
            'cond_heart'         => 'required|boolean',
            'cond_hypertension'  => 'required|boolean',
            'cond_diabetes'      => 'required|boolean',
            'cond_epilepsy'      => 'required|boolean',
            'cond_loss_consciousness' => 'required|boolean',
            'cond_mental_health' => 'required|boolean',
            'cond_vision'        => 'required|boolean',
            'cond_hearing'       => 'required|boolean',
            'cond_asthma'        => 'required|boolean',
            'cond_substance'     => 'required|boolean',
            'cond_neuro'         => 'required|boolean',
            'cond_surgery_12m'   => 'required|boolean',
            'current_medications'=> 'required|string',
            'past_surgeries'     => 'required|string',
            'allergies'          => 'required|string',
            'family_medical_history' => 'required|string',
            'alcohol_use'        => 'required|in:None,Occasional,Moderate,Heavy',
            'tobacco_use'        => 'required|in:None,Former smoker,Current smoker',
            'psychoactive_substance_history' => 'required|string',
            'prior_denials_limitations'      => 'required|string',
            
            'decl_truthful'          => 'required|accepted',
            'decl_consent_release'   => 'required|accepted',
            'decl_no_psychoactive'   => 'required|accepted',
            'decl_fitness_awareness' => 'required|accepted',
        ];
    }
}