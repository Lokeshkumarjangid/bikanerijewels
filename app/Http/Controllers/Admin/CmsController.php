<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Cms;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Cms::select('id','title','slug','status','created_at')
                ->orderBy('created_at','desc');

            return DataTables::of($query)
                ->addIndexColumn()

                ->addColumn('title', function($row){
                    return $row->title;
                })

                ->addColumn('slug', function($row){
                    return '<span class="badge badge-info">'.$row->slug.'</span>';
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })

                ->editColumn('status', function ($row) {
                    $checked = $row->status ? 'checked' : '';

                    return '
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input status-toggle" 
                                id="status'.$row->id.'" data-id="'.$row->id.'" '.$checked.'>
                            <label class="custom-control-label" for="status'.$row->id.'"></label>
                        </div>
                    ';
                })

                ->addColumn('action', function($row){
                    return '
                        <a href="'.route('cms.edit', $row->id).'" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    ';
                })

                ->rawColumns(['slug','status','action'])

                ->make(true);
        }

        return view('admin.cms.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);

        Cms::create([
            'title' => $request->title,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('cms.index')->with('success', 'CMS page created successfully.');
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
        $data['cms'] = Cms::findOrFail($id);
        return view('admin.cms.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);

        $cms = Cms::findOrFail($id);
        $cms->update([
            'title' => $request->title,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('cms.index')->with('success', 'CMS page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $cms = Cms::findOrFail($request->id);

        // Toggle status
        $cms->status = $cms->status ? 0 : 1;
        $cms->save();

        return response()->json(['status' => true, 'message' => 'Status updated successfully.']);
    }
}
