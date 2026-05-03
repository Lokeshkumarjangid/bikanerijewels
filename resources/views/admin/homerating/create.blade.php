@extends('admin.layouts.app')

@section('title', 'Home rating')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Home rating Add</h1>
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
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Home rating</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('home-rating.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" name="user_name" class="form-control" id="userName" placeholder="User Name">
                    @error('user_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="descriptionName">Description</label>
                    <textarea type="text" name="description" class="form-control" id="descriptionName" placeholder="Description"></textarea>
                    @error('description')
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
        user_name: {
            required: true,
        },
        description: {
            required: true,
        }
        },
        messages: {
        user_name: {
            required: "Please enter a user name",
        },
        description: {
            required: "Please enter a description",
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