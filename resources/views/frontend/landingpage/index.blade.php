@extends('frontend.layouts.app')

@section('title', 'customize')
@section('content') 

<style>

body{
    background:#f7f5f2;
}

/* SECTION */
.section{
    max-width:900px;
    margin:60px auto;
    text-align:center;
    padding:0 20px;
}

.section h2{
    font-family:'Playfair Display', serif;
    font-size:26px;
    margin-bottom:15px;
}

.section p{
    font-size:14px;
    line-height:1.7;
    color:#777;
    margin-bottom:30px;
}

/* IMAGE */
.image-box img{
    width:100%;
    max-width:350px;
}

/* BUTTON */
.btn{
    margin-top:20px;
    display:inline-block;
    padding:10px 25px;
    border:1px solid #c9a36a;
    color:#c9a36a;
    font-size:12px;
    text-decoration:none;
}

/* HERO FULL IMAGE */
.hero{
    margin-top:60px;
}

.hero img{
    width:100%;
    height:80vh;
    object-fit:cover;
}

/* FIX CONTAINER */
.explore-section{
    padding:70px 0;
    background:#f7f5f2;
}

.section-title{
    font-family:'Playfair Display', serif;
    font-size:28px;
}

/* CARD FIX */
.luxury-card{
    background:#fff;
    text-align:center;
}

/* IMAGE FIX (IMPORTANT) */
.luxury-img{
    width:100%;
    height:320px;
    overflow:hidden;
}

.luxury-img img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.luxury-content{
    padding:15px;
}

.luxury-content h4{
    font-size:15px;
    font-family:'Playfair Display', serif;
    height:40px;
    overflow:hidden;
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
}

/* BUTTON */
.explore-btn{
    border:1px solid #c9a36a;
    padding:6px 14px;
    font-size:12px;
    background:transparent;
    color:#c9a36a;
}

/* RESPONSIVE */
@media(max-width:768px){

    nav{
        display:flex;
        flex-wrap:wrap;
        justify-content:center;
    }

    nav a{
        margin:5px 10px;
    }

    .hero img{
        height:50vh;
    }

    .section{
        margin:40px auto;
    }
}

</style>

<!-- SECTION 1 -->
<section class="section">
    <h2>The Origin – Mitti (Rooted Beginnings)</h2>
    <p>
        Experience the raw, unfiltered essence of Rajasthan — sun-warmed earth, sandstone architecture, and the quiet strength of legacy. The jewellery is crafted in Polki, rubies, and gold, these pieces carry a certain weight — both visually and culturally. Designed for the bride who honors where she comes from, these are anchoring pieces — meant to ground the look, much like Mitti grounds identity. Strong, timeless, and unapologetically rooted.
    </p>

    <div class="image-box">
        <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638" alt="">
    </div>

    <a href="#" class="btn">PRICE ON REQUEST</a>
</section>

<!-- SECTION 2 -->
<section class="section">
    <h2>The Reflection – Meher</h2>
    <p>
        Grace reveals itself in intricate details. Layered pearls, delicate emeralds
        and designs that flow seamlessly from tradition to contemporary styling.
    </p>

    <div class="image-box">
        <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638" alt="">
    </div>

    <a href="#" class="btn">PRICE ON REQUEST</a>
</section>

<!-- FULL WIDTH HERO -->
<section class="hero">
    <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519" alt="">
</section>

<!-- SECTION 2 -->
<section class="section">
    <h2>The Reflection – Meher</h2>
    <p>
        Grace reveals itself in intricate details. Layered pearls, delicate emeralds
        and designs that flow seamlessly from tradition to contemporary styling.
    </p>

    <div class="image-box">
        <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638" alt="">
    </div>

    <a href="#" class="btn">PRICE ON REQUEST</a>
</section>

<!-- FULL WIDTH HERO -->
<section class="hero">
    <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519" alt="">
</section>

<section class="explore-section">

    <div class="container text-center">
        <h2 class="section-title">EXPLORE MORE</h2>
        <p class="section-desc">
            Step into a world where tradition meets innovation.
        </p>
    </div>

    <div class="container"> <!-- IMPORTANT -->
        <div class="testimonial-sliders owl-carousel">

            @foreach($bestProducts as $value)
            <div class="item">
                <div class="luxury-card">

                    <div class="luxury-img">
                        <img src="{{ asset('storage/'.$value->firstImage->file_path) }}">
                    </div>

                    <div class="luxury-content">
                        <h4>{{$value->product_name}}</h4>
                        <p>Luxury Jewellery</p>
                        <button class="explore-btn">EXPLORE</button>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>

</section>
@endsection

