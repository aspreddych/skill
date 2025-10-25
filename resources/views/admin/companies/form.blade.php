<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" placeholder="Company Name" value="{{ old('name', $company->name ?? '') }}" class="form-control">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" placeholder="Email" value="{{ old('email', $company->email ?? '') }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone', $company->phone ?? '') }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Website</label>
        <input type="text" name="website" placeholder="Website" value="{{ old('website', $company->website ?? '') }}" class="form-control">
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" placeholder="Address" value="{{ old('address', $company->address ?? '') }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Company Logo</label>
        <input type="file" name="logo" class="form-control"  accept="image/*">
        @if(!empty($company->logo))
            <div class="mt-2">
                <img src="{{ asset($company->logo) }}" alt="Logo" width="100" height="100" class="border rounded">
            </div>
        @endif
    </div>
</div>
