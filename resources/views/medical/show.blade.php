<x-app-layout>
    <x-slot name="header">
        Medical Application — Review
    </x-slot>

    <div class="space-y-6">
        @if(session('status'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4">
                <p class="text-sm text-green-700">{{ session('status') }}</p>
            </div>
        @endif
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-medium text-gray-900">Applicant details</h3>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div><strong>Full name:</strong> {{ $application->full_name }}</div>
                <div><strong>Certificate class:</strong> {{ $application->certificate_class }}</div>
                <div><strong>DOB:</strong> {{ optional($application->date_of_birth)->format('d M Y') }}</div>
                <div><strong>Email:</strong> {{ $application->email }}</div>
                <div class="sm:col-span-2"><strong>Address:</strong> {{ $application->address }}</div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-medium text-gray-900">Medical history</h3>
            <div class="mt-4 space-y-2 text-sm text-gray-700">
                <div><strong>Current medications:</strong> {{ $application->current_medications ?? '-' }}</div>
                <div><strong>Past surgeries:</strong> {{ $application->past_surgeries ?? '-' }}</div>
                <div><strong>Allergies:</strong> {{ $application->allergies ?? '-' }}</div>
                <div><strong>Psychoactive substance history:</strong> {{ $application->psychoactive_substance_history ?? '-' }}</div>
            </div>
        </div>

        <div id="ame" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-medium text-gray-900">AME decision</h3>
            <form action="{{ route('admin.medical.ameDecision', $application->id) }}" method="post" class="mt-4 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Decision</label>
                    <select name="ame_decision" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="issue">Issue</option>
                        <option value="issue_with_limitations">Issue with limitations</option>
                        <option value="deny">Deny</option>
                        <option value="reexam">Require re-examination</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Clinical notes</label>
                    <textarea name="ame_clinical_notes" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="4">{{ old('ame_clinical_notes', $application->ame_clinical_notes) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Limitations (if any)</label>
                    <textarea name="limitations" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="2">{{ old('limitations', $application->limitations) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Denial grounds (if denying)</label>
                    <textarea name="denial_grounds" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="2">{{ old('denial_grounds', $application->denial_grounds) }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Re-exam reason</label>
                        <input type="text" name="reexam_reason" value="{{ old('reexam_reason', $application->reexam_reason) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Re-exam date</label>
                        <input type="date" name="reexam_scheduled_date" value="{{ old('reexam_scheduled_date', optional($application->reexam_scheduled_date)->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Validity reduction</label>
                        <select name="validity_reduction" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="standard">Standard</option>
                            <option value="6m">6 months</option>
                            <option value="3m">3 months</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Signed date</label>
                        <input type="date" name="ame_signed_date" value="{{ old('ame_signed_date', optional($application->ame_signed_date)->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="referred_to_authority" value="1" {{ $application->referred_to_authority ? 'checked' : '' }} class="h-4 w-4 text-caa-medium-blue">
                        <label class="ml-2 text-sm text-gray-700">Referred to authority</label>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-caa-medium-blue hover:bg-caa-dark-blue">Save decision</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
