@include('auth.header')

<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="min-content-section">
            <div class="popular-category">
                <div class="container">
                    <div class="banner-main-title black-title pb-4">
                        <span>List of All Active Jobs</span>
                    </div>
                    <div class="row">
                        @foreach ($latestJobs as $job)
                            <div class="col-md-3">
                                <div class="featured-card">
                                    <div class="featured-card-header">
                                    <img src="{{ asset($job->company->logo) }}" alt="Company Logo">
                                        <span class="job-type-label">{{ $job->employment_type }}</span>
                                    </div>
                                    <div class="featured-card-body">
                                        <h6 class="featured-tile">{{ $job->title }}</h6>
                                        <span class="featured-sub-title">{{ $job->company->name ?? 'N/A' }}, {{ $job->location->name ?? 'N/A' }}</span>
                                        <p class="featured-content">
                                            {{ $job->description }}
                                        </p>
                                    </div>
                                    <div class="featured-footer">
                                        <span class="design-label">{{ $job->category->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @include('auth.footer')

    </div>
    @include('auth.footer-script')
</body>
</html>