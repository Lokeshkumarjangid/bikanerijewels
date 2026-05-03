<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;

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
            'message' => 'required',
            'contact_date' => 'nullable',
            'contact_time' => 'nullable',
        ]);
        try{

            Contactus::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'message' => $request->message,
                'type'    => $request->type,
                'contact_date' => $request->contact_date,
                'contact_time' => $request->contact_time
            ]);

            return redirect()->back()->with('success', 'Your details send to admin');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Someting went working');
        }
    }

    function landingpage(Request $request){
        $data['bestProducts']=Product::with('firstImage')->latest()->take(4)->get();
        return view('frontend.landingpage.index',$data);
    }
}
