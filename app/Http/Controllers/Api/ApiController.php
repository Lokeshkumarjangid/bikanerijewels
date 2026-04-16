<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\CustomRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Banners;
use App\Models\Product;
use App\Models\Custom;

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
            
            $product = Product::select('id','product_name','price', 'sale_price')->with('firstImage')->limit('5')->get();

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

    function products_list(Request $request, $id){
        try {
            $products = Product::where('categroy_id', $id)->with(['firstImage' => function ($query) {
                $query->select('id', 'product_id', 'file_path');
            }])->get();

            return response()->json([
                'status' => true,
                'message' => 'Products list',
                'data' => $products
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function products_detail(Request $request, $id){
        try {
            $product = Product::where('id', $id)->with('images','video')->first();

            return response()->json([
                'status' => true,
                'message' => 'Products detail',
                'data' => $product
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function update_profile(ProfileRequest $request, FileUploadService $fileService){
        try {
            $user = auth()->user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->business_name = $request->business_name;
            $user->pancard = $request->pancard;
            
            if($request->hasFile('profile_image')){
                $path =$fileService->uploadSingle($request->file('profile_image'), 'profile_images');
                $user->profile_image = $path;
            }
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Profile updated successfully',
                'data' => $user
            ], 200);

        } catch (\Exception $e) {
            dd($e);
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function custom_jewellery(CustomRequest $request){
        try {
            $user = auth()->user();
            $data = $request->validated();
            $data['user_id'] = $user->id;
            
            // Handle custom image upload
            if ($request->hasFile('custom_image')) {
                $fileUploadService = new FileUploadService();
                $imagePath = $fileUploadService->uploadSingle($request->file('custom_image'), 'custom_jewellery');
                $data['custom_image'] = $imagePath;
            }
            
            $custom = Custom::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Custom jewellery request submitted successfully',
                'data' => $custom
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }
}
