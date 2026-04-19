@extends('admin.layouts.app')

@section('title', 'Category Update')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                      <label for="categoryName">Navigation Name</label>
                      <select class="form-control" name='navigation_id'>
                      <option value=''>Please select</option>
                      @if(!empty($navigation))
                          @foreach($navigation as $value)
                              <option value='{{$value->id}}' {{ $category->navigation_id == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                          @endforeach
                      @endif
                      </select>
                      @error('navigation_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" name="name" class="form-control" id="categoryName" placeholder="Category Name" value="{{ $category->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
<script>
    $(function () {
    $('#quickForm').validate({
        rules: {
        name: {
            required: true,
        },
        navigation_id: {
            required: true,
        }
        },
        messages: {
        name: {
            required: "Please enter a category name",
        },
        navigation_id: {
            required: "Please select a navigation name",
        }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
           $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    });
</script>
@endsection