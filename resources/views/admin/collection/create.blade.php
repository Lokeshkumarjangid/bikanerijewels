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
              <form id="quickForm" action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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

                                            @foreach($category as $value)

                                            <option value="{{ $value->id }}">
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
                                <i class="fas fa-image mr-2"></i>First Section
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            First Section Image (Web- 863 x 360)
                                        </label>
                                        <input type="file" name="first_section_web" id="first_section_web" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="first_section_web">
                                            <img class="image-preview" id="preview_first_section_web">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('first_section_web')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            First Section Image (App- 450 × 600)
                                        </label>
                                        <input type="file" name="first_section_mobile" id="first_section_mobile" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="first_section_mobile">
                                            <img class="image-preview" id="preview_first_section_mobile">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('first_section_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-warning mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-align-left mr-2"></i>
                                Second Section
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="second_title" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="4" name="second_description" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Second Section Image (Web- 863 x 360)
                                        </label>
                                        <input type="file" name="second_section_web" id="second_section_web" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="second_section_web">
                                            <img class="image-preview" id="preview_second_section_web">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('second_section_web')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Second Section Image (App- 450 x 600)
                                        </label>
                                        <input type="file" name="second_section_mobile" id="second_section_mobile" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="second_section_mobile">
                                            <img class="image-preview" id="preview_second_section_mobile">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('second_section_mobile')
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
                                <i class="fas fa-video mr-2"></i>
                                Third Section Videos
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Third Section Video (Web- MAX: 4MB)
                                        </label>
                                        <input type="file" name="third_section_web_video" id="third_section_web_video" class="d-none video-input" accept="video/mp4,video/webm,video/ogg">

                                        <div class="image-upload-card" data-input="third_section_web_video">
                                            <video
                                                class="video-preview"
                                                id="preview_third_section_web_video"
                                                controls
                                                style="display:none;width:100%;height:220px;object-fit:cover;">
                                            </video>

                                            <div class="image-upload-body">
                                                <i class="fas fa-video"></i>
                                                <h6>Click to Upload Video</h6>
                                                <p>MP4 WEBM OGG</p>
                                            </div>

                                        </div>
                                        @error('third_section_web_video')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Third Section Video (App-MAX: 1MB)
                                        </label>
                                        <input type="file" name="third_section_mobile_video" id="third_section_mobile_video" class="d-none video-input" accept="video/mp4,video/webm,video/ogg">

                                        <div class="image-upload-card" data-input="third_section_mobile_video">
                                            <video
                                                class="video-preview"
                                                id="preview_third_section_mobile_video"
                                                controls
                                                style="display:none;width:100%;height:220px;object-fit:cover;">
                                            </video>

                                            <div class="image-upload-body">
                                                <i class="fas fa-video"></i>
                                                <h6>Click to Upload Video</h6>
                                                <p>MP4 WEBM OGG</p>
                                            </div>

                                        </div>
                                        @error('third_section_mobile_video')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-warning mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-align-left mr-2"></i>
                                Forth  Section
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="fourth_title" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="4" name="fourth_description" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            Image-1
                                        </label>
                                        <input type="file" name="fourth_image_first" id="fourth_image_first" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="fourth_image_first">
                                            <img class="image-preview" id="preview_fourth_image_first">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('fourth_image_first')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            Image-2
                                        </label>
                                        <input type="file" name="fourth_image_secound" id="fourth_image_secound" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="fourth_image_secound">
                                            <img class="image-preview" id="preview_fourth_image_secound">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('fourth_image_secound')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            Image-3
                                        </label>
                                        <input type="file" name="fourth_image_third" id="fourth_image_third" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="fourth_image_third">
                                            <img class="image-preview" id="preview_fourth_image_third">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('fourth_image_third')
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
                                <i class="fas fa-image mr-2"></i>Five Section
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Five Section Image (Web)
                                        </label>
                                        <input type="file" name="five_section_web" id="five_section_web" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="five_section_web">
                                            <img class="image-preview" id="preview_five_section_web">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('five_section_web')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Five Section Image (App)
                                        </label>
                                        <input type="file" name="five_section_mobile" id="five_section_mobile" class="d-none image-input" accept="image/*">

                                        <div class="image-upload-card" data-input="five_section_mobile">
                                            <img class="image-preview" id="preview_five_section_mobile">
                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>
                                        </div>
                                        @error('five_section_mobile')
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

    $(document).ready(function(){
        $('.image-upload-card').click(function(){
            let input=$(this).data('input');
            $('#'+input).click();
        });
   });

   $(document).ready(function () {

    // Upload Box Click
    $('.image-upload-card').click(function () {

        let input = $(this).data('input');
        $('#' + input).trigger('click');

    });

    // Preview Image
    $('.image-input').change(function () {

        let input = this;

        if (input.files && input.files[0]) {

            let reader = new FileReader();

            reader.onload = function (e) {

                let previewId = '#preview_' + input.id;

                $(previewId).attr('src', e.target.result);

                $(previewId).closest('.image-upload-card').addClass('active');

            }

            reader.readAsDataURL(input.files[0]);

        }

    });

    // Video Preview
    $('.video-input').change(function () {

        let input = this;

        if (input.files && input.files[0]) {

            let url = URL.createObjectURL(input.files[0]);

            let preview = '#preview_' + input.id;

            $(preview).attr('src', url).show();

            $(preview).closest('.image-upload-card').find('.image-upload-body').hide();

        }

    });

});
</script>
@endsection