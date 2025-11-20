@include('auth.header')

<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="pt-3 mt-5 mb-4">
            <div class="page-banner pb-4">
                <div class="container company-profile card featured-card p-3">
                    <div class="row">
                        <div class="col-md-4 align-self-center">
                            <img class="jd-logo" src="{{ asset($job->company->logo) }}"/>
                        </div>
                        <div class="col-md-4 text-center">
                            <h2 class="job-title-header">{{ $job->title }}</h2>
                            <h5><span class="primary-color">Location : </span>{{ $job->location->name }}</h5>
                            <h5><span class="primary-color">Job Type : </span>{{ $job->employment_type }}</h5>
                            {{-- <h5><span class="primary-color">Last Date For Apply : </span>30-Nov-2025</h5> --}}
                        </div>
                        <div class="col-md-4 text-center align-self-center">
                            <a href="{{ $job->job_link }}" target="_blank" title="Apply Now"><button class="btn btn-success">APPLY NOW</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="featured-card mt-3">
                            <div class="featured-card-header landing-job">
                                <h5 class="job-title">{{ $job->title }}</h5>
                                {{-- <h6 class="mb-0">Prefferred Immediate joiner - max 15day</h6> --}}
                            </div>
                            <div class="featured-card-body">
                                <ul class="job-description-info">
                                    <li>
                                        <h6 class="featured-tile">No of Positions : <span class="sub-info">{{ $job->positions }}</span></h6>
                                    </li>
                                    <li>
                                        <h6 class="featured-tile">Required Experience : <span class="sub-info">{{ $job->experience_required }}</span></h6>
                                    </li>
                                    <li>
                                        <h6 class="featured-tile">Salary : <span class="sub-info">{{ $job->salary }}</span></h6>
                                    </li>
                                    <li>
                                        <h6 class="featured-tile">Company Overview : </h6>
                                        <p class="sub-info">{{ $job->company->overview }}</p>
                                    </li>
                                    <li>
                                        <h6 class="featured-tile">Key Responsibilities :</h6>
                                        <ul class="required-skills-list">
                                            @foreach (explode("\n", $job->responsibilities) as $item)
                                                @if (trim($item) != '')
                                                    <li>{{ $item }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <h6 class="featured-tile">Required Skills :</h6>
                                        <ul class="required-skills-list">
                                            @foreach (explode("\n", $job->skills) as $item)
                                                @if (trim($item) != '')
                                                    <li>{{ $item }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <h6 class="featured-tile">Education Qualifications: <span class="sub-info">{{ $job->education_qualification }}</span></h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-secondary"  onclick="window.location='{{ url('/showallactivejobs') }}'"><img class="back-icon"/> Back To All Jobs</button>
                        </div>
                    </div>
                </div>

                @if ($relatedJobs->count() > 0)
                <h2 class="text-center">Other Jobs at {{ $job->company->name }}</h2>
                <div class="row mt-3">
                    @foreach ($relatedJobs as $rjob)
                    <div class="col-md-3">
                        <a href="{{ route('landing.job.show', $rjob->id) }}" class="text-decoration-none">
                        <div class="featured-card">
                            <div class="featured-card-header">
                            <img src="{{ asset($rjob->company->logo) }}" alt="Company Logo" width="90" class="me-3 rounded">
                                <span class="job-type-label">{{ $rjob->employment_type }}</span>
                            </div>
                            <div class="featured-card-body">
                                <h6 class="featured-tile">{{ $rjob->title }}</h6>
                                <span class="featured-sub-title">{{ $rjob->company->name ?? 'N/A' }}, {{ $rjob->location->name ?? 'N/A' }}</span>
                            </div>
                            <div class="featured-footer">
                                <span class="design-label">{{ $rjob->category->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                        </a>

                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    @include('auth.footer')
    </div>
   @include('auth.footer-script')
</body>

</html>