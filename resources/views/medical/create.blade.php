<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.medical') : route('services.medical') }}" class="text-gray-400 hover:text-caa-medium-blue mr-3 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            Medical Certificate Application
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-caa-dark-navy">Medical Certificate Form</h3>
                <p class="text-sm text-gray-500 mt-1">Please fill in all the required information for the medical certificate application.</p>
            </div>
            
            <form action="{{ route('apply.medical.store') }}" method="POST" class="p-8">
                @csrf

                @if($errors->any())
                    <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 text-sm text-red-700">
                        <p class="font-semibold">There were errors with your submission. Please check the fields below.</p>
                    </div>
                @endif

                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Application Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Application Type <span class="text-red-500">*</span></label>
                            <select name="application_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option value="">Select type</option>
                                <option value="initial" {{ old('application_type') === 'initial' ? 'selected' : '' }}>Initial</option>
                                <option value="renewal" {{ old('application_type') === 'renewal' ? 'selected' : '' }}>Renewal</option>
                                <option value="reissue" {{ old('application_type') === 'reissue' ? 'selected' : '' }}>Reissue</option>
                                <option value="reexam" {{ old('application_type') === 'reexam' ? 'selected' : '' }}>Re-exam</option>
                                <option value="deferral" {{ old('application_type') === 'deferral' ? 'selected' : '' }}>Deferral</option>
                            </select>
                            @error('application_type') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Exam Date <span class="text-red-500">*</span></label>
                            <input type="date" name="exam_date" value="{{ old('exam_date') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">
                            @error('exam_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Expiry Date</label>
                            <input type="date" name="current_expiry_date" value="{{ old('current_expiry_date') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">
                            @error('current_expiry_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Certificate Class <span class="text-red-500">*</span></label>
                            <select name="certificate_class" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option value="">Select class</option>
                                <option value="1" {{ old('certificate_class') === '1' ? 'selected' : '' }}>Class 1</option>
                                <option value="2" {{ old('certificate_class') === '2' ? 'selected' : '' }}>Class 2</option>
                                <option value="3" {{ old('certificate_class') === '3' ? 'selected' : '' }}>Class 3</option>
                            </select>
                            @error('certificate_class') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">License Type <span class="text-red-500">*</span></label>
                            <select name="licence_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option value="">Select license type</option>
                                <option value="ATPL" {{ old('licence_type') === 'ATPL' ? 'selected' : '' }}>ATPL</option>
                                <option value="CPL" {{ old('licence_type') === 'CPL' ? 'selected' : '' }}>CPL</option>
                                <option value="PPL" {{ old('licence_type') === 'PPL' ? 'selected' : '' }}>PPL</option>
                                <option value="Cabin Crew" {{ old('licence_type') === 'Cabin Crew' ? 'selected' : '' }}>Cabin Crew</option>
                                <option value="ATC" {{ old('licence_type') === 'ATC' ? 'selected' : '' }}>ATC</option>
                            </select>
                            @error('licence_type') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">License Number</label>
                            <input type="text" name="licence_number" value="{{ old('licence_number') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Optional">
                            @error('licence_number') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Applicant Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="John Doe">
                            @error('full_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">
                            @error('date_of_birth') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gender <span class="text-red-500">*</span></label>
                            <select name="gender" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option value="">Select gender</option>
                                <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nationality <span class="text-red-500">*</span></label>
                            <input type="text" name="nationality" value="{{ old('nationality') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Kenyan">
                            @error('nationality') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ID Type <span class="text-red-500">*</span></label>
                            <select name="id_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                <option value="">Select ID type</option>
                                <option value="National ID" {{ old('id_type') === 'National ID' ? 'selected' : '' }}>National ID</option>
                                <option value="Passport" {{ old('id_type') === 'Passport' ? 'selected' : '' }}>Passport</option>
                                <option value="Military ID" {{ old('id_type') === 'Military ID' ? 'selected' : '' }}>Military ID</option>
                            </select>
                            @error('id_type') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ID Number <span class="text-red-500">*</span></label>
                            <input type="text" name="id_number" value="{{ old('id_number') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="12345678">
                            @error('id_number') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="+254 700 000 000">
                            @error('phone') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="john@example.com">
                            @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Address <span class="text-red-500">*</span></label>
                            <textarea name="address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue" placeholder="Street, city, country">{{ old('address') }}</textarea>
                            @error('address') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Medical History</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(['cond_heart' => 'Heart conditions', 'cond_hypertension' => 'Hypertension', 'cond_diabetes' => 'Diabetes', 'cond_epilepsy' => 'Epilepsy', 'cond_loss_consciousness' => 'Loss of consciousness', 'cond_mental_health' => 'Mental health issues', 'cond_vision' => 'Vision problems', 'cond_hearing' => 'Hearing problems', 'cond_asthma' => 'Asthma', 'cond_substance' => 'Substance abuse history', 'cond_neuro' => 'Neurological conditions', 'cond_surgery_12m' => 'Surgery in last 12 months'] as $field => $label)
                            <div class="flex items-start space-x-3">
                                <input type="hidden" name="{{ $field }}" value="0">
                                <input id="{{ $field }}" type="checkbox" name="{{ $field }}" value="1" class="mt-1 h-4 w-4 text-caa-medium-blue border-gray-300 rounded" {{ old($field) ? 'checked' : '' }}>
                                <label for="{{ $field }}" class="text-sm text-gray-700">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('cond_heart') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_hypertension') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_diabetes') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_epilepsy') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_loss_consciousness') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_mental_health') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_vision') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_hearing') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_asthma') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_substance') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_neuro') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    @error('cond_surgery_12m') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Additional Health Information</h4>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Medications <span class="text-red-500">*</span></label>
                            <textarea name="current_medications" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">{{ old('current_medications') }}</textarea>
                            @error('current_medications') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Past Surgeries <span class="text-red-500">*</span></label>
                            <textarea name="past_surgeries" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">{{ old('past_surgeries') }}</textarea>
                            @error('past_surgeries') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Allergies <span class="text-red-500">*</span></label>
                            <textarea name="allergies" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">{{ old('allergies') }}</textarea>
                            @error('allergies') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Family Medical History <span class="text-red-500">*</span></label>
                            <textarea name="family_medical_history" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">{{ old('family_medical_history') }}</textarea>
                            @error('family_medical_history') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alcohol Use <span class="text-red-500">*</span></label>
                                <select name="alcohol_use" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                    <option value="">Select usage</option>
                                    <option value="None" {{ old('alcohol_use') === 'None' ? 'selected' : '' }}>None</option>
                                    <option value="Occasional" {{ old('alcohol_use') === 'Occasional' ? 'selected' : '' }}>Occasional</option>
                                    <option value="Moderate" {{ old('alcohol_use') === 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                    <option value="Heavy" {{ old('alcohol_use') === 'Heavy' ? 'selected' : '' }}>Heavy</option>
                                </select>
                                @error('alcohol_use') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tobacco Use <span class="text-red-500">*</span></label>
                                <select name="tobacco_use" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue bg-white">
                                    <option value="">Select usage</option>
                                    <option value="None" {{ old('tobacco_use') === 'None' ? 'selected' : '' }}>None</option>
                                    <option value="Former smoker" {{ old('tobacco_use') === 'Former smoker' ? 'selected' : '' }}>Former smoker</option>
                                    <option value="Current smoker" {{ old('tobacco_use') === 'Current smoker' ? 'selected' : '' }}>Current smoker</option>
                                </select>
                                @error('tobacco_use') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Psychoactive Substance History <span class="text-red-500">*</span></label>
                            <textarea name="psychoactive_substance_history" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">{{ old('psychoactive_substance_history') }}</textarea>
                            @error('psychoactive_substance_history') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Prior Denials or Limitations <span class="text-red-500">*</span></label>
                            <textarea name="prior_denials_limitations" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-caa-medium-blue focus:border-caa-medium-blue">{{ old('prior_denials_limitations') }}</textarea>
                            @error('prior_denials_limitations') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Declarations</h4>
                    <div class="space-y-4">
                        @foreach(['decl_truthful' => 'I declare that the information I have provided is truthful.', 'decl_consent_release' => 'I consent to the release of my medical records as required.', 'decl_no_psychoactive' => 'I confirm I am not under the influence of psychoactive substances.', 'decl_fitness_awareness' => 'I understand the fitness requirements for this certificate.'] as $field => $label)
                            <div class="flex items-start space-x-3">
                                <input id="{{ $field }}" type="checkbox" name="{{ $field }}" value="1" class="mt-1 h-4 w-4 text-caa-medium-blue border-gray-300 rounded" {{ old($field) ? 'checked' : '' }}>
                                <label for="{{ $field }}" class="text-sm text-gray-700">{{ $label }}</label>
                            </div>
                            @error($field) <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ (auth()->check() && auth()->user()->role === 'admin') ? route('admin.medical') : route('services.medical') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-caa-medium-blue transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
