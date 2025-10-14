@include('auth.header')
<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="min-content-section pos-rel">
            <div class="aboutus-banner-section">
                <img src="{{ asset('images/about-us-bg.png') }}" class="w-100 desk-about-img" alt=""/>
                <div class="container banner-section">
                    <div class="row">
                        <div class="col-md-6 align-self-center horizontalanimationleft">
                            <h2 class="banner-main-title">Contact Us</h2>
                            <p class="banner-sub-content">Welcome to LinkedIn, the world's largest professional network
                                with more than 1 billion members in more than 200 countries and territories worldwide.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="container theme-bg">
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-custom-card pos-rel horizontalanimationleft">
                                <h6 class="sub-title">Call US</h6>
                                <p class="contact-card-content">
                                    Call us for corporate queries/ concern<br/>
                                   <strong>0120-635-8222</strong><br/>
                                    Monday to Friday Call 10AM to 6PM
                                </p>
                                <img class="contact-card-img" src="{{ asset('images/contact-us-custom-card-corner-img.svg') }}" alt="card-corner-image"/>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                             <div class="contact-custom-card pos-rel horizontalanimationright">
                                <h6 class="sub-title">Share your Feedback</h6>
                                <p class="contact-card-content">
                                  We love to hear your feedback, it helps us serve you better.<br/>
                                   Share it now!
                                </p>
                                <img class="contact-card-img" src="{{ asset('images/contact-us-custom-card-corner-img.svg') }}" alt="card-corner-image"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pos-rel">
                    <div class="contact-form">
                        <h5 class="contact-card-header">
                            Fill out the form below and we'll get your questions answered.
                        </h5>
                        <div class="form-group">
                            <label for="name">Full Name<span class="required-star">*</span></label>
                            <input class="form-control" type="text" placeholder="Enter Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="name">Email<span class="required-star">*</span></label>
                            <input class="form-control" type="email" placeholder="example@gmail.com" />
                        </div>
                        <div class="form-group">
                            <label for="name">Subject<span class="required-star">*</span></label>
                            <select class="form-select">
                                <option>Select</option>
                                <option>Job For Fresher</option>
                                <option>Job For Experienced</option>
                                <option>Looking For Internship</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Detaiil Description</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="location-section pos-rel mt-5">
            <!-- <img src="../assets/images/location-section-bg.png" class="w-100"/> -->
            <div class="location-content">
                <div class="row mx-0">
                    <div class="col-md-6 contact-address">
                        <h6 class="sub-title text-white horizontalanimationleft">You Can Also Visit Our Office At</h6>
                        <p class="contact-card-content text-white horizontalanimationright">skills launches.comC/o Coolboots Media Pvt Ltd402 ABC 4TH Floor, Centrum Plaza,HR 122002, IndiaEmail: grievance@timesjobs.comPhone No.: 0120-635-8222</p>
                    </div>
                     <div class="col-md-6 text-end pt-5 location-globe px-0">
                        <img class="w-80 horizontalanimationleft" src="{{ asset('images/location-globe.svg') }}" alt="Globe Image"/>
                     </div>
                </div>
            </div>
        </div>
         @include('auth.footer')
    </div>
    @include('auth.footer-script')
</body>

</html>