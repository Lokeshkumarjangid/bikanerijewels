@extends('admin.layouts.app')

@section('title', 'Collection Add')
@section('content')
<style>
.image-upload-card{
    border:2px dashed #ced4da;
    border-radius:10px;
    background:#f8f9fa;
    cursor:pointer;
    transition:.3s;
    overflow:hidden;
}

.image-upload-card:hover{
    border-color:#007bff;
    background:#eef6ff;
}

.image-upload-body{
    height:220px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    position:relative;
}

.image-upload-body i{
    font-size:50px;
    color:#007bff;
    margin-bottom:10px;
}

.image-upload-body h6{
    margin-bottom:5px;
    font-weight:600;
}

.image-upload-body p{
    margin:0;
    color:#777;
    font-size:13px;
}

.image-preview{

    display:none;

    width:100%;

    height:220px;

    object-fit:cover;

}

.image-upload-card.active .image-preview{

    display:block;

}

.image-upload-card.active .image-upload-body{
    display:none;
}
</style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Collection Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Collection</li>
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
                <h3 class="card-title">Collection</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('house-bikanari.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="card card-outline card-info mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-list mr-2"></i>
                                Category Information
                            </h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Category
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-control" name="category_id">

                                            <option value="">
                                                Select Category
                                            </option>

                                            @foreach($categroy as $value)

                                            <option value="{{ $value->id }}" @if($data->category_id == $value->id) selected @endif>
                                                {{ $value->name }}
                                            </option>

                                            @endforeach

                                        </select>

                                        @error('category_id')

                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>

                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card card-outline card-success mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-image mr-2"></i>First Section (Image Requird: 543*685)
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="section_1" id="first_section_web" class="image-input">
                                        {!! old('section_1', $data->section_1) !!}
                                        </textarea>
                                        @error('section_1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-success mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-image mr-2"></i>Second Section (Image Requird: 509*628)
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="section_2" id="second_section_web" class="image-input">
                                        {!! old('section_2', $data->section_2) !!}
                                        </textarea>
                                        @error('section_2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-success mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-image mr-2"></i>Third Section (Image Requird: 543*685)
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="section_3" id="third_section_web" class="image-input">
                                        {!! old('section_3', $data->section_3) !!}
                                        </textarea>
                                        @error('section_3')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-success mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-image mr-2"></i>Fourth Section
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="section_4" id="fourth_section_web" class="image-input">
                                        {!! old('section_4', $data->section_4) !!}
                                        </textarea>
                                        @error('section_4')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-success mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-image mr-2"></i>Five Section (Image Requird: 439*548)
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="section_5" id="five_section_web" class="image-input">
                                        {!! old('section_5', $data->section_5) !!}
                                        </textarea>
                                        @error('section_5')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
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

            ignore: [],

            rules: {

                category_id: {
                    required: true
                },

                first_section_web: {
                    required: true
                },

                first_section_mobile: {
                    required: true
                },

                second_title: {
                    required: true
                },

                second_description: {
                    required: true
                },

                second_section_web: {
                    required: true
                },

                second_section_mobile: {
                    required: true
                },

                third_section_web_video: {
                    required: true
                },

                third_section_mobile_video: {
                    required: true
                },

                fourth_title: {
                    required: true
                },

                fourth_description: {
                    required: true
                },

                fourth_image_first: {
                    required: true
                },

                fourth_image_secound: {
                    required: true
                },

                fourth_image_third: {
                    required: true
                },

                five_section_web: {
                    required: true
                },

                five_section_mobile: {
                    required: true
                }

            },

            messages: {

                category_id: "Please select category.",

                first_section_web: "Please upload First Section Web Image.",
                first_section_mobile: "Please upload First Section App Image.",

                second_title: "Please enter second section title.",
                second_description: "Please enter second section description.",
                second_section_web: "Please upload Second Section Web Image.",
                second_section_mobile: "Please upload Second Section App Image.",

                third_section_web_video: "Please upload Third Section Web Video.",
                third_section_mobile_video: "Please upload Third Section App Video.",

                fourth_title: "Please enter fourth section title.",
                fourth_description: "Please enter fourth section description.",
                fourth_image_first: "Please upload Image 1.",
                fourth_image_secound: "Please upload Image 2.",
                fourth_image_third: "Please upload Image 3.",

                five_section_web: "Please upload Five Section Web Image.",
                five_section_mobile: "Please upload Five Section App Image."

            },

            errorElement: "span",

            errorPlacement: function (error, element) {

                error.addClass("invalid-feedback d-block");

                if (
                    element.hasClass("image-input") ||
                    element.hasClass("video-input")
                ) {

                    element.closest(".form-group")
                        .find(".image-upload-card")
                        .after(error);

                } else {

                    element.closest(".form-group").append(error);

                }

            },

            highlight: function (element) {

                if (
                    $(element).hasClass("image-input") ||
                    $(element).hasClass("video-input")
                ) {

                    $(element)
                        .closest(".form-group")
                        .find(".image-upload-card")
                        .css({
                            border: "2px dashed #dc3545"
                        });

                } else {

                    $(element).addClass("is-invalid");

                }

            },

            unhighlight: function (element) {

                if (
                    $(element).hasClass("image-input") ||
                    $(element).hasClass("video-input")
                ) {

                    $(element)
                        .closest(".form-group")
                        .find(".image-upload-card")
                        .css({
                            border: "2px dashed #ced4da"
                        });

                } else {

                    $(element).removeClass("is-invalid");

                }

            },

            submitHandler: function (form) {

                form.submit();

            }

        });
    });
    $(function () {
        // Summernote
        $('#first_section_web').summernote();
        $('#second_section_web').summernote();
        $('#third_section_web').summernote();
        $('#fourth_section_web').summernote();
        $('#five_section_web').summernote();
    })
</script>
@endsection