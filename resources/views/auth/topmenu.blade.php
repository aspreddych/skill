<header id="myHeader">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/skill-launches-logo.svg') }}" alt="Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/aboutus') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Customer Supports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contactus') }}">Contact Us</a>
                    </li>
                </ul>
                <!-- <ul class="header-buttons">
                    <button class="btn btn-secondary" type="submit">Sign In</button>
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                </ul> -->
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary" type="button">Admin Login</a>
                @endauth
            </div>
        </div>
    </nav>
</header>