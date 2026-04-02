<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        return view('frontend.product.product_list');
    }

    function product_details($id){
        $productId = decrypt($id);
        $data['product_details'] = Product::with(['images:id,product_id,file_path,file_type','video:id,product_id,file_path,file_type','categroy:id,name'])->select('id','product_name','sku','colour','categroy_id')->findOrFail($productId);

        return view('frontend.product.product_details',$data);
    }
}
