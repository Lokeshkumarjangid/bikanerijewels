@extends('frontend.layouts.app')

@section('title', $data->title)
@section('content') 
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>{{ $data->title }}</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>{{ $data->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop spad">
    <div class="container">
        <div class="row">
                {!! $data->content !!}
        </div>
    </div>
</section>

@endsection