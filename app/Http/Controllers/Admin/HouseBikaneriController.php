<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use App\Models\HouseBikaneri;
use App\Models\Category;

class HouseBikaneriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $query = HouseBikaneri::with('category')->orderBy('created_at','desc');
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })
                ->editColumn('category_id', function ($row) {
                    return $row->navigation ? $row->category->name : 'N/A';
                })
                ->addColumn('action', function($row){
                    return '<a href="'.route('house-bikanari.edit', $row->id).'" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>';
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('admin.housebikaneri.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categroy = Category::where('status','1')->where('type','house_bikaneri')->get();
        return view('admin.housebikaneri.create', compact('categroy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
