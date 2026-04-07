<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Banners;
use App\Models\Product;

class ApiController extends Controller
{
    function category(Request $request){
        try {
            $category = Category::all();

            return response()->json([
                'status' => true,
                'message' => 'Category list',
                'data' => $category
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function home_banner(Request $request){
        try {

            $video = Settings::where('key','mob_home_video')->first();
            $banners = Banners::select('banner_img_mob', 'sort_order', 'status')
                    ->where('status', 1)
                    ->orderBy('sort_order', 'asc')
                    ->get(); 
            
            $product = Product::select('id','product_name')->with('firstImage')->limit('5')->get();

            return response()->json([
                'status' => true,
                'message' => 'Category list',
                'data' => [
                    'setting' => $video,
                    'banners' => $banners,
                    'products' => $product
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }
}
