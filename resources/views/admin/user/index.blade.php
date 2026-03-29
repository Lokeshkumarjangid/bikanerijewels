@extends('admin.layouts.app')

@section('title', 'User List')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User List</h1>
      </div>
    </div>
  </div>
</div>

  <div class="card">
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Business name</th>
            <th>Mobile</th>
            <th>Status</th>
            <th>Created At</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
      </table>
    </div>
  </div>

</section>
@endsection
@section('scripts')
<script>
$(document).ready(function () {

    let table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('user.index') }}",
            data: function (d) {
              
            }
        },
        order: [[5, "desc"]],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'first_name', name: 'first_name' },
            { data: 'email', name: 'email' },
            { data: 'business_name', name: 'business_name' },
            { data: 'mobile', name: 'mobile' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            //{ data: 'action', orderable:false, searchable:false },
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