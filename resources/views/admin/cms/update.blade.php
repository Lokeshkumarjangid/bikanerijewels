@extends('admin.layouts.app')

@section('title', 'CMS Update')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">CMS Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">CMS</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update CMS Page</h3>
                </div>

                <form action="{{ route('cms.update', $cms->id) }}" method="POST" enctype="multipart/form-data" id="quickForm">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Title</label>
                          <input type="text" name="title" class="form-control" value="{{ old('title', $cms->title) }}" required>
                          @error('title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="6" id="summernote">{{ old('content', $cms->content) }}</textarea>
                          @error('content')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>

                    <!-- Meta Title -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $cms->meta_title) }}">
                      </div>
                    </div>

                    <!-- Meta Description -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $cms->meta_description) }}</textarea>
                      </div>
                    </div>

                    <!-- Meta Keywords -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $cms->meta_keywords) }}">
                      </div>
                    </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>

                </form>

            </div>

        </div>
    </section>
@endsection
@section('scripts')
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote();

    //validation page
    $('#quickForm').validate({
        rules: {
          title: {
              required: true,
          },
          content: {
            required: true,
          },
        },
        messages: {
          title: {
              required: "Please enter a title",
          },
          content: {
            required: "Please enter content",
          },
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
  })
</script>
@endsection