@extends('frontend.layouts.app')

@section('title', 'product-list')
@section('content') 
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search..." id="search">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                @if(!empty($category) && $category->count() > 0)
                                                    @foreach($category as $cat)
                                                        <li><a href="javascript:void(0)" class="category-filter" data-id="{{ encrypt($cat->id) }}">{{ $cat->name }} ({{ $cat->products_count }})</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                <li><a href="#">Louis Vuitton</a></li>
                                                <li><a href="#">Chanel</a></li>
                                                <li><a href="#">Hermes</a></li>
                                                <li><a href="#">Gucci</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                @if(!empty($priceRanges) && count($priceRanges) > 0)
                                                    @foreach($priceRanges as $range)
                                                        <li><a href="javascript:void(0)" class="price-filter" data-min="{{ $range['min'] }}" data-max="{{ $range['max'] }}">{{ $range['min'] }} - {{ $range['max'] }}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p id="showing-text">Showing {{ $product_details->firstItem() }}–{{ $product_details->lastItem() }} of {{ $product_details->total() }} results</p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">0 - 55</option>
                                    <option value="">55 - 100</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div id="product-area">
                    @include('frontend.product.products_show')
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            {{ $product_details->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
let category = '';
let min = '';
let max = '';
let search = '';

function fetchProducts(page = 1) {

    $.ajax({
        url: "{{ url('/product-list/'.$id) }}?page=" + page,
        type: "GET",
        data: {
            min: min,
            max: max,
            search: search,
            category:category
        },
        success: function(res) {

            // 🔥 products
            $('#product-area').html(res.html);

            // 🔥 showing text
            $('#showing-text').text(
                'Showing ' + res.from + ' – ' + res.to + ' of ' + res.total + ' results'
            );

            // 🔥 pagination update
            $('.product__pagination').html(res.pagination);
        }
    });
}

/* 🔍 SEARCH */
$('#search').on('keyup', function(){
    search = $(this).val();
    fetchProducts();
});

/* 🏷 CATEGORY */
$(document).on('click', '.category-filter', function(){
    category = $(this).data('id');
    fetchProducts();
});

/* 💰 PRICE */
$(document).on('click', '.price-filter', function(){
    min = $(this).data('min');
    max = $(this).data('max');
    fetchProducts();
});

/* 📄 PAGINATION */
$(document).on('click', '.pagination a', function(e){
    e.preventDefault();

    let page = $(this).attr('href').split('page=')[1];
    fetchProducts(page);
});
</script>
@endsection
