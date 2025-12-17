<div class="row">
    {{-- Left Column --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" 
                   value="{{ old('title', $job->title ?? '') }}" placeholder="Job Title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Company</label>
            <select name="company_id" class="form-control" required>
                <option value="">Select Company</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" 
                        {{ old('company_id', $job->company_id ?? '') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Employment Type</label>
            <select name="employment_type" class="form-control" required>
                <option value="">Select Type</option>
                <option value="Full-time" {{ old('employment_type', $job->employment_type ?? '') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ old('employment_type', $job->employment_type ?? '') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Contract" {{ old('employment_type', $job->employment_type ?? '') == 'Contract' ? 'selected' : '' }}>Contract</option>
                <option value="Internship" {{ old('employment_type', $job->employment_type ?? '') == 'Internship' ? 'selected' : '' }}>Internship</option>
                <option value="Temporary" {{ old('employment_type', $job->employment_type ?? '') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Job Link (Company’s Job Post)</label>
            <input type="url" name="job_link" class="form-control"
                placeholder="https://example.com/job/123"
                value="{{ old('job_link', $job->job_link ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Experience Required</label>
            <input type="text" name="experience_required" class="form-control" 
                   value="{{ old('salary', $job->experience_required ?? '') }}" placeholder="Experience Required" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Key Responsibilities (Each in one line)</label>
            <textarea name="responsibilities" class="form-control" rows="10" placeholder="Key Responsibilities" required>{{ old('responsibilities', $job->responsibilities ?? '') }}</textarea>
        </div>

    </div>

    {{-- Right Column --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Salary Estimate</label>
            <input type="text" name="salary" class="form-control" 
                   value="{{ old('salary', $job->salary ?? '') }}" placeholder="Salary Estimate" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" 
                    {{ old('status', $job->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" 
                    {{ old('status', $job->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>  

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ old('location', $job->location ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Education Qualification</label>
            <input type="text" name="education_qualification" class="form-control" 
                   value="{{ old('education_qualification', $job->education_qualification ?? '') }}" placeholder="Education Qualification" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $job->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Required Skills (Each in one line)</label>
            <textarea name="skills" class="form-control" rows="10" placeholder="Required Skills" required>{{ old('skills', $job->skills ?? '') }}</textarea>
        </div>
    </div>
</div>
