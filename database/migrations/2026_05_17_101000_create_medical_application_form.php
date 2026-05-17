<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_application_form', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();

            $table->enum('application_type', ['initial', 'renewal', 'reissue', 'reexam', 'deferral']);
            $table->date('exam_date');
            $table->date('current_expiry_date')->nullable();
            $table->date('validity_start_date')->nullable();

            $table->enum('certificate_class', ['1','2','3']);
            $table->enum('licence_type', ['ATPL','CPL','PPL','Cabin Crew','ATC']);
            $table->string('licence_number')->nullable();

            $table->string('full_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['Male','Female','Other']);
            $table->string('nationality');
            $table->enum('id_type', ['National ID','Passport','Military ID']);
            $table->string('id_number');
            $table->string('phone');
            $table->string('email');
            $table->string('address');

            $table->boolean('cond_heart')->default(false);
            $table->boolean('cond_hypertension')->default(false);
            $table->boolean('cond_diabetes')->default(false);
            $table->boolean('cond_epilepsy')->default(false);
            $table->boolean('cond_loss_consciousness')->default(false);
            $table->boolean('cond_mental_health')->default(false);
            $table->boolean('cond_vision')->default(false);
            $table->boolean('cond_hearing')->default(false);
            $table->boolean('cond_asthma')->default(false);
            $table->boolean('cond_substance')->default(false);
            $table->boolean('cond_neuro')->default(false);
            $table->boolean('cond_surgery_12m')->default(false);
            $table->text('current_medications')->nullable();
            $table->text('past_surgeries')->nullable();
            $table->text('allergies')->nullable();
            $table->text('family_medical_history')->nullable();
            $table->enum('alcohol_use', ['None','Occasional','Moderate','Heavy'])->nullable();
            $table->enum('tobacco_use', ['None','Former smoker','Current smoker'])->nullable();
            $table->text('psychoactive_substance_history')->nullable(); // Reg. 191
            $table->text('prior_denials_limitations')->nullable();

            $table->boolean('decl_truthful')->default(false);
            $table->boolean('decl_consent_release')->default(false);
            $table->boolean('decl_no_psychoactive')->default(false);
            $table->boolean('decl_fitness_awareness')->default(false);

            $table->text('ame_clinical_notes')->nullable();
            $table->enum('ame_decision', ['issue','issue_with_limitations','deny','reexam'])->nullable();
            $table->text('limitations')->nullable();           
            $table->text('denial_grounds')->nullable();        
            $table->text('reexam_reason')->nullable();         
            $table->date('reexam_scheduled_date')->nullable();
            $table->enum('validity_reduction', ['standard','6m','3m','custom'])->default('standard');
            $table->date('ame_signed_date')->nullable();
            $table->boolean('referred_to_authority')->default(false); 

            // Status tracking
            $table->enum('status', [
                'draft',
                'submitted',
                'ame_reviewed',
                'issued',
                'issued_limited',
                'denied',
                'reexam_required',
                'submitted_to_authority' 
            ])->default('draft');

            $table->date('authority_submission_due')->nullable(); 
            $table->date('authority_submitted_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_application_form');
    }
};
