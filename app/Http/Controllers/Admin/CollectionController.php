<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collections;
use App\Models\Category;
use App\Services\FileUploadService;

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
    public function store(Request $request,FileUploadService $fileService)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',

            // First Section
            'first_section_web' => ['required','image','max:200','dimensions:width=863,height=360'],
            'first_section_mobile' => ['required','image','max:100','dimensions:width=450,height=600'],

            // Second Section
            'second_title' => 'required|string|max:255',
            'second_description' => 'required|string',

            'second_section_web' => ['required','image','max:200','dimensions:width=863,height=360'],
            'second_section_mobile' => ['required','image','max:100','dimensions:width=450,height=600'],

            // Third Section Videos
            'third_section_web_video' => ['required','mimes:mp4','max:10240'],
            'third_section_mobile_video' => ['required','mimes:mp4','max:4096'],

            // Fourth Section
            'fourth_title' => 'required|string|max:255',
            'fourth_description' => 'required|string',

            'fourth_image_first' => ['required','image','max:100','dimensions:width=450,height=600'],
            'fourth_image_secound' => ['required','image','max:100','dimensions:width=450,height=600'],
            'fourth_image_third' => ['required','image','max:100','dimensions:width=450,height=600'],

            // Fifth Section
            'five_section_web' => ['required','image','max:200','dimensions:width=863,height=360'],
            'five_section_mobile' => ['required','image','max:100','dimensions:width=450,height=600'],

        ], [

            'first_section_web.dimensions' => 'First Section Web Image must be exactly 863×360 px.',
            'first_section_web.max' => 'First Section Web Image must be less than 200KB.',

            'first_section_mobile.dimensions' => 'First Section Mobile Image must be exactly 450×600 px.',
            'first_section_mobile.max' => 'First Section Mobile Image must be less than 100KB.',

            'second_section_web.dimensions' => 'Second Section Web Image must be exactly 863×360 px.',
            'second_section_web.max' => 'Second Section Web Image must be less than 200KB.',

            'second_section_mobile.dimensions' => 'Second Section Mobile Image must be exactly 450×600 px.',
            'second_section_mobile.max' => 'Second Section Mobile Image must be less than 100KB.',

            'third_section_web_video.mimes' => 'Web Video must be MP4.',
            'third_section_web_video.max' => 'Web Video must be less than 4MB.',

            'third_section_mobile_video.mimes' => 'App Video must be MP4.',
            'third_section_mobile_video.max' => 'App Video must be less than 1MB.',

            'fourth_image_first.dimensions' => 'Fourth Image 1 must be exactly 450×600 px.',
            'fourth_image_first.max' => 'Fourth Image 1 must be less than 100KB.',

            'fourth_image_secound.dimensions' => 'Fourth Image 2 must be exactly 450×600 px.',
            'fourth_image_secound.max' => 'Fourth Image 2 must be less than 100KB.',

            'fourth_image_third.dimensions' => 'Fourth Image 3 must be exactly 450×600 px.',
            'fourth_image_third.max' => 'Fourth Image 3 must be less than 100KB.',

            'five_section_web.dimensions' => 'Five Section Web Image must be exactly 863×360 px.',
            'five_section_web.max' => 'Five Section Web Image must be less than 200KB.',

            'five_section_mobile.dimensions' => 'Five Section Mobile Image must be exactly 450×600 px.',
            'five_section_mobile.max' => 'Five Section Mobile Image must be less than 100KB.',

        ]);

        $data = [];

        // Category
        $data['category_id'] = $validated['category_id'];

        // First Section
        $data['first_section_web'] = $fileService->uploadSingle(
            $request->file('first_section_web'),
            'collections'
        );

        $data['first_section_mobile'] = $fileService->uploadSingle(
            $request->file('first_section_mobile'),
            'collections'
        );

        // Second Section
        $data['second_title'] = $validated['second_title'];
        $data['second_description'] = $validated['second_description'];

        $data['second_section_web'] = $fileService->uploadSingle(
            $request->file('second_section_web'),
            'collections'
        );

        $data['second_section_mobile'] = $fileService->uploadSingle(
            $request->file('second_section_mobile'),
            'collections'
        );

        // Third Section Videos
        $data['third_section_web_video'] = $fileService->uploadSingle(
            $request->file('third_section_web_video'),
            'collections'
        );

        $data['third_section_mobile_video'] = $fileService->uploadSingle(
            $request->file('third_section_mobile_video'),
            'collections'
        );

        // Fourth Section
        $data['fourth_title'] = $validated['fourth_title'];
        $data['fourth_description'] = $validated['fourth_description'];

        $data['fourth_image_first'] = $fileService->uploadSingle(
            $request->file('fourth_image_first'),
            'collections'
        );

        $data['fourth_image_secound'] = $fileService->uploadSingle(
            $request->file('fourth_image_secound'),
            'collections'
        );

        $data['fourth_image_third'] = $fileService->uploadSingle(
            $request->file('fourth_image_third'),
            'collections'
        );

        // Fifth Section
        $data['five_section_web'] = $fileService->uploadSingle(
            $request->file('five_section_web'),
            'collections'
        );

        $data['five_section_mobile'] = $fileService->uploadSingle(
            $request->file('five_section_mobile'),
            'collections'
        );

        // Save
        Collections::create($data);

        return redirect()->route('collection.index')->with('success', 'Collection Added Successfully');
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
