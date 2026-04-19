@extends('admin.layouts.app')

@section('title', 'Cms List')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cms List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cms</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="card">
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
@endsection
@section('scripts')
<script>
  $(document).ready(function () {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('cms.index') }}",
        order: [[4, "desc"]],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'title', name: 'title' },
            { data: 'slug', name: 'slug' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', orderable: false, searchable: false },
        ]
    });
  });

  $(document).on('change', '.status-toggle', function () {

    let cmsid = $(this).data('id');

    $.ajax({
        url: "{{ route('cms.status.change') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: cmsid
        },
        success: function (res) {
            if (res.status) {
                toastr.success(res.message);
            } else {
                toastr.error(res.message);
            }
        },
        error: function () {
            toastr.error('Something went wrong');
        }
  });

});
</script>
@endsection