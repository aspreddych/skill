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
              <h3 class="page-title"> Add Bulk Job Post </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Jobs</li>
                  <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    <form action="{{ route('jobs.upload') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label>Email Address to Notify:</label>
                            <input type="email" name="email" class="form-control" required placeholder="you@example.com">
                        </div>

                        <div class="mb-3">
                            <label>Upload Excel File:</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Upload & Process</button>
                    </form>
                  </div>
                </div>
              </div>

              @if(session('upload_id'))
                <div class="progress mt-3">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                        id="uploadProgress"
                        style="width:0%">
                        0%
                    </div>
                </div>

                <p class="mt-2" id="progressText"></p>
              @endif

            </div>
          </div>
        @include('admin.copyright')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.footer-scripts')

@if(session('upload_id'))
<script>
let uploadId = {{ session('upload_id') }};
let interval = setInterval(fetchProgress, 2000);

function fetchProgress() {
    fetch(`/admin/job-upload/${uploadId}/progress`)
        .then(res => res.json())
        .then(data => {
            let percent = data.total_rows > 0
                ? Math.round((data.processed_rows / data.total_rows) * 100)
                : 0;

            document.getElementById('uploadProgress').style.width = percent + '%';
            document.getElementById('uploadProgress').innerText = percent + '%';

            document.getElementById('progressText').innerText =
                `Processed: ${data.processed_rows}/${data.total_rows} | Failed: ${data.failed_rows}`;

            if (data.status === 'completed') {
                clearInterval(interval);
                document.getElementById('progressText').innerText += ' ✅ Completed';
            }
        })
        .catch(() => clearInterval(interval));
}
</script>
@endif

  </body>
</html>