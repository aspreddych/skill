<div class="row">
    {{-- Left Column --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" 
                   value="{{ old('title', $job->title ?? '') }}" placeholder="Job Title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Positions</label>
            <input type="number" name="positions" class="form-control" min="1"
                value="{{ old('positions', $job->positions ?? 1) }}" required>
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
    </div>

    {{-- Right Column --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="text" name="salary" class="form-control" 
                   value="{{ old('salary', $job->salary ?? '') }}" placeholder="Salary">
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
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Description" required>{{ old('description', $job->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Requirements</label>
            <textarea name="requirements" class="form-control" rows="3" placeholder="Any Requirements">{{ old('requirements', $job->requirements ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <select name="location_id" class="form-control" required>
                <option value="">Select Location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" 
                        {{ old('location_id', $job->location_id ?? '') == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
