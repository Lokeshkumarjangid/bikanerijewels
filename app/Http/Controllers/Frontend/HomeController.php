<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;
use App\Models\Settings;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $bestProducts = $this->productService->getBestSaleProducts();
        $thirdsection=Settings::find('3');

        return view('frontend.index', compact('bestProducts','thirdsection'));
    }
}
