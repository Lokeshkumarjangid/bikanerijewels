@extends('admin.layouts.app')

@section('title', 'Banner Add')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Banner Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Banner</li>
                </ol>
            </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Banner</h3>
                </div>

                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        {{-- Desktop Banner --}}
                        <div class="form-group">
                            <label>Desktop Banner (863*360)</label>
                            <input type="file" name="banner_img_web" class="form-control" accept="image/*">
                            @error('banner_img_web')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Banner --}}
                        <div class="form-group">
                            <label>Mobile Banner (450 × 600)</label>
                            <input type="file" name="banner_mob_web" class="form-control" accept="image/*">
                            @error('banner_mob_web')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Sort Order --}}
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                            @error('sort_order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </section>

@endsection
@section('scripts')
<script>
    $(function () {
    $('#quickForm').validate({
        rules: {
            banner_img_web: {
                required: true,
            },
            banner_img_web: {
                required: true,
            },
            sort_order: {
                required: true,
            },
        },
        messages: {
            banner_img_web: {
                required: "Please select dasktop banner",
            },
            banner_img_web: {
                required: "Please select mobile banner",
            },
            sort_order: {
                required: "Please enter a sort order",
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
    });
</script>

@endsection