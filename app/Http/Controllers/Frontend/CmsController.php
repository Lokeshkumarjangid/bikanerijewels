<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    function index(Request $request, $slug)
    {
        $data = \App\Models\Cms::where('slug', $slug)->first();
        if ($data) {
            return view('frontend.cms.index', compact('data'));
        } else {
            abort(404);
        }
    }
}
