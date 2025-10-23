@include('auth.header')

<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="min-content-section">
            <div class="home-banner-section pt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 home my-auto">
                            <h2 class="banner-main-title">Login to <strong>Skill Launches</strong></h2>
                            <p class="banner-sub-content">
                                Aliquam vitae turpis in diam convallis finibus in at risus. <br />Nullam in scelerisque
                                leo, eget sollicitudin velit bestibulum.
                            </p>

                            <div class="search-section">
                                <div class="login-form">
                                    <!-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <div>{{ $error }}</div>
                                            @endforeach
                                        </div>
                                    @endif -->
                                    @if ($errors->any())
                                        <div id="toast" class="toast-alert">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    <form method="post" action="{{ url('/login') }}">
                                    @csrf       
                                        <div class="form-field">
                                            <img src="{{ asset('images/user-icon.svg') }}" alt="User icon" class="field-icon" />
                                            <input type="email" name="email" class="form-control" placeholder="Email" required />
                                        </div>

                                        <div class="form-field">
                                            <img src="{{ asset('images/password-icon.svg') }}" alt="Password icon" class="field-icon" />
                                            <input type="password" name="password" class="form-control" placeholder="Password" required />
                                        </div>

                                        <button type="submit" class="btn btn-primary login-btn">Login</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('images/home-banner-gif.gif') }}" class="w-80 mx-auto"
                                alt="home banner gif" />
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    const toast = document.getElementById("toast");
    if (toast) {
        // Show toast
        setTimeout(() => toast.classList.add("show"), 100);
        // Hide toast after 3 seconds
        setTimeout(() => toast.classList.remove("show"), 3000);
    }
});
</script>
</html>