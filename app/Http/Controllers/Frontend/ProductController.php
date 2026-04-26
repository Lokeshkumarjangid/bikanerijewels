<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    function index(){
        return view('frontend.product.product_list');
    }

    function product_details($id){
        $productId = decrypt($id);
        $data['product_details'] = Product::with(['images:id,product_id,file_path,file_type','video:id,product_id,file_path,file_type','categroy:id,name'])->findOrFail($productId);

        $categoryId = $data['product_details']->categroy_id ?? null;

        $data['related_product'] = Product::where('categroy_id', $categoryId)
            ->where('id', '!=', $productId)
            ->with(['firstImage:id,product_id,file_path,file_type'])
            ->limit(5)
            ->get();


        return view('frontend.product.product_details',$data);
    }

    function product_list(Request $request, $id)
    {
        $categoryId = decrypt($id);

        if ($request->category) {
            $categoryId = decrypt($request->category);
        }

        $query = Product::with('firstImage:id,product_id,file_path,file_type')
            ->where('categroy_id', $categoryId);

        if ($request->search) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        if ($request->min && $request->max) {
            $query->whereBetween('price', [$request->min, $request->max]);
        }

        $data['product_details'] = $query->paginate(12);

        // AJAX RESPONSE
        if ($request->ajax()) {

            return response()->json([
                'html' => view('frontend.product.products_show', $data)->render(),
                'from' => $data['product_details']->count() ? $data['product_details']->firstItem() : 0,
                'to'   => $data['product_details']->count() ? $data['product_details']->lastItem() : 0,
                'total' => $data['product_details']->total(),
                'pagination' => (string) $data['product_details']->links()
            ]);
        }

        // Sidebar data
        $data['category'] = Category::select('id','name')->withCount('products')->get();

        // Price ranges
        $min = Product::min('price');
        $max = Product::max('price');

        $step = 50;
        $ranges = [];

        for ($i = $min; $i < $max; $i += $step) {
            $ranges[] = ['min'=>$i, 'max'=>$i+$step];
        }

        $data['priceRanges'] = $ranges;

        $data['id']=$id;

        return view('frontend.product.product_list', $data);
    }
}
