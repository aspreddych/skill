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
              <h3 class="page-title">Failed Rows (Upload #{{ $uploadId }})</h3>
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
                    <div class="mb-3 d-flex gap-2">
                        <a href="{{ route('job.upload.failures.download', $uploadId) }}"
                        class="btn btn-success">
                            ⬇ Download Failed Rows (CSV)
                        </a>

                        <form method="POST"
                            action="{{ route('job.upload.retry',$uploadId) }}">
                            @csrf
                            <button class="btn btn-warning">
                                🔁 Retry Failed Rows
                            </button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="TableSearch">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Error</th>
                                    <th>Row Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($failures as $failure)
                                    <tr>
                                        <td>{{ $failure->id }}</td>
                                        <td class="text-danger">{{ $failure->error }}</td>
                                        <td>
                                            <pre class="mb-0">{{ json_encode($failure->row_data, JSON_PRETTY_PRINT) }}</pre>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

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