@extends('admin.layouts.app')

@section('title', 'General Settings')

@section('content')
<style>
.image-upload-card {
    position: relative;
    width: 100%;
    height: 250px;
    border: 2px dashed #ced4da;
    border-radius: 10px;
    background: #f8f9fa;
    cursor: pointer;
    transition: .3s;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-upload-card:hover {
    border-color: #007bff;
    background: #f1f8ff;
}

.image-upload-card .image-preview {
    display: none;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.image-upload-card.active .image-preview {
    display: block;
}

.image-upload-card.active .image-upload-body {
    display: none;
}

.image-upload-body {
    text-align: center;
    color: #6c757d;
}

.image-upload-body i {
    font-size: 35px;
    margin-bottom: 10px;
}

.image-upload-body h6 {
    margin-bottom: 5px;
}

.image-upload-body p {
    margin: 0;
    font-size: 13px;
}
</style>

<div class="content-header">
    <div class="container-fluid">
        <h1>General Settings</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Settings</h3>
            </div>

            <form action="{{ route('settingsupdate') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    {{-- Video --}}
                    <div class="form-group">
                        <label>Desktop Home Page Video (Max 5MB)</label>
                        <input type="file" name="web_home_video" class="form-control" accept="video/mp4" onchange="previewVideo(event)">
                        @error('web_home_video')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if(!empty($setting[0]['value']) && $setting[0]['key'] == 'web_home_video')
                            <div class="mt-2">
                                <video id="videoPreview" width="300" controls>
                                    <source src="{{ asset('storage/'.$setting[0]['value']) }}" type="video/mp4">
                                </video>
                            </div>
                        @else
                            <video id="videoPreview" width="300" controls style="display:none;"></video>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Mobile Home Page Video (Max 1MB)</label>
                        <input type="file" name="mob_home_video" class="form-control" accept="video/mp4" onchange="previewVideo(event)">
                        @error('mob_home_video')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if(!empty($setting[1]['value']) && $setting[1]['key'] == 'mob_home_video')
                            <div class="mt-2">
                                <video id="videoPreview" width="300" controls>
                                    <source src="{{ asset('storage/'.$setting[1]['value']) }}" type="video/mp4">
                                </video>
                            </div>
                        @else
                            <video id="videoPreview" width="300" controls style="display:none;"></video>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>Home Third section</label>
                        <textarea name="home_third_section" class="form-control" rows="6" id="summernote">{{$setting[2]['value']}}</textarea>
                        @error('mob_home_video')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Home fourth section</label>
                        <textarea name="home_fourth_section" class="form-control" rows="6" id="summernotefourth">{{$setting[3]['value']}}</textarea>
                        @error('home_fourth_section')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label>Home Six section</label>
                        <textarea name="home_six_section" class="form-control" rows="6" id="summernotesix">{{$setting[4]['value']}}</textarea>
                        @error('home_six_section')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> -->

                    <div class="card card-outline card-success mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-image mr-2"></i>
                                Home Six section
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                {{-- WEB IMAGE --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Web Image (863 x 360)</label>

                                        <input
                                            type="file"
                                            name="home_six_section"
                                            id="home_six_section"
                                            class="d-none image-input"
                                            accept="image/*"
                                        >

                                        <div
                                            class="image-upload-card {{ !empty($setting[4]['value']) ? 'active' : '' }}"
                                            data-input="home_six_section"
                                        >

                                            <img
                                                class="image-preview"
                                                id="preview_home_six_section"
                                                src="{{ !empty($setting[4]['value']) ? asset('storage/'.$setting[4]['value']) : '' }}"
                                                alt="Home Six Web Image"
                                            >

                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>

                                        </div>

                                        @error('home_six_section')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>


                                {{-- MOBILE IMAGE --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Mobile Image (450 x 600)</label>

                                        <input
                                            type="file"
                                            name="home_six_section_mob"
                                            id="home_six_section_mob"
                                            class="d-none image-input"
                                            accept="image/*"
                                        >

                                        <div
                                            class="image-upload-card {{ !empty($setting[6]['value']) ? 'active' : '' }}"
                                            data-input="home_six_section_mob"
                                        >

                                            <img
                                                class="image-preview"
                                                id="preview_home_six_section_mob"
                                                src="{{ !empty($setting[6]['value']) ? asset('storage/'.$setting[6]['value']) : '' }}"
                                                alt="Home Six Mobile Image"
                                            >

                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>

                                        </div>

                                        @error('home_six_section_mob')
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
                                <i class="fas fa-image mr-2"></i>
                                Home Seven section
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                {{-- WEB IMAGE --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Web Image (863 x 360)</label>

                                        <input
                                            type="file"
                                            name="home_seven_section"
                                            id="home_seven_section"
                                            class="d-none image-input"
                                            accept="image/*"
                                        >

                                        <div
                                            class="image-upload-card {{ !empty($setting[5]['value']) ? 'active' : '' }}"
                                            data-input="home_seven_section"
                                        >

                                            <img
                                                class="image-preview"
                                                id="preview_home_seven_section"
                                                src="{{ !empty($setting[5]['value']) ? asset('storage/'.$setting[5]['value']) : '' }}"
                                                alt="Home Seven Web Image"
                                            >

                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>

                                        </div>

                                        @error('home_seven_section')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>


                                {{-- MOBILE IMAGE --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Mobile Image (450 x 600)</label>

                                        <input
                                            type="file"
                                            name="home_seven_section_mob"
                                            id="home_seven_section_mob"
                                            class="d-none image-input"
                                            accept="image/*"
                                        >

                                        <div
                                            class="image-upload-card {{ !empty($setting[7]['value']) ? 'active' : '' }}"
                                            data-input="home_seven_section_mob"
                                        >

                                            <img
                                                class="image-preview"
                                                id="preview_home_seven_section_mob"
                                                src="{{ !empty($setting[7]['value']) ? asset('storage/'.$setting[7]['value']) : '' }}"
                                                alt="Home Seven Mobile Image"
                                            >

                                            <div class="image-upload-body">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <h6>Click to Upload</h6>
                                                <p>PNG JPG</p>
                                            </div>

                                        </div>

                                        @error('home_seven_section_mob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Home eight section</label>
                        <textarea name="home_eight_section" class="form-control" rows="6" id="summernoteeight">{{$setting[8]['value']}}</textarea>
                        @error('home_eight_section')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label>Home Seven section</label>
                        <textarea name="home_seven_section" class="form-control" rows="6" id="summernoteseven">{{$setting[5]['value']}}</textarea>
                        @error('home_seven_section')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> -->

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
    $('#summernotefourth').summernote();
    $('#summernoteeight').summernote();
})
// $(document).ready(function(){
//         $('.image-upload-card').click(function(){
//             let input=$(this).data('input');
//             $('#'+input).click();
//         });
//    });

$(document).ready(function () {

    // Open file selector
    $('.image-upload-card').on('click', function () {

        let inputId = $(this).data('input');

        $('#' + inputId).trigger('click');
    });


    // Image preview
    $('.image-input').on('change', function () {

        let input = this;

        if (input.files && input.files[0]) {

            let reader = new FileReader();

            reader.onload = function (e) {

                let previewId = '#preview_' + input.id;

                $(previewId)
                    .attr('src', e.target.result)
                    .show();

                $(previewId)
                    .closest('.image-upload-card')
                    .addClass('active');
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

});

</script>
@endsection