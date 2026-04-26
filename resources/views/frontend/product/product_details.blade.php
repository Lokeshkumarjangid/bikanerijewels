@extends('frontend.layouts.app')

@section('title', 'product-details')

@section('content')

<style>
/* MAIN LAYOUT */
.product-main {
    margin-top: 40px;
    align-items: center;
}

/* LEFT SIDE */
.product-left {
    text-align: center;
}

.main-image img {
    width: 100%;
    max-height: 450px;
    object-fit: contain;
    border-radius: 10px;
}

.thumb-images {
    display: flex;
    gap: 10px;
    margin-top: 15px;
    justify-content: center;
}

.thumb-images img {
    width: 70px;
    height: 70px;
    cursor: pointer;
    border-radius: 6px;
    border: 1px solid #ddd;
    padding: 3px;
    background: #fff;
}

/* RIGHT SIDE */
.product-right {
    padding: 20px;
}

.product-right h2 {
    font-size: 28px;
    font-weight: 600;
}

.price {
    color: #e60023;
    margin: 15px 0;
    font-size: 24px;
}

/* BUTTON */
.whatsapp-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 25px;
    background: #25D366;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
}

.whatsapp-btn:hover {
    background: #1ebe5d;
}

/* TABS */
.product-tabs {
    margin-top: 60px;
}

.product-tabs ul {
    display: flex;
    gap: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.product-tabs ul li {
    cursor: pointer;
    font-weight: 600;
}

.tab-content {
    margin-top: 20px;
}

/* MAIN BOX */
.product-specs {
    margin-top: 25px;
}

/* EACH SECTION */
.spec-box {
    margin-bottom: 18px;
}

.spec-box h6 {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #555;
}

/* OPTIONS */
.spec-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

/* CHIP STYLE (UPGRADED) */
.chip {
    padding: 8px 16px;
    border-radius: 25px;
    background: #f4f4f4;
    border: 1px solid #ddd;
    font-size: 13px;
    cursor: pointer;
    transition: 0.3s;
}

/* HOVER */
.chip:hover {
    background: #000;
    color: #fff;
    border-color: #000;
}

/* ACTIVE */
.chip.active {
    background: #ff6a00;
    color: #fff;
    border-color: #ff6a00;
}

/* WEIGHT CARD */
.weight-box {
    display: flex;
    gap: 15px;
    margin-top: 10px;
}

.weight-item {
    flex: 1;
    background: #f8fbff;
    border: 1px solid #dbeeff;
    padding: 12px;
    border-radius: 10px;
    text-align: center;
}

.weight-item span {
    display: block;
    font-size: 12px;
    color: #666;
}

.weight-item strong {
    font-size: 16px;
    color: #007bff;
}

/* MOBILE */
@media (max-width: 768px) {
    .product-main {
        flex-direction: column;
    }

    .product-right {
        text-align: center;
        margin-top: 20px;
    }

    .thumb-images {
        flex-wrap: wrap;
    }
}
</style>

 <div class="product__details__pic">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product__details__breadcrumb">
                    <a href="./index.html">Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Product Details</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="shop-details">
    <div class="container">

        <!-- PRODUCT SECTION -->
        <div class="row product-main">

            <!-- LEFT (IMAGES) -->
            <div class="col-lg-6 col-md-12">
                <div class="product-left">

                    <div class="main-image">
                        <img id="mainProductImage"
                             src="{{ asset('storage/'.$product_details->images[0]->file_path) }}">
                    </div>

                    <div class="thumb-images">
                        @foreach($product_details->images as $image)
                            <img src="{{ asset('storage/'.$image->file_path) }}"
                                 onclick="changeImage(this)">
                        @endforeach
                    </div>

                </div>
            </div>

            <!-- RIGHT (DETAILS) -->
            <div class="col-lg-6 col-md-12">
                <div class="product-right">

                    <h2>{{$product_details->product_name}}</h2>

                    <h3 class="price">₹ {{$product_details->price ?? '0.00'}}</h3>

                    <p><strong>SKU:</strong> {{$product_details->sku}}</p>
                    <p><strong>Category:</strong> {{$product_details->categroy->name}}</p>

                    <div class="product-specs">

    <!-- COLOR -->
    <div class="spec-box">
        <h6>Color</h6>
        <div class="spec-options">
            @foreach(explode(',', $product_details->colour) as $color)
                <span class="chip">{{$color}}</span>
            @endforeach
        </div>
    </div>

    <!-- METAL TYPE -->
    <div class="spec-box">
        <h6>Metal Type</h6>
        <div class="spec-options">
            @foreach(explode(',', $product_details->metal_type) as $metal)
                <span class="chip">{{$metal}}</span>
            @endforeach
        </div>
    </div>

    <!-- METAL FINISH -->
    <div class="spec-box">
        <h6>Metal Finish</h6>
        <div class="spec-options">
            @foreach(explode(',', $product_details->metal_finish ?? '') as $finish)
                <span class="chip">{{$finish}}</span>
            @endforeach
        </div>
    </div>

    <!-- WEIGHT BOX -->
    <div class="weight-box">
        <div class="weight-item">
            <span>Gross Weight</span>
            <strong>{{$product_details->gross_weight ?? '0'}} g</strong>
        </div>

        <div class="weight-item">
            <span>Net Weight</span>
            <strong>{{$product_details->net_weight ?? '0'}} g</strong>
        </div>
    </div>

</div>

                    <!-- WhatsApp Order Button -->
                    <a href="https://wa.me/91XXXXXXXXXX?text=I want this product: {{$product_details->product_name}}"
                       target="_blank"
                       class="whatsapp-btn">
                        Order on WhatsApp
                    </a>

                </div>
            </div>

        </div>

       <div class="row">
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                            role="tab">Description</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                            Previews(5)</a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-5" role="tabpanel">
                            <div class="product__details__tab__content">
                                <div class="product__details__tab__content__item">
                                    <h5>Diamond Details</h5>
                                    <p>{{$product_details->diamond_details ?? ''}}</p>
                                </div>
                                <div class="product__details__tab__content__item">
                                    <h5>Stone Details</h5>
                                    <p>{{$product_details->stone_details ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-6" role="tabpanel">
                            <div class="product__details__tab__content">
                                <div class="product__details__tab__content__item">
                                    <h5>Products Infomation</h5>
                                    <p>A Pocket PC is a handheld computer, which features many of the same
                                        capabilities as a modern PC. These handy little devices allow
                                        individuals to retrieve and store e-mail messages, create a contact
                                        file, coordinate appointments, surf the internet, exchange text messages
                                        and more. Every product that is labeled as a Pocket PC must be
                                        accompanied with specific software to operate the unit and must feature
                                    a touchscreen and touchpad.</p>
                                    <p>As is the case with any new technology product, the cost of a Pocket PC
                                        was substantial during it’s early release. For approximately $700.00,
                                        consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                        These days, customers are finding that prices have become much more
                                        reasonable now that the newness is wearing off. For approximately
                                    $350.00, a new Pocket PC can now be purchased.</p>
                                </div>
                                <div class="product__details__tab__content__item">
                                    <h5>Material used</h5>
                                    <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                        from synthetic materials, not natural like wool. Polyester suits become
                                        creased easily and are known for not being breathable. Polyester suits
                                        tend to have a shine to them compared to wool and cotton suits, this can
                                        make the suit look cheap. The texture of velvet is luxurious and
                                        breathable. Velvet is a great choice for dinner party jacket and can be
                                    worn all year round.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-7" role="tabpanel">
                            <div class="product__details__tab__content">
                                <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                    solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                    ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                pharetras loremos.</p>
                                <div class="product__details__tab__content__item">
                                    <h5>Products Infomation</h5>
                                    <p>A Pocket PC is a handheld computer, which features many of the same
                                        capabilities as a modern PC. These handy little devices allow
                                        individuals to retrieve and store e-mail messages, create a contact
                                        file, coordinate appointments, surf the internet, exchange text messages
                                        and more. Every product that is labeled as a Pocket PC must be
                                        accompanied with specific software to operate the unit and must feature
                                    a touchscreen and touchpad.</p>
                                    <p>As is the case with any new technology product, the cost of a Pocket PC
                                        was substantial during it’s early release. For approximately $700.00,
                                        consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                        These days, customers are finding that prices have become much more
                                        reasonable now that the newness is wearing off. For approximately
                                    $350.00, a new Pocket PC can now be purchased.</p>
                                </div>
                                <div class="product__details__tab__content__item">
                                    <h5>Material used</h5>
                                    <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                        from synthetic materials, not natural like wool. Polyester suits become
                                        creased easily and are known for not being breathable. Polyester suits
                                        tend to have a shine to them compared to wool and cotton suits, this can
                                        make the suit look cheap. The texture of velvet is luxurious and
                                        breathable. Velvet is a great choice for dinner party jacket and can be
                                    worn all year round.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            @if(!empty($related_product))
                @foreach($related_product as $value)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$value->firstImage->file_path) }}">
                                <!-- <span class="label">New</span>
                                <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                </ul> -->
                            </div>
                            <div class="product__item__text">
                                <h6>{{$value->product_name}}</h6>
                                <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:30px;"></i></a>
                                <!-- <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div> -->
                                <h5>{{$value->price}}</h5>
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

<script>
function changeImage(element) {
    document.getElementById("mainProductImage").src = element.src;
}

function openTab(tab) {
    document.getElementById('desc').style.display = 'none';
    document.getElementById('info').style.display = 'none';
    document.getElementById(tab).style.display = 'block';
}

document.querySelectorAll('.chip').forEach(chip => {
    chip.addEventListener('click', function () {
        this.parentElement.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>

@endsection