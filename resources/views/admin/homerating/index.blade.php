@extends('admin.layouts.app')

@section('title', 'Home rating')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home rating List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home rating</li>
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
                    <th>User name</th>
                    <th>Description</th>
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
        ajax: "{{ route('home-rating.index') }}",
        order: [[3, "desc"]],
        columns: [
            { data: 'DT_RowIndex',  name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'user_name', name: 'user_name' },
            { data: 'description',         name: 'description' },
            { data: 'created_at',   name: 'created_at' },
            { data: 'action',       name: 'action', orderable: false, searchable: false },
        ]
    });
  });

    // DELETE CLICK
    $(document).on('click', '.deleteBtn', function () {
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "/admin/home-rating/" + id,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {

                        Swal.fire(
                            'Deleted!',
                            'Record has been deleted.',
                            'success'
                        );

                        $('#table').DataTable().ajax.reload();
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });

            }
        });
    });
</script>
@endsection