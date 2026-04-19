<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Navigation;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $query = Navigation::select('id','name','created_at')->orderBy('created_at','desc');
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })
                ->addColumn('action', function($row){
                    return '<a href="'.route('navigation.edit', $row->id).'" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>';
                })
                ->make(true);
        }
        return view('admin.navigation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.navigation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Navigation::create([
            'name' => $request->name,
        ]);

        return redirect()->route('navigation.index')->with('success', 'Navigation created successfully.');
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
        $navigation = Navigation::findOrFail($id);
        return view('admin.navigation.update', compact('navigation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $navigation = Navigation::findOrFail($id);
        $navigation->update([
            'name' => $request->name,
        ]);

        return redirect()->route('navigation.index')->with('success', 'Navigation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
