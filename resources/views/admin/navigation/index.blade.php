@extends('admin.layouts.app')

@section('title', 'Category List')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Navigation List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Navigation</li>
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
                    <th>Name</th>
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
        ajax: "{{ route('navigation.index') }}",
        order: [[3, "desc"]],
        columns: [
            { data: 'DT_RowIndex',  name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'name',         name: 'name' },
            { data: 'created_at',   name: 'created_at' },
            { data: 'action',       name: 'action', orderable: false, searchable: false },
        ]
    });
  });
</script>
@endsection