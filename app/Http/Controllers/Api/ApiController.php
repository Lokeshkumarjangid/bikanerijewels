<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\CustomRequest;
use App\Http\Requests\WishlistRequest;
use App\Http\Requests\RatingRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Banners;
use App\Models\Product;
use App\Models\Order;
use App\Models\Custom;
use App\Models\Wishlist;
use App\Models\Rating;

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

    function product_search(Request $request){
        try {
            $searchTerm = $request->get('search');
            $products = Product::where('product_name', 'like', '%' . $searchTerm . '%')
                ->select('id', 'product_name')
                ->with('firstImage:id,product_id,file_path')
                ->limit(10)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Product search results',
                'data' => $products
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
            $user = auth()->user();

            $products = Product::where('categroy_id', $id)
            ->with([
                'firstImage:id,product_id,file_path'
            ])
            ->withExists([
                'wishlists as is_wishlist' => function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                }
            ])
            ->get();

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
            $user = auth()->user();
            $product = Product::where('id', $id)->with('images','video')->withExists([
                    'wishlists as is_wishlist' => function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    }
                ])->first();

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

    function products_list_all(Request $request){
        try {
            $user = auth()->user();
            $limit = 10;
            $page = max((int)$request->get('page', 1), 1);
            $skip = ($page - 1) * $limit;
            $total = Product::where('status', 1)->count();

            $products = Product::select('id', 'product_name', 'price')
                ->with(['firstImage:id,product_id,file_path'])
                 ->withExists([
                    'wishlists as is_wishlist' => function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    }
                ])
                ->where('status', 1)
                ->orderBy('id', 'desc')
                ->skip($skip)
                ->take($limit)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Products list',
                'data' => $products,
                'pagination' => [
                    'total' => $total,
                    'limit' => $limit,
                    'page' => $page,
                    'pages' => $total > 0 ? ceil($total / $limit) : 0
                ]
            ], 200);

        } catch (\Exception $e) {
            dd($e);
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function add_to_wishlist(Request $request, WishlistRequest $wishlistRequest){
        try {
            $user = auth()->user();
            $product_id = $request->get('product_id');

            $product = Product::find($product_id);
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found',
                ], 404);
            }

            // Check if already exists
            $wishlist = Wishlist::where('user_id', $user->id)
                ->where('product_id', $product_id)
                ->first();

            if ($wishlist) {
                $wishlist->status = $wishlist->status == 1 ? 0 : 1;
                $wishlist->save();

                $message = $wishlist->status == 1 
                    ? 'Product added to wishlist' 
                    : 'Product removed from wishlist';

            } else {
                // Create new entry
                $wishlist = Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => $product_id,
                    'status' => 1
                ]);

                $message = 'Product added to wishlist';
            }

            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => $wishlist
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }
    // Remove from Wishlist
    function remove_from_wishlist(Request $request, WishlistRequest $wishlistRequest){
        try {
            $user = auth()->user();
            $product_id = $request->get('product_id');

            $wishlist = Wishlist::where('user_id', $user->id)
                ->where('product_id', $product_id)
                ->first();

            if (!$wishlist) {
                return response()->json([
                    'status' => false,
                    'message' => 'Wishlist item not found',
                ], 404);
            }

            $wishlist->delete();

            return response()->json([
                'status' => true,
                'message' => 'Product removed from wishlist',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    // Get User Wishlist
    function get_wishlist(Request $request){
        try {
            $limit = 10;
            $page = max((int)$request->get('page', 1), 1);
            $skip = ($page - 1) * $limit;
            $user = auth()->user();

            $total = Wishlist::where('user_id', $user->id)->count();

            $wishlists = Wishlist::where('user_id', $user->id)
                ->with(['product' => function ($query) {
                    $query->select('id', 'product_name', 'price', 'sale_price');
                    $query->with('firstImage:id,product_id,file_path');
                }])
                ->orderBy('created_at', 'desc')
                ->skip($skip)
                ->take($limit)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Wishlist items',
                'data' => $wishlists,
                'pagination' => [
                    'total' => $total,
                    'limit' => $limit,
                    'page' => $page,
                    'pages' => $total > 0 ? ceil($total / $limit) : 0
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function submit_review(Request $request, RatingRequest $ratingRequest){
        try {
            $user = auth()->user();
            $data = $request->validate($ratingRequest->rules());

            $alreadyrating = Rating::where('user_id', $user->id)
                ->where('product_id', $data['product_id'])
                ->first();
            if (!empty($alreadyrating)) {
                return response()->json([
                    'status' => true,
                    'message' => 'You have already submitted a review for this product.',
                ], 422);
            }
            
            Rating::create([
                'user_id' => $user->id,
                'product_id' => $data['product_id'],
                'rating' => $data['rating'],
                'review' => $data['review']
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Review submitted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function get_review(Request $request, $product_id){
        try {
            $user = auth()->user();
            $reviews = Rating::where('product_id', $product_id)->where('user_id',$user->id)
            ->with('user:id,first_name,last_name')
            ->orderBy('created_at', 'desc')
            ->get();

            $average_rating = round(Rating::where('product_id', $product_id)->avg('rating'), 1);
            $overall_review = Rating::where('product_id', $product_id)->count();

            $rating_counts = Rating::where('product_id', $product_id)
                ->selectRaw('rating, COUNT(*) as total')
                ->groupBy('rating')
                ->pluck('total','rating');

            $stars = [
                5 => $rating_counts[5] ?? 0,
                4 => $rating_counts[4] ?? 0,
                3 => $rating_counts[3] ?? 0,
                2 => $rating_counts[2] ?? 0,
                1 => $rating_counts[1] ?? 0,
            ];

            return response()->json([
                'status' => true,
                'message' => 'Product reviews',
                'data' => $reviews,
                'average_rating' => $average_rating,
                'rating_counts' => $stars,
                'overall_review' => $overall_review
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    //Order

    function create_order(Request $request, $id){
        try {
            $user = auth()->user();
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found',
                ], 404);
            }

            $order = Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Order created successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function get_orders(Request $request){
        try {
            $user = auth()->user();
            $limit = 10;
            $page = max((int)$request->get('page', 1), 1);
            $skip = ($page - 1) * $limit;
            $total = Order::where('user_id', $user->id)->count();

            $orders = Order::where('user_id', $user->id)
                ->with(['product' => function ($query) {
                    $query->select('id', 'product_name', 'price','colour','metal_type');
                    $query->with('firstImage:id,product_id,file_path');
                }])
                ->orderBy('created_at', 'desc')
                ->skip($skip)
                ->take($limit)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'User orders',
                'data' => $orders,
                'pagination' => [
                    'total' => $total,
                    'limit' => $limit,
                    'page' => $page,
                    'pages' => $total > 0 ? ceil($total / $limit) : 0
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    function get_order_details(Request $request, $id){
        try {
            $user = auth()->user();
            $order = Order::where('id', $id)
                ->where('user_id', $user->id)
                ->with(['product' => function ($query) {
                    $query->select('id', 'product_name', 'price','colour','metal_type');
                    $query->with('firstImage:id,product_id,file_path');
                }])
                ->first();

            if (!$order) {
                return response()->json([
                    'status' => false,
                    'message' => 'Order not found',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Order details',
                'data' => $order
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }
}
