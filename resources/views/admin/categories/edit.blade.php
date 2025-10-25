@include('admin.header')
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        @include('admin.sidemenu')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Edit Category </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Job Categories</li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Category data</h4>
                    <form class="forms-sample" method="post" action="{{ route('job-categories.update', $jobCategory->id) }}">
                       @csrf @method('PUT')
                      <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $jobCategory->name) }}" placeholder="Name" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="4">{{ old('description', $jobCategory->description) }}</textarea>
                      </div>
                    
                      <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                       <a href="{{ route('job-categories.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @include('admin.copyright')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.footer-scripts')
  </body>
</html>