<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use App\Models\HouseBikaneri;

class ContactusController extends Controller
{
    function create(Request $request){
        return view('frontend.contactus.create');
    }

    function store(Request $request){
         $rules = [
            'name'   => 'required',
            'email'  => 'required|email',
            'mobile' => 'required|digits:10',
            'type'   => 'required',
        ];

        // Type 1 (Contact Form)
        if ($request->type == 1) {
            $rules['message'] = 'required';
            $rules['contact_date'] = 'nullable';
            $rules['contact_time'] = 'nullable';
        }

        // Type 4 (Book Appointment)
        if ($request->type == 4) {
            $rules['address'] = 'required';
            $rules['city'] = 'required';
            $rules['state'] = 'required';
            $rules['store'] = 'nullable'; // ya required karna ho to required kar do
        }

        $request->validate($rules);
        try{

            Contactus::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'mobile'       => $request->mobile,
                'message'      => $request->message,
                'address'      => $request->address,
                'city'         => $request->city,
                'state'        => $request->state,
                'store'        => $request->store,
                'type'         => $request->type,
                'contact_date' => $request->contact_date,
                'contact_time' => $request->contact_time,
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

    function bikaneripage(Request $request,$id){
        $categoryId = decrypt($id);
        $data['jelwary']=HouseBikaneri::where('category_id',$categoryId)->first();
        return view('frontend.housebikaneri.index',$data);
    }
}
