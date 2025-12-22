@include('admin.header')
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
         @include('admin.sidemenu')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Bulk Post List </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Jobs</li>
                  <li class="breadcrumb-item active" aria-current="page">View</li>
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
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-striped"  id="TableSearch">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>File</th>
                            <th>Total</th>
                            <th>Processed</th>
                            <th>Failed</th>
                            <th>Status</th>
                            <th>Download Failed Rows</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($uploads as $upload)
                            <tr>
                                <td>{{ $upload->id }}</td>
                                <td>{{ basename($upload->file) }}</td>
                                <td>{{ $upload->total_rows }}</td>
                                <td>{{ $upload->processed_rows }}</td>

                                {{-- ✅ FAILED ROWS BUTTON --}}
                                <td>
                                    @if($upload->failed_rows > 0)
                                        <a href="{{ route('job.upload.failures', $upload->id) }}"
                                        class="btn btn-sm btn-danger">
                                            {{ $upload->failed_rows }} Failed
                                        </a>
                                    @else
                                        <span class="badge bg-success">0</span>
                                    @endif
                                </td>

                                <td>
                                    <span class="badge bg-{{ $upload->status === 'completed' ? 'success' : 'warning' }}">
                                        {{ ucfirst($upload->status) }}
                                    </span>
                                </td>

                                <td>
                                    @if($upload->failed_rows > 0)
                                        <a href="{{ route('job.upload.failures.download', $upload->id) }}">
                                            <span class="mdi mdi-download"></span>
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    @if($upload->failed_rows > 0)
                                        <form method="GET"
                                            action="{{ route('job.upload.failures', $upload->id) }}">
                                            @csrf
                                            <button class="btn btn-sm btn-warning">
                                                View Failed Rows
                                            </button>
                                        </form>
                                    @endif
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
          @include('admin.copyright')
        </div>
      </div>
    </div>
    @include('admin.footer-scripts')
  </body>
</html>