@extends('frontend.layouts.app')

@section('title', 'home')
@section('content') 
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
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                {!! $thirdsection->value !!}
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

                    <div class="story-card">
                        <div class="arch-frame">
                            <img src="{{asset('image/bestsale6.jpg')}}">
                        </div>
                        <h3>Noor</h3>
                    </div>
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
                @if(!empty($bestProducts))
                    @foreach($bestProducts as $value)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="product__item">
                                <a href="{{ route('productdetails', encrypt($value->id)) }}">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$value->firstImage->file_path) }}">
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h6>{{$value->product_name}}</h6>
                                    <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:40px;"></i></a>
                                    <h5><button class="price-request-btn">PRICE ON REQUEST</button></h5>
                                    <!-- <div class="product__color__select">
                                        <label for="pc-1">
                                            <input type="radio" id="pc-1">
                                        </label>
                                        <label class="active black" for="pc-2">
                                            <input type="radio" id="pc-2">
                                        </label>
                                        <label class="grey" for="pc-3">
                                            <input type="radio" id="pc-3">
                                        </label>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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

    <section class="testimonial-section">
        <div class="container">
            <h2 class="testimonial-title">
                STORIES OF GRACE AND <br> GRANDEUR
            </h2>
            <div class="testimonial-slider owl-carousel">
                <div class="testimonial-item">
                    <div class="quote">“
                    </div>
                    <p>
                    Best experience for me as a bride. I did a lot of research pan India but
                    there’s nothing compared to Raniwala in terms of both pricing and design.
                    </p>
                    <div class="testimonial-user">
                        <img src="image/bestsale.jpg">
                        <span>Kuvam</span>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="quote">“
                    </div>
                    <p>
                    Best experience for me as a bride. I did a lot of research pan India but
                    there’s nothing compared to Raniwala in terms of both pricing and design.
                    </p>
                    <div class="testimonial-user">
                        <img src="image/bestsale.jpg">
                        <span>Ravi</span>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="quote">“
                    </div>
                    <p>
                    Best experience for me as a bride. I did a lot of research pan India but
                    there’s nothing compared to Raniwala in terms of both pricing and design.
                    </p>
                    <div class="testimonial-user">
                        <img src="image/bestsale.jpg">
                        <span>Ravi</span>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="quote">“
                    </div>
                    <p>
                    Best experience for me as a bride. I did a lot of research pan India but
                    there’s nothing compared to Raniwala in terms of both pricing and design.
                    </p>
                    <div class="testimonial-user">
                        <img src="image/bestsale.jpg">
                        <span>Ravi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- Categories Section End -->

    <section class="connect-section">
        <div class="container">
            <h2 class="connect-title">LET’S CONNECT</h2>
                <div class="connect-grid">
                    <div class="connect-image">
                        <img src="{{asset('image/letconnect.jpg')}}" alt="">
                    </div>
                    <div class="connect-form">
                        <form>
                            <input type="text" placeholder="Full name*" required>
                            <input type="email" placeholder="Email address*" required>
                            <input type="text" placeholder="Mobile number*" required>
                            <div class="double-input">
                                <input type="date" placeholder="Preferred date">
                                <input type="time" placeholder="Preferred time">
                            </div>
                            <textarea placeholder="How did you hear about us?*"></textarea>
                            <button type="submit">Send</button>

                        </form>
                    </div>

                </div>
        </div>
    </section>
    <br><br>
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