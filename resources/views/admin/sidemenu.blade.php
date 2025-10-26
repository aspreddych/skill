<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
            <div class="nav-profile-image">
                <img src="{{ asset('images/dashboard/user.png') }}" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                <span class="text-secondary text-small">{{ Auth::user()->email }}</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        @php
            $jobCategoryRoutes = [
                'job-categories.index',
                'job-categories.create',
                'job-categories.edit',
            ];

            $companyRoutes = [
                'companies.index',
                'companies.create',
                'companies.edit',
            ];

            $jobLocationsRoutes = [
                'job-locations.index',
                'job-locations.create',
                'job-locations.edit',
            ];

            $jobPostsRoutes = [
                'job-posts.index',
                'job-posts.create',
                'job-posts.edit',
            ];
        @endphp

        <!-- Job Categories -->
        <li class="nav-item {{ in_array(Route::currentRouteName(), $jobCategoryRoutes) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-categories"
                aria-expanded="{{ in_array(Route::currentRouteName(), $jobCategoryRoutes) ? 'true' : 'false' }}"
                aria-controls="ui-categories">
                <span class="menu-title">Job Categories</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse {{ in_array(Route::currentRouteName(), $jobCategoryRoutes) ? 'show' : '' }}" id="ui-categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'job-categories.create' ? 'active' : '' }}" href="{{ route('admin.job-categories.create') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['job-categories.index','job-categories.edit']) ? 'active' : '' }}" href="{{ route('job-categories.index') }}">View</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Companies -->
        <li class="nav-item {{ in_array(Route::currentRouteName(), $companyRoutes) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-companies"
                aria-expanded="{{ in_array(Route::currentRouteName(), $companyRoutes) ? 'true' : 'false' }}"
                aria-controls="ui-companies">
                <span class="menu-title">Companies</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-domain menu-icon"></i>
            </a>
            <div class="collapse {{ in_array(Route::currentRouteName(), $companyRoutes) ? 'show' : '' }}" id="ui-companies">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'companies.create' ? 'active' : '' }}" href="{{ route('admin.company.create') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['companies.index','companies.edit']) ? 'active' : '' }}" href="{{ route('companies.index') }}">View</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Job Locations -->
        <li class="nav-item {{ in_array(Route::currentRouteName(), $jobLocationsRoutes) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-locations"
                aria-expanded="{{ in_array(Route::currentRouteName(), $jobLocationsRoutes) ? 'true' : 'false' }}"
                aria-controls="ui-locations">
                <span class="menu-title">Job Locations</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-map-marker menu-icon"></i>
            </a>
            <div class="collapse {{ in_array(Route::currentRouteName(), $jobLocationsRoutes) ? 'show' : '' }}" id="ui-locations">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'job-locations.create' ? 'active' : '' }}" href="{{ route('admin.location.create') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['job-locations.index','job-locations.edit']) ? 'active' : '' }}" href="{{ route('job-locations.index') }}">View</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Job Posts -->
        <li class="nav-item {{ in_array(Route::currentRouteName(), $jobPostsRoutes) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-jobPosts"
                aria-expanded="{{ in_array(Route::currentRouteName(), $jobPostsRoutes) ? 'true' : 'false' }}"
                aria-controls="ui-jobPosts">
                <span class="menu-title">Jobs</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
            <div class="collapse {{ in_array(Route::currentRouteName(), $jobPostsRoutes) ? 'show' : '' }}" id="ui-jobPosts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'job-posts.create' ? 'active' : '' }}" href="{{ route('admin.jobs.create') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['job-posts.index','job-posts.edit']) ? 'active' : '' }}" href="{{ route('job-posts.index') }}">View</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>