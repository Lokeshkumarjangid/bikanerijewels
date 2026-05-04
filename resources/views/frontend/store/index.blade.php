@extends('frontend.layouts.app')

@section('title', 'store')
@section('content') 
<style>
    .boutique-section{
    padding:80px 0;
    background:#fff;
}

.section-title{
    text-align:center;
    font-size:26px;
    margin-bottom:60px;
    font-family: 'Playfair Display', serif;
}

/* ROW */
.boutique-row{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:60px;
    margin-bottom:80px;
}

/* REVERSE */
.boutique-row.reverse{
    flex-direction: row-reverse;
}

/* IMAGE */
.boutique-img img{
    width:350px;
    height:350px;
    object-fit:cover;
    border-radius:6px;
}

/* CONTENT */
.boutique-content{
    max-width:300px;
    text-align:center;
}

.boutique-content h5{
    font-size:12px;
    letter-spacing:2px;
    color:#999;
    margin-bottom:10px;
}

.boutique-content h3{
    font-size:20px;
    margin-bottom:10px;
}

.boutique-content p{
    font-size:13px;
    color:#555;
    margin-bottom:10px;
    line-height:1.6;
}

.boutique-content a{
    font-size:12px;
    text-decoration:none;
    border-bottom:1px solid #000;
}

/* MOBILE RESPONSIVE */
@media(max-width:768px){

    .boutique-row{
        flex-direction:column !important;
        text-align:center;
        gap:20px;
    }

    .boutique-img img{
        width:100%;
        height:auto;
    }

    .section-title{
        font-size:20px;
    }
}
</style>
<section class="boutique-section">
    <div class="container">

        <h2 class="section-title">
            Luxury Jewellery Stores in Jaipur & New Delhi
        </h2>

        <!-- ROW 1 -->
        <div class="boutique-row">
            <div class="boutique-img">
                <img src="image1.jpg" alt="">
            </div>
            <div class="boutique-content">
                <h5>OUR JAIPUR BOUTIQUE</h5>
                <h3>Jaipur</h3>
                <p>
                    Shikhar House E-14, Sardar Patel Marg, C-Scheme<br>
                    Jaipur - 302001
                </p>
                <p>+91 12345 67890</p>
                <a href="#">GET DIRECTIONS</a>
            </div>
        </div>

        <!-- ROW 2 -->
        <div class="boutique-row reverse">
            <div class="boutique-img">
                <img src="image2.jpg" alt="">
            </div>
            <div class="boutique-content">
                <h5>OUR DELHI BOUTIQUE</h5>
                <h3>Delhi</h3>
                <p>
                    D-18 Defence Colony,<br>
                    New Delhi - 110024
                </p>
                <p>+91 98765 43210</p>
                <a href="#">GET DIRECTIONS</a>
            </div>
        </div>

        <!-- ROW 3 -->
        <div class="boutique-row">
            <div class="boutique-img">
                <img src="image3.jpg" alt="">
            </div>
            <div class="boutique-content">
                <h5>OUR EMPORIO BOUTIQUE</h5>
                <h3>Delhi</h3>
                <p>
                    DLF Emporio, Vasant Kunj,<br>
                    New Delhi - 110070
                </p>
                <p>+91 99999 88888</p>
                <a href="#">GET DIRECTIONS</a>
            </div>
        </div>

    </div>
</section>
@endsection