<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collections;
use App\Models\Category;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Collections::with('categroy')->orderBy('id','desc');
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })
                ->editColumn('category_id', function ($row) {
                    return $row->categroy ? $row->categroy->name : 'N/A';
                })
                ->addColumn('action', function($row){
                    return '<a href="'.route('collection.edit', $row->id).'" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.collection.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status','1')->where('type','collection')->get();
        return view('admin.collection.create', compact('category'));
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
