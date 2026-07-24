@extends('frontend.layouts.app')
@section('title', 'Collection')
@section('content')
<section class="collection-banner">
    @if(!empty($collection))
        <!-- Desktop -->
        <div class="collection-banner-web"
             style="background-image:url('{{ asset('storage/'.$collection->first_section_web) }}');">
        </div>

        <!-- Mobile -->
        <div class="collection-banner-mobile"
             style="background-image:url('{{ asset('storage/'.$collection->first_section_mobile) }}');">
        </div>
    @endif
</section>
<section class="collection-story-section">
    <div class="collection-story-wrapper">

        {{-- Left Content --}}
        <div class="collection-story-content">
            <h2>{{ $collection->second_title }}</h2>

            <div class="collection-story-description">
                {!! nl2br(e($collection->second_description)) !!}
            </div>
        </div>

        {{-- Right Full Image --}}
        <div class="collection-story-image">
            <picture>
                <source
                    media="(max-width: 767px)"
                    srcset="{{ asset('storage/'.$collection->second_section_mobile) }}"
                >

                <img
                    src="{{ asset('storage/'.$collection->second_section_web) }}"
                    alt="{{ $collection->second_title }}"
                >
            </picture>
        </div>

    </div>
</section>
<section class="collection-video-section">

    <div class="container">

        <!-- Desktop Video -->
        <div class="collection-video-desktop">
            <video autoplay muted loop playsinline controls>
                <source src="{{ asset('storage/'.$collection->third_section_web_video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </div>
        <!-- Mobile Video -->
        <div class="collection-video-mobile">
            <video autoplay muted loop playsinline controls>
                <source src="{{ asset('storage/'.$collection->third_section_mobile_video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </div>
    </div>
</section>
<section class="collection-fourth-section">

    <div class="container">

        <h2 class="fourth-title">
            {{ $collection->fourth_title }}
        </h2>

        <div class="fourth-images">

            <!-- Left -->
            <div class="left-shape">
                <img src="{{ asset('storage/'.$collection->fourth_image_first) }}" alt="">
            </div>

            <!-- Center -->
            <div class="center-shape">
                <img src="{{ asset('storage/'.$collection->fourth_image_secound) }}" alt="">
            </div>

            <!-- Right -->
            <div class="right-bg">

                <div class="right-shape">
                    <img src="{{ asset('storage/'.$collection->fourth_image_third) }}" alt="">
                </div>

            </div>

        </div>

        <p class="fourth-description">
            {!! nl2br(e($collection->fourth_description)) !!}
        </p>

    </div>

</section>
<section class="visit-image-section">
    <picture>
        <source media="(max-width:767px)"
                srcset="{{ asset('storage/'.$collection->five_section_mobile) }}">

        <img src="{{ asset('storage/'.$collection->five_section_web) }}"
             alt="">
    </picture>
</section>
@include('frontend.common.booking_form')
@include('frontend.common.landingpage')
@endsection