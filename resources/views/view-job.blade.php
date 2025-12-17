@include('auth.header')

<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="pt-3 mt-5 mb-4">
            <div class="page-banner pb-4">
                <div class="container company-profile card featured-card p-3">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="job-title-header mb-0">{{ $job->title }}</h2>
                            <ul class="job-description-info">
                                <li class="mb-2">
                                    <h6 class="featured-tile">{{ $rjob->company->name ?? 'N/A' }} | <span class="mx-1">
                                            <img class="job-icon" src="{{ asset('images/rating-star.svg') }}">
                                            <img class="job-icon" src="{{ asset('images/rating-star.svg') }}">
                                            <img class="job-icon" src="{{ asset('images/rating-star.svg') }}">
                                            <img class="job-icon" src="{{ asset('images/half-star.svg') }}">
                                            <img class="job-icon" src="{{ asset('images/empty-star.svg') }}">
                                            3.5</span> | <span class="sub-info">203 Reviews</span></h6>
                                </li>
                                <li>
                                    <span class="sub-info"><img class="job-icon"
                                            src="{{ asset('images/office-bag-icon.svg') }}" /> 5 - 10 years</span> | <span
                                        class="sub-info"><img class="job-icon rupee-icon"
                                            src="{{ asset('images/logo-usd.svg') }}" /> {{ $job->salary }}
                                        P.A.</span></h6>
                                </li>
                                <li class="mt-2">
                                    <span class="sub-info"><img class="job-icon"
                                            src="{{ asset('images/location-icon.svg') }}" /> {{ $job->location }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-end align-self-center">
                             <img class="jd-logo" src="{{ asset($job->company->logo) }}"/>
                        </div>
                    </div>

                    <hr class="mt-0">
                    <ul class="job-description-info">
                        <li>
                            <span class="sub-info">Posted : <strong>{{ $job->created_at }}</strong></span> | 
                            {{-- <span class="sub-info">Openings : <strong>8</strong></span> | 
                            <span class="sub-info">Applications : <strong>43+</strong></span> --}}
                        </li>
                    </ul>
                    <div class="col-12 align-self-center">
                        <a href="{{ $job->job_link }}" target="_blank" title="Apply Now"><button class="btn btn-success">APPLY NOW</button></a>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="landing-screen">
                    <div class="job-view-area mx-auto">
                        <div class="featured-card mt-3">
                            <div class="featured-card-header landing-job">
                                <h5 class="job-title">Job Description</h5>
                                <h6 class="sub-info mt-2 mb-0">{{ $job->title }}</h6>
                            </div>
                            <div class="featured-card-body">
                                <ul class="job-description-info">
                                    <li>
                                        <h6 class="featured-tile">Location : <span class="sub-info">{{ $job->location }}</span></h6>
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
                <div class="row">
                    @foreach ($relatedJobs as $rjob)
                    <div class="col-md-6">
                        <div class="container company-profile card featured-card p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="job-title-header mb-0">{{ $rjob->title }}</h2>
                                    <ul class="job-description-info">
                                        <li class="mb-2">
                                            <h6 class="featured-tile">{{ $rjob->company->name ?? 'N/A' }} | <span
                                                    class="mx-1">
                                                     <img class="job-icon" src="{{ asset('images/rating-star.svg') }}">
                                                    <img class="job-icon" src="{{ asset('images/rating-star.svg') }}">
                                                    <img class="job-icon" src="{{ asset('images/rating-star.svg') }}">
                                                    <img class="job-icon" src="{{ asset('images/half-star.svg') }}">
                                                    <img class="job-icon" src="{{ asset('images/empty-star.svg') }}">
                                                    3.5</span> | <span class="sub-info">203 Reviwes</span></h6>
                                        </li>
                                        <li>
                                            <span class="sub-info"><img class="job-icon"
                                                    src="{{ asset('images/office-bag-icon.svg') }}" /> 5 - 10 years</span> | <span
                                                class="sub-info"><img class="job-icon rupee-icon"
                                                    src="{{ asset('images/logo-usd.svg') }}" /> {{ $job->salary }}
                                                P.A.</span></h6>
                                        </li>
                                        <li class="mt-2">
                                            <span class="sub-info"><img class="job-icon"
                                                    src="{{ asset('images/location-icon.svg') }}" /> {{ $job->location }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <ul class="job-description-info">
                                <li>
                                    <span class="sub-info">Posted : <strong>{{ $job->created_at }}</strong></span> | 
                                </li>
                            </ul>
                            <div class="col-12 align-self-center">
                                <a href="{{ route('landing.job.show', $rjob->id) }}" class="text-decoration-none"><button class="btn btn-success">APPLY NOW</button></a>
                            </div>
                        </div>
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