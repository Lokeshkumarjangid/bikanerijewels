<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        return view('frontend.product.product_list');
    }

    function product_details(){
        return view('frontend.product.product_details');
    }
}
