@extends('admin.layouts.app')

@section('title', 'Mobile First Page')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1>Mobile First Page</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="card card-primary">

            <form action="{{ route('mobileupdate') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $setting->title ?? '' }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>First Image (157*185)</label>
                        <input type="file" name="first_image" class="form-control" accept="image/*">
                        @error('first_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if(!empty($setting->first_image))
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$setting->first_image) }}" alt="First Image" width="300">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Second Image (157*218)</label>
                        <input type="file" name="second_image" class="form-control" accept="image/*">
                        @error('second_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if(!empty($setting->second_image))
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$setting->second_image) }}" alt="Second Image" width="300">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Third Image (157*218)</label>
                        <input type="file" name="third_image" class="form-control" accept="image/*">
                        @error('third_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if(!empty($setting->third_image))
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$setting->third_image) }}" alt="Third Image" width="300">
                            </div>
                        @endif
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>

    </div>
</section>

@endsection