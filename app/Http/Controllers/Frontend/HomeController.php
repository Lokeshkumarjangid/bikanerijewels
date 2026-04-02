<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;

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

        return view('frontend.index', compact('bestProducts'));
    }
}
