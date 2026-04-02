<?php
namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getBestSaleProducts()
    {
        return Product::with('firstImage')->latest()->take(4)->get();
    }
}