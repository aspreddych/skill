@include('admin.header')
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
         @include('admin.sidemenu')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> View Job Locations </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Locations</li>
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
                          <th>#</th><th>Name</th><th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>{{ $location->id }}</td>
                                <td>{{ $location->name }}</td>
                                <td>
                                    <a href="{{ route('job-locations.edit', $location->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('job-locations.destroy', $location->id) }}" method="POST" style="display:inline-block;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure want to delete this location?')"><i class="fa fa-trash-o"></i></button>
                                    </form>
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