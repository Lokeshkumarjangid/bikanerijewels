<div class="row">
    @if($product_details->count() > 0)
    @foreach($product_details as $product)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <a href="{{route('productdetails',encrypt($product->id))}}">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$product->firstimage->file_path) }}">
                    </div>
                </a>
                <div class="product__item__text">
                    <h6>{{ $product->product_name }}</h6>
                    <a href="#" class="add-cart"><i class="fa fa-whatsapp" aria-hidden="true" style="color:#25D366; font-size:30px;"></i></a>
                    
                    <h5><button class="price-request-btn">PRICE ON REQUEST</button></h5>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <div class="col-12">
            <p>No products found.</p>
        </div>
    @endif
</div>