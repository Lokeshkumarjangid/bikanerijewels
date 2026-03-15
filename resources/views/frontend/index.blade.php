@extends('frontend.layouts.app')

@section('title', 'home')
@section('content') 
<style>
.story-section{
padding:100px 0;
background:url("image/hawamahal.jpg");
background-size:cover;
background-position:center;
text-align:center;
}

.story-title h2{
font-size:40px;
color:#6a4a2f;
margin-bottom:10px;
font-family:serif;
}

.story-title p{
color:#8c7a65;
margin-bottom:15px;
}

.divider{
width:120px;
height:2px;
background:#b58b47;
margin:15px auto 60px;
position:relative;
}

.story-grid{
display:flex;
justify-content:center;
gap:60px;
flex-wrap:wrap;
}

.story-card{
text-align:center;
width:260px;
}

.arch-frame{
width:260px;
height:420px;
border:4px solid #b58b47;
border-radius:140px 140px 20px 20px;
overflow:hidden;
position:relative;
background:#fff;
}

.arch-frame img{
width:100%;
height:100%;
object-fit:cover;
}

.story-card h3{
margin-top:18px;
font-size:20px;
color:#6a4a2f;
}

/* Coming Soon */
.coming img{
filter:blur(5px);
}

.coming-text{
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
color:white;
font-size:24px;
font-weight:500;
}

.heritage-section{
    padding:80px 0;
    background:#faf8f5;
}

.heritage-title{
    font-size:36px;
    font-weight:500;
    color:#7b5a3a;
    margin-bottom:25px;
    font-family: 'Playfair Display', serif;
}

.heritage-text{
    color:#555;
    margin-bottom:15px;
}
</style>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items videosection">
                <video autoplay muted loop playsinline webkit-playsinline class="hero-video">
                    <source src="{{asset('image/thepromise.mp4')}}" type="video/mp4">
                </video>
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <br><br>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="image/banner1.jpg">
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="hero__items set-bg" data-setbg="image/banner2.jpg">
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
       <br><br>
     <section class="heritage-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <h2 class="heritage-title">
                    Where Bikaner's Heritage Becomes Heirlooms
                </h2>

                <p class="heritage-text">
                    Born in the royal city of Bikaner and shaped by decades of expertise, 
                    Bikaneri Jewels stands for timeless design and uncompromising craftsmanship. 
                    Since 1942, our journey has been guided by a deep respect for tradition, 
                    masterful artistry, and a commitment to excellence.
                </p>

                <p class="heritage-text">
                    Every creation reflects our legacy — where heritage inspires elegance 
                    and jewellery becomes an heirloom.
                </p>

            </div>
        </div>
    </div>
</section>
  <br><br>
    <!-- Categroy Section End -->

    <section class="story-section">

<div class="container">

<div class="story-title">
<h2>Where Stories Begins</h2>
<p>Explore Collections that Capture Every Occasion</p>
<div class="divider"></div>
</div>

<div class="story-grid">

<div class="story-card">
<div class="arch-frame">
<img src="{{asset('image/bestsale8.jpg')}}">
</div>
<h3>Ek Jod</h3>
</div>

<div class="story-card">
<div class="arch-frame">
<img src="{{asset('image/bestsale7.jpg')}}">
</div>
<h3>Vanhi</h3>
</div>

<div class="story-card coming">
<div class="arch-frame">
<img src="{{asset('image/bestsale6.jpg')}}">
<div class="coming-text">Coming Soon</div>
</div>
<h3>Noor-E-Azal</h3>
</div>

</div>

</div>
</section>
  <br><br>
    <!-- Categroy Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sale</li>
                        <!-- <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li> -->
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <a href="{{route('product.index')}}">
                            <div class="product__item__pic set-bg" data-setbg="image/bestsale1.jpg">
                                <!-- <span class="label">New</span> -->
                                <!-- <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                </ul> -->
                            </div>
                        </a>
                        <div class="product__item__text">
                            <h6>Celestical Dot 9KT Gold Lab Grown Diamond Necklace</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active black" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                                <label class="grey" for="pc-3">
                                    <input type="radio" id="pc-3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <a href="{{route('product.index')}}">
                            <div class="product__item__pic set-bg" data-setbg="image/bestsale2.jpg">
                                <!-- <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                </ul> -->
                            </div>
                        </a>
                        <div class="product__item__text">
                            <h6>Axis Dot 9KT Gold Lab Grown Diamond Single Stud Earring</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item sale">
                        <a href="{{route('product.index')}}">
                            <div class="product__item__pic set-bg" data-setbg="image/bestsale3.jpg">
                                <!-- <span class="label">Sale</span> -->
                                <!-- <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                </ul> -->
                            </div>
                        </a>
                        <div class="product__item__text">
                            <h6>Hexa Star 9KT Gold Lab Grown Diamond Stud Earring</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>43.48</h5>
                            <div class="product__color__select">
                                <label for="pc-7">
                                    <input type="radio" id="pc-7">
                                </label>
                                <label class="active black" for="pc-8">
                                    <input type="radio" id="pc-8">
                                </label>
                                <label class="grey" for="pc-9">
                                    <input type="radio" id="pc-9">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <a href="{{route('product.index')}}">
                            <div class="product__item__pic set-bg" data-setbg="image/bestsale4.jpg">
                                <!-- <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                </ul> -->
                            </div>
                        </a>
                        <div class="product__item__text">
                            <h6>Square Cluster 9KT Gold Lab Grown Diamond Necklace</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>60.9</h5>
                            <div class="product__color__select">
                                <label for="pc-10">
                                    <input type="radio" id="pc-10">
                                </label>
                                <label class="active black" for="pc-11">
                                    <input type="radio" id="pc-11">
                                </label>
                                <label class="grey" for="pc-12">
                                    <input type="radio" id="pc-12">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="image/bestsale5.jpg">
                            <!-- <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul> -->
                        </div>
                        <div class="product__item__text">
                            <h6>Luna Swing 9KT Gold Lab Grown Diamond Halo Necklace</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>31.37</h5>
                            <div class="product__color__select">
                                <label for="pc-13">
                                    <input type="radio" id="pc-13">
                                </label>
                                <label class="active black" for="pc-14">
                                    <input type="radio" id="pc-14">
                                </label>
                                <label class="grey" for="pc-15">
                                    <input type="radio" id="pc-15">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="image/bestsale6.jpg">
                            <!-- <span class="label">Sale</span> -->
                            <!-- <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul> -->
                        </div>
                        <div class="product__item__text">
                            <h6>Orbit Embrace 9KT Gold Lab Grown Diamond Necklace</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>98.49</h5>
                            <div class="product__color__select">
                                <label for="pc-16">
                                    <input type="radio" id="pc-16">
                                </label>
                                <label class="active black" for="pc-17">
                                    <input type="radio" id="pc-17">
                                </label>
                                <label class="grey" for="pc-18">
                                    <input type="radio" id="pc-18">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="image/bestsale7.jpg">
                            <!-- <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul> -->
                        </div>
                        <div class="product__item__text">
                            <h6>Muse Drop Frame 9KT Gold Lab Grown Diamond Necklace</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>49.66</h5>
                            <div class="product__color__select">
                                <label for="pc-19">
                                    <input type="radio" id="pc-19">
                                </label>
                                <label class="active black" for="pc-20">
                                    <input type="radio" id="pc-20">
                                </label>
                                <label class="grey" for="pc-21">
                                    <input type="radio" id="pc-21">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="image/bestsale8.jpg">
                            <!-- <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul> -->
                        </div>
                        <div class="product__item__text">
                            <h6>Geo Charm 9KT Gold Lab Grown Diamond Necklace</h6>
                            <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>26.28</h5>
                            <div class="product__color__select">
                                <label for="pc-22">
                                    <input type="radio" id="pc-22">
                                </label>
                                <label class="active black" for="pc-23">
                                    <input type="radio" id="pc-23">
                                </label>
                                <label class="grey" for="pc-24">
                                    <input type="radio" id="pc-24">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="image/forbestbanner1.jpg">
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <!-- <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <h3>#Male_Fashion</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <!-- <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>What Curling Irons Are The Best Ones</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Eternity Bands Do Last Forever</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>The Health Benefits Of Sunglasses</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Latest Blog Section End -->
@endsection