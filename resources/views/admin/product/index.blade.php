@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Product List</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card">
    <div class="card-body">
      <div class="row">

        <div class="col-md-3">
          <input type="text" id="filter_product_name" class="form-control" placeholder="Product Name">
        </div>

        <div class="col-md-3">
          <input type="text" id="filter_sku" class="form-control" placeholder="SKU">
        </div>

        <div class="col-md-2">
          <input type="date" id="from_date" class="form-control">
        </div>

        <div class="col-md-2">
          <input type="date" id="to_date" class="form-control">
        </div>

        <div class="col-md-2">
          <button id="filterBtn" class="btn btn-primary">Filter</button>
          <button id="resetBtn" class="btn btn-secondary">Reset</button>
        </div>

      </div>
    </div>
  </div>

  <!-- 📊 TABLE -->
  <div class="card">
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Product Name</th>
            <th>SKU</th>
            <th>Weight</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
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
            url: "{{ route('product.index') }}",
            data: function (d) {
                d.product_name = $('#filter_product_name').val();
                d.sku = $('#filter_sku').val();
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
            }
        },
        order: [[5, "desc"]],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'product_name', name: 'product_name' },
            { data: 'sku', name: 'sku' },
            { data: 'gross_weight', name: 'gross_weight' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', orderable:false, searchable:false },
        ]
    });

    // 🔍 Filter button
    $('#filterBtn').click(function () {
        table.draw();
    });

    // 🔄 Reset button
    $('#resetBtn').click(function () {
        $('#filter_product_name').val('');
        $('#filter_sku').val('');
        $('#from_date').val('');
        $('#to_date').val('');
        table.draw();
    });

});
</script>
@endsection