<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;
use App\Models\Settings;
use App\Models\HomeRating;
use App\Models\Banners;

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
        $thirdsection = Settings::where('key', 'home_third_section')->first();
        $fourthsection = Settings::where('key', 'home_fourth_section')->first();
        $sixsection = Settings::where('key', 'home_six_section')->first();
        $sixsectionMob = Settings::where('key', 'home_six_section_mob')->first();
        $sevensection = Settings::where('key', 'home_seven_section')->first();
        $sevensectionMob = Settings::where('key', 'home_seven_section_mob')->first();
        $Homerating=HomeRating::select('id','user_name','description')->orderBy('id','desc')->get('10');
        $banner=Banners::select('id','sort_order','banner_img_web','banner_img_mob','status')->where('status','1')->orderBy('sort_order','ASC')->get();

        return view('frontend.index', compact('bestProducts','thirdsection','fourthsection','sixsection','Homerating','banner','sevensection','sixsectionMob','sevensectionMob'));
    }
}
