@include('auth.header')
<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="min-content-section pos-rel">
            <div class="aboutus-banner-section">
                <img src="{{ asset('images/about-us-bg.png') }}" class="w-100 desk-about-img" alt="Desk Image"/>
                <div class="container banner-section">
                    <div class="row">
                        <div class="col-md-6 align-self-center horizontalanimationleft">
                            <p class="banner-sub-content">About Us</p>
                            <h2 class="banner-main-title">About Skill Launches</h2>
                            <p class="banner-sub-content">Welcome to LinkedIn, the world's largest professional network
                                with
                                more than1 billion members in more than 200 countries and territories worldwide.</p>
                        </div>
                        <div class="col-md-6 text-center horizontalanimationright">
                            <img src="{{ asset('images/about-us-header-img.png') }}" class="w-80 about-img"
                                alt="About Us Image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @include('auth.trusted-companies') 
        </div>
        <div class="section-bg">
            <div class="container">
                <div class="col-md-12">
                    <h6 class="sub-title">For more information about our company</h6>
                    <p>
                        Freshersworld is one of the thought leaders in the fresher recruitment space in India.
                        At Freshersworld, it has been our constant
                        endeavour to assist candidates, land their first dream job opportunity and help
                        companies on the other hand, hire the right fresh talent.
                        In short we bridge the gap between employable talent and opportunity for freshers.
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-4 horizontalanimationleft">
                        <div class="about-sub-card">
                            <h6 class="sub-title">Our purpose & values</h6>
                            <p>
                                Our purpose and values outline how we work
                                with customers, partners, and each other as a
                                leading global financial markets infrastructure
                                and data provider.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-sub-card">
                            <h6 class="sub-title">What we do</h6>
                            <p>
                                Five divisions - Data and Analytics, FTSE
                                Russell, Risk Intelligence, Capital Markets and
                                Post Trade - offer LSEG customers access to a
                                global, multi-asset class infrastructure and data
                                ecosystem.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 horizontalanimationright">
                        <div class="about-sub-card">
                            <h6 class="sub-title">Our history</h6>
                            <p>
                                Since 1698, we have been helping customers
                                seize opportunities and create value.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 horizontalanimationleft">
                        <div class="about-sub-card">
                            <h6 class="sub-title">The Board</h6>
                            <p>
                                The LSEG Board is responsible for promoting LSEG's long-term success: its
                                purpose, values and strategy, generating shareholder value and engaging
                                with stakeholders.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 horizontalanimationright">
                        <div class="about-sub-card">
                            <h6 class="sub-title">The Executive Committee</h6>
                            <p>
                                Managing the business day-to-day, the ExCo meets regularly to review
                                financial performance, develop strategy, set and monitor performance
                                targets, and discuss projects, corporate culture and other initiatives.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mt-4">
            <div class="who-are-we-section">
                <div class="card about-card">
                    <div class="row">
                        <div class="col-md-6 horizontalanimationleft">
                            <h6 class="sub-title">Who are we?</h6>
                            <p>
                                Freshersworld is one of the thought leaders in the fresher recruitment space in India.
                                At Freshersworld, it has been our constant
                                endeavour to assist candidates, land their first dream job opportunity and help
                                companies on the other hand, hire the right fresh talent.
                                In short we bridge the gap between employable talent and opportunity for freshers.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="about-right-block pos-rel">
                                <div class="hired-score-card">
                                    <img src="{{ asset('images/polls-icon.svg') }}" alt="Polls Image"/>
                                    <h6 class="hired-score-value">100k+</h6>
                                    <p class="hired-text">People got hired</p>
                                </div>
                                <div class="about-testimony-img">
                                    <img src="{{ asset('images/about-us-men.png') }}" alt="About image"/>
                                </div>
                                <div class="pos-rel horizontalanimationright">
                                    <div class="about-testimony-card">
                                        <div class="testimony-user-img">
                                            <img src="{{ asset('images/testimony-user-img.svg') }}"
                                                alt="Testimony User Image" />
                                        </div>
                                        <p class="name">
                                            Adam Sandler
                                        </p>
                                        <p class="designation">Lead Engineer at Canva</p>
                                        <p class="testimony-content">“Great platform for the job seeker that searching
                                            for new career heights.”</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 horizontalanimationleft">
                        <img src="{{ asset('images/business-object-image.svg') }}" class="w-70 m-auto"
                            alt="Buniess Object Image" />
                    </div>
                    <div class="col-md-6 my-auto horizontalanimationright">
                        <div class="business-object">
                            <p class="business-obj-content">
                                “As a business committed to supporting families, Harkla has generously provided multiple
                                scholarships so that children with autism and ADHD can attend our summer camp at the UW
                                Autism
                                Center. We're grateful for Harkla's support!”
                            </p>
                            <p class="business-obj-sub-text">Benjamin Aaronson, PhD
                                Director, APEX Summer Camp Program
                                University of Washington Autism Center</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="skill-launches-team">
            <h6 class="sub-title horizontalanimationleft">Our Team Of Skill Launches</h6>
            <p class="horizontalanimationright">We work with experts in the special needs world to bring you high-quality, helpful advice on the</p>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-3 team-member-details">
                        <div class="card">
                            <img src="{{ asset('images/team-member-1.png') }}" alt="Team member" />
                            <p class="team-member-name">Dr. Cara Koscinski</p>
                            <p class="team-member-designatiion">OTD, MOT, OTR/L</p>
                        </div>
                    </div>
                    <div class="col-md-3 team-member-details">
                        <div class="card">
                            <img src="{{ asset('images/team-member-2.png') }}" alt="Team member" />
                            <p class="team-member-name">Shea Brogren</p>
                            <p class="team-member-designatiion">MOT, OTR/L</p>
                        </div>
                    </div>
                    <div class="col-md-3 team-member-details">
                        <div class="card">
                            <img src="{{ asset('images/team-member-3.png') }}" alt="Team member" />
                            <p class="team-member-name">Molly Shaw Wilson</p>
                            <p class="team-member-designatiion">MS OTR/L, BCP</p>
                        </div>
                    </div>
                    <div class="col-md-3 team-member-details">
                        <div class="card">
                            <img src="{{ asset('images/team-member-4.png') }}" alt="Team member" />
                            <p class="team-member-name">Alescia Ford-Lanza</p>
                            <p class="team-member-designatiion">MS OTR/L, ATP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="holded-values">
            <div class="container">
                <h6 class="sub-title text-white mb-3 animationbox">The Values We Hold</h6>
                <p class="text-white animationbox">At Harkla, we have a lot of strongly held beliefs on how our company should accomplish our mission.
                </p>
                <div class="row mt-5">
                    <div class="col-md-4 horizontalanimationleft">
                        <h6 class="sub-title text-white">Products should last a lifetime</h6>
                        <p class="text-white">We understand that a lot of the products we
                            make are going to get heavily used in
                            classrooms, therapy, and at home. That's why
                            we spend extra time working to create high-
                            quality, heavy-duty products.</p>
                        <p class="text-white">Since we truly believe they should last a lifetime,
                            we offer a guarantee that lasts a lifetime</p>
                    </div>
                     <div class="col-md-4 animationbox">
                        <h6 class="sub-title text-white">Products should last a lifetime</h6>
                        <p class="text-white">We understand that a lot of the products we
                            make are going to get heavily used in
                            classrooms, therapy, and at home. That's why
                            we spend extra time working to create high-
                            quality, heavy-duty products.</p>
                        <p class="text-white">Since we truly believe they should last a lifetime,
                            we offer a guarantee that lasts a lifetime</p>
                    </div>
                     <div class="col-md-4 horizontalanimationright">
                        <h6 class="sub-title text-white">Products should last a lifetime</h6>
                        <p class="text-white">We understand that a lot of the products we
                            make are going to get heavily used in
                            classrooms, therapy, and at home. That's why
                            we spend extra time working to create high-
                            quality, heavy-duty products.</p>
                        <p class="text-white">Since we truly believe they should last a lifetime,
                            we offer a guarantee that lasts a lifetime</p>
                    </div>
                </div>
            </div>
        </div>
        @include('auth.footer')
    </div>
    @include('auth.footer-script')
</body>

</html>