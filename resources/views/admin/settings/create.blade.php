@extends('admin.layouts.app')

@section('title', 'General Settings')

@section('content')

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

            <form action="{{route('settingsupdate')}}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    {{-- Video --}}
                    <div class="form-group">
                        <label>Home Page Video (Max 4MB)</label>
                        <input type="file" name="home_video" class="form-control" accept="video/mp4" onchange="previewVideo(event)">

                        @if(!empty($settings->home_video))
                            <div class="mt-2">
                                <video id="videoPreview" width="300" controls>
                                    <source src="{{ asset('storage/'.$settings->home_video) }}" type="video/mp4">
                                </video>
                            </div>
                        @else
                            <video id="videoPreview" width="300" controls style="display:none;"></video>
                        @endif
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