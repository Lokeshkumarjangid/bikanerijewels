<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Services\FileUploadService;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\ProductFile;
use App\Models\Category;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::select(
                    'id',
                    'product_name',
                    'sku',
                    'gross_weight',
                    'status',
                    'created_at'
                )
                ->when($request->product_name, function ($q) use ($request) {
                    $q->where('product_name', 'like', '%' . $request->product_name . '%');
                })
                ->when($request->sku, function ($q) use ($request) {
                    $q->where('sku', 'like', '%' . $request->sku . '%');
                })
                ->when($request->from_date, function ($q) use ($request) {
                    $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date, function ($q) use ($request) {
                    $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->orderBy('created_at', 'desc');

            return DataTables::of($query)
                ->addIndexColumn()

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })

                ->editColumn('status', function ($row) {
                    return $row->status
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Inactive</span>';
                })

                ->addColumn('action', function ($row) {
                    return '
                        <a href="'.route('product.edit', $row->id).'" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    ';
                })

                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categroy']=Category::all();
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FileUploadService $fileService)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'categroy_id' => 'required',
                'product_name' => 'required|unique:tbl_product,product_name',
                'sku' => 'required|unique:tbl_product,sku',
                'colour' => 'required',
                'metal_type' => 'required',
                'metal_finish' => 'required',
                'gross_weight' => 'required|numeric',
                'net_weight' => 'required|numeric',
                'price' => 'required|numeric',
                'sale_price' => 'nullable|numeric',
                'qty' => 'required|numeric',
                'product_img' => 'required|array|max:4',
                'product_img.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB
                'product_video' => 'nullable|mimes:mp4,avi,mov|max:5120', // 5MB
                'diamond_details' => 'required',
                'stone_details' => 'required',
            ]);
            $product = Product::create([
                'categroy_id' => $request->categroy_id,
                'product_name' => $request->product_name,
                'sku' => $request->sku,
                'colour' => $request->colour,
                'metal_type' => $request->metal_type,
                'metal_finish' => $request->metal_finish,
                'gross_weight' => $request->gross_weight,
                'status' => 1,
                'qty' => $request->qty,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'diamond_details' => $request->diamond_details,
                'stone_details' => $request->stone_details,
                'net_weight' => $request->net_weight,   
            ]);

            $imagePaths = $fileService->uploadMultiple(
                $request->file('product_img'),
                'products/images'
            );

            foreach ($imagePaths as $img) {
                ProductFile::create([
                    'product_id' => $product->id,
                    'file_type' => 'image',
                    'file_path' => $img,
                ]);
            }

            if ($request->hasFile('product_video')) {
                $videoPath = $fileService->uploadSingle(
                    $request->file('product_video'),
                    'products/videos'
                );

                ProductFile::create([
                    'product_id' => $product->id,
                    'file_type' => 'video',
                    'file_path' => $videoPath,
                ]);
            }

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product added successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = Product::with(['images','video'])->findOrFail($id);
        $data['categroy'] = Category::all();

        return view('admin.product.update',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
