@component('mail::message')
# ❌ Job Upload Failed

Unfortunately, your job upload encountered errors.

**Error Message:**
{{ $errorMessage }}

@if($failuresFile)
A detailed error log has been attached to this email.
@endif

Please correct the issues and try uploading again.

Thanks,  
{{ config('app.name') }}
@endcomponent
