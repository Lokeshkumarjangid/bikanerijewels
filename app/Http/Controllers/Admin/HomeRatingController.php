<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\HomeRating;
use Illuminate\Support\Str;

class HomeRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = HomeRating::select('id','user_name','description','created_at')
                ->orderBy('created_at','desc');

            return DataTables::of($query)
                ->addIndexColumn()

                ->editColumn('description', function ($row) {
                    return Str::words($row->description, 2, '...');
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })

                ->addColumn('action', function($row){
                    return '
                        <a href="'.route('home-rating.edit', $row->id).'" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger deleteBtn" data-id="'.$row->id.'">
                            <i class="fas fa-trash"></i>
                        </button>
                    ';
                })

                ->rawColumns(['action'])

                ->make(true);
        }
        return view('admin.homerating.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.homerating.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'description' => 'required',
        ]);

        HomeRating::create([
            'user_name' => $request->user_name,
            'description' => $request->description,
        ]);

        return redirect()->route('home-rating.index')->with('success', 'Home rating created successfully.');
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
        $data['rating']=HomeRating::find($id);
        return view('admin.homerating.update',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_name' => 'required',
            'description' => 'required',
        ]);

        $homerating = HomeRating::findOrFail($id);
        $homerating->update([
            'user_name' => $request->user_name,
            'description' => $request->description,
        ]);

        return redirect()->route('home-rating.index')->with('success', 'Home rating updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = HomeRating::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Record not found'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully'
        ]);
    }
}
