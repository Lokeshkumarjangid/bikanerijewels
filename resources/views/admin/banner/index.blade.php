@extends('admin.layouts.app')

@section('title', 'Banner List')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Banner List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner</li>
            </ol>
          </div>
          <a href="{{ route('banner.create') }}" class="btn btn-primary ml-2">
      <i class="fas fa-plus"></i> Add Banner
    </a>
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
                    <th>Desktop Image</th>
                    <th>Mobile Image</th>
                    <th>Sort Order</th>
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
        ajax: "{{ route('banner.index') }}",
        order: [[3, "desc"]],
        columns: [
            { data: 'DT_RowIndex',  name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'image_web',         name: 'image_web' },
            { data: 'image_mobile',         name: 'image_mobile' },
            { data: 'sort_order',         name: 'sort_order' },
            { data: 'status',       name: 'status' },
            { data: 'created_at',   name: 'created_at' },
            { data: 'action',       name: 'action', orderable: false, searchable: false },
        ]
    });
  });

  $(document).on('change', '.status-toggle', function () {

    let userId = $(this).data('id');

    $.ajax({
        url: "{{ route('user.status.change') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: userId
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