@include('auth.header')

<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        <div class="min-content-section">
            <div class="popular-category">
                <div class="container">
                    <div class="banner-main-title black-title pb-4">
                        <span>List of All Categories</span>
                    </div>
                    <div class="row">
                        @include('categories-list')
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