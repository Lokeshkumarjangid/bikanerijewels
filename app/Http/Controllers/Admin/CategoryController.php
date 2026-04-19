<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Navigation;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Category::select('id','name','navigation_id','status','created_at')->with('navigation')->orderBy('created_at','desc');
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })
                ->editColumn('navigation_id', function ($row) {
                    return $row->navigation ? $row->navigation->name : 'N/A';
                })
                ->editColumn('status', function ($row) {
                    return $row->status
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Inactive</span>';
                })
                ->addColumn('action', function($row){
                    return '<a href="'.route('categories.edit', $row->id).'" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>';
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $navigation = Navigation::get();
        return view('admin.category.create', compact('navigation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'navigation_id' => ['required',Rule::exists('tbl_navigation','id')],
            'name' => ['required',Rule::unique('categories')->whereNull('deleted_at')]
        ]);

        Category::create([
            'navigation_id' => $request->navigation_id,
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success','Category Created Successfully');
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
        $navigation = Navigation::get();
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category','navigation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'navigation_id' => ['required',Rule::exists('tbl_navigation','id')],
            'name' => ['required',Rule::unique('categories')->whereNull('deleted_at')->ignore($id)]
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'navigation_id' => $request->navigation_id,
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
