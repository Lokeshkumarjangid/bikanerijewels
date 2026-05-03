<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactusController extends Controller
{
    function index(Request $request){
        if ($request->ajax()) {
            $query = Contactus::select('id','name','email','mobile','type','message','created_at')->orderBy('created_at','desc');
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('type', function ($row) {
                    switch ($row->type) {
                        case 1:
                            return 'Home Page';
                        case 2:
                            return 'Contact Us Page';
                        case 3:
                            return 'App';
                        default:
                            return 'Unknown';
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })
                ->make(true);
        }

        return view('admin.contactus.index');
    }
}
