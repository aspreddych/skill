@include('auth.header')

<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="min-content-section">
            <div class="home-banner-section pt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 home my-auto">
                            <h2 class="banner-main-title">Find a job that suits your interest & skills.</h2>
                            <p class="banner-sub-content">
                                Aliquam vitae turpis in diam convallis finibus in at risus. <br />Nullam in scelerisque
                                leo, eget sollicitudin velit bestibulum.
                            </p>
                            <div class="search-section">
                                <div class="search-boxes">
                                    <div class="pos-rel align-self-center">
                                        <img class="search-icon" src="{{ asset('images/search-icon.svg') }}"
                                            alt="search icon" />
                                        <input type="text" class="form-control" placeholder="Job title" />
                                    </div>
                                    <div class="pos-rel align-self-center search-field-divider">
                                        <img class="search-icon" src="{{ asset('images/map-icon.svg') }}" alt="Map icon" />
                                        <input type="text" class="form-control" placeholder="Location" />
                                    </div>
                                    <div>
                                        <button class="btn btn-primary find-job-btn">Find Job</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('images/home-banner-gif.gif') }}" class="w-80 mx-auto"
                                alt="home banner gif" />
                        </div>

                    </div>
                </div>
                <div class="banner-sub-section mt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon top-copanies-icon-bg">
                                        <img src="{{ asset('images/top-companies-icon.svg') }}" alt="Top Copanies Icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Top Companies</h6>
                                        <p class="label-content">{{ $companies->count()}} Companies</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon">
                                        <img src="{{ asset('images/briefcase-icon.svg') }}" alt="Top Copanies Icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Best Job Opportunity</h6>
                                        <p class="label-content">{{ $totalPositions }} Job vacancies</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon">
                                        <img src="{{ asset('images/briefcase-icon.svg') }}" alt="Top Copanies Icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Trending News</h6>
                                        <p class="label-content">Job opportunity news</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
           @include('auth.trusted-companies') 
            <div class="flow-chart-web mb-4">
                <div class="col-12 flow-chat-section">
                    <h2 class="banner-main-title mb-5 text-center">How Skill Launches work</h2>
                    <ul class="flow-section-list">
                        <li class="pos-rel">
                            <div class="flow-section">
                                <img src="{{ asset('images/create-account-icon.svg') }}" alt="create account" />
                                <h6>1. Create account</h6>
                                <p class="flow-chat-content">
                                    Aliquam facilisis egestas sapien, nec tempor leo tristique at.
                                </p>
                            </div>
                        </li>
                        <li class="pos-rel">
                            <div class="flow-section">
                                <img src="{{ asset('images/upload-cv-icon.svg') }}" alt="upload CV" />
                                <h6>2. Upload CV/Resume</h6>
                                <p class="flow-chat-content">
                                    Curabitur sit amet maximus ligula. Nam a nulla ante. Nam sodales
                                </p>
                            </div>
                        </li>
                        <li class="pos-rel">
                            <div class="flow-section">
                                <img src="{{ asset('images/fin-job-icon.svg') }}" alt="Find Job" />
                                <h6>3. Find suitable job</h6>
                                <p class="flow-chat-content">
                                    Phasellus quis eleifend ex. Morbi nec fringilla nibh.
                                </p>
                            </div>
                        </li>
                        <li class="pos-rel">
                            <div class="flow-section">
                                <img src="{{ asset('images/apply-job-icon.svg') }}" alt="Appply Job" />
                                <h6>4. Apply job</h6>
                                <p class="flow-chat-content">
                                    Curabitur sit amet maximus ligula. Nam a nulla ante, Nam sodales purus.
                                </p>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="popular-category">
            <div class="container">
                <div class="banner-main-title black-title pb-4">
                    <span>Popular Categories</span>
                    <span class="view-btn">
                        <button type="button" class="btn" onclick="window.location='{{ url('/showallcategories') }}'">
                            View All
                            <img src="{{ asset('images/view-arrow.svg') }}" alt="View arrow">
                        </button>
                    </span>
                </div>
                <div class="row">
                    @include('categories-list')
                </div>
            </div>
        </div>
        <div class="container my-4">
            <div class="banner-main-title black-title pb-4">
                <span>Featured jobs</span>
                <span class="view-btn"><button class="btn" onclick="window.location='{{ url('/showallactivejobs') }}'">Show All Jobs <img
                            src="{{ asset('images/view-arrow.svg') }}" /></button></span>
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
        <!--Testimonial Code For Desktop -- START -->
        <div class="testimonial-section desk-view">
            <div class="banner-main-title black-title pb-4 text-center">Clients Testimonial</div>
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="container">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-item-custom">
                                <div class="testimonial-card">
                                    <div class="star-header">
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                    </div>
                                    <p class="testimonial">
                                        “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                        metus, in faucibus est.”
                                    </p>
                                    <div class="testimonial-footer">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/client.svg') }}" />
                                            <div class="align-self-center">
                                                <p class="client-name">Robert Fox</p>
                                                <span class="client-designation">UI/UX Designer</span>
                                            </div>
                                        </div>
                                        <div>
                                            <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}"
                                                alt="Quote" />
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-card">
                                    <div class="star-header">
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                    </div>
                                    <p class="testimonial">
                                        “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                        metus, in faucibus est.”
                                    </p>
                                    <div class="testimonial-footer">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/client.svg') }}" />
                                            <div class="align-self-center">
                                                <p class="client-name">Robert Fox</p>
                                                <span class="client-designation">UI/UX Designer</span>
                                            </div>
                                        </div>
                                        <div>
                                            <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}"
                                                alt="Quote" />
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-card">
                                    <div class="star-header">
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                    </div>
                                    <p class="testimonial">
                                        “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                        metus, in faucibus est.”
                                    </p>
                                    <div class="testimonial-footer">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/client.svg') }}" />
                                            <div class="align-self-center">
                                                <p class="client-name">Robert Fox</p>
                                                <span class="client-designation">UI/UX Designer</span>
                                            </div>
                                        </div>
                                        <div>
                                            <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}"
                                                alt="Quote" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-item-custom">
                                <div class="testimonial-card">
                                    <div class="star-header">
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                    </div>
                                    <p class="testimonial">
                                        “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                        metus, in faucibus est.”
                                    </p>
                                    <div class="testimonial-footer">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/client.svg') }}" />
                                            <div class="align-self-center">
                                                <p class="client-name">Robert Fox</p>
                                                <span class="client-designation">UI/UX Designer</span>
                                            </div>
                                        </div>
                                        <div>
                                            <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}"
                                                alt="Quote" />
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-card">
                                    <div class="star-header">
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                    </div>
                                    <p class="testimonial">
                                        “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                        metus, in faucibus est.”
                                    </p>
                                    <div class="testimonial-footer">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/client.svg') }}" />
                                            <div class="align-self-center">
                                                <p class="client-name">Robert Fox</p>
                                                <span class="client-designation">UI/UX Designer</span>
                                            </div>
                                        </div>
                                        <div>
                                            <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}"
                                                alt="Quote" />
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-card">
                                    <div class="star-header">
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                        <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                    </div>
                                    <p class="testimonial">
                                        “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                        metus, in faucibus est.”
                                    </p>
                                    <div class="testimonial-footer">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/client.svg') }}" />
                                            <div class="align-self-center">
                                                <p class="client-name">Robert Fox</p>
                                                <span class="client-designation">UI/UX Designer</span>
                                            </div>
                                        </div>
                                        <div>
                                            <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}"
                                                alt="Quote" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!--Testimonial Code For Desktop -- END -->

        <!--Testimonial Code For Mobile -- START -->
        <div class="testimonial-section mobile-view">
            <div class="banner-main-title black-title pb-4 text-center">Clients Testimonial</div>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="testimonial-card">
                            <div class="star-header">
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                            </div>
                            <p class="testimonial">
                                “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                metus, in faucibus est.”
                            </p>
                            <div class="testimonial-footer">
                                <div class="d-flex">
                                    <img src="{{ asset('images/client.svg') }}" />
                                    <div class="align-self-center">
                                        <p class="client-name">Robert Fox</p>
                                        <span class="client-designation">UI/UX Designer</span>
                                    </div>
                                </div>
                                <div>
                                    <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}" alt="Quote" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial-card">
                            <div class="star-header">
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                            </div>
                            <p class="testimonial">
                                “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                metus, in faucibus est.”
                            </p>
                            <div class="testimonial-footer">
                                <div class="d-flex">
                                    <img src="{{ asset('images/client.svg') }}" />
                                    <div class="align-self-center">
                                        <p class="client-name">Robert Fox</p>
                                        <span class="client-designation">UI/UX Designer</span>
                                    </div>
                                </div>
                                <div>
                                    <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}" alt="Quote" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial-card">
                            <div class="star-header">
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                                <img src="{{ asset('images/testimonial-star.svg') }}" alt="Star" />
                            </div>
                            <p class="testimonial">
                                “Ut ullamcorper hendrerit tempor. Aliquam in rutrum dui. Maecenas ac placerat
                                metus, in faucibus est.”
                            </p>
                            <div class="testimonial-footer">
                                <div class="d-flex">
                                    <img src="{{ asset('images/client.svg') }}" />
                                    <div class="align-self-center">
                                        <p class="client-name">Robert Fox</p>
                                        <span class="client-designation">UI/UX Designer</span>
                                    </div>
                                </div>
                                <div>
                                    <img class="quote-img" src="{{ asset('images/testimonial-quotes.svg') }}" alt="Quote" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!--Testimonial Code For Mobile -- END -->
        <div class="recruitment-experts-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/recruitment-expert-illustration.svg') }}" alt="recruitment image">
                    </div>
                    <div class="col-md-6 my-auto">
                        <h6 class="small-header">Top Recruiters</h6>
                        <h4 class="recruitment-experts-title black-title pb-4 text-center">Recruitment Experts</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon top-copanies-icon-bg">
                                        <img src="{{ asset('images/google-expert.svg') }}" alt="recruitment expert icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Google</h6>
                                        <p class="label-content">16189 Jobs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon top-copanies-icon-bg">
                                        <img src="{{ asset('images/amazon-expert.svg') }}" alt="recruitment expert icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Amazon</h6>
                                        <p class="label-content">3645 Jobss</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon top-copanies-icon-bg">
                                        <img src="{{ asset('images/master-card-expert.svg') }}"
                                            alt="recruitment expert icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Mastercard</h6>
                                        <p class="label-content">1489 Jobs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon top-copanies-icon-bg">
                                        <img src="{{ asset('images/adobe-expert.svg') }}" alt="recruitment expert icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Adobe</h6>
                                        <p class="label-content">675 Jobs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon top-copanies-icon-bg">
                                        <img src="{{ asset('images/nvidia-expert.svg') }}" alt="recruitment expert icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">nVIDIA</h6>
                                        <p class="label-content">1231 Jobs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="home-banner-label">
                                    <div class="label-icon top-copanies-icon-bg">
                                        <img src="{{ asset('images/wipro-expert.svg') }}" alt="recruitment expert icon" />
                                    </div>
                                    <div class="content-space">
                                        <h6 class="sub-title">Wipro</h6>
                                        <p class="label-content">16112589 Jobs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center my-4">
                                <span class="view-btn f-center">
                                    <button class="btn">Browse All Comapnies <img
                                            src="{{ asset('images/view-arrow.svg') }}" /></button>
                                </span>
                            </div>
                        </div>
                    </div>

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