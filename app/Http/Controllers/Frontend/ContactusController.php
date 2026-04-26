<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    function create(Request $request){
        return view('frontend.contactus.create');
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'message' => 'required'
        ]);
        try{

         return redirect()->back()->with('success', 'Your details send to admin');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Someting went working');
        }
    }
}
