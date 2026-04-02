<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use App\Models\Banners;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $query = Banners::select('id','banner_img_web','banner_img_mob','sort_order','status','created_at')
          ->orderBy('created_at','desc');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('image_web', function($row){
                return '<img src="'.asset('storage/'.$row->banner_img_web).'" width="100" height="40" style="object-fit:cover;">';
            })
            ->addColumn('image_mobile', function($row){
                return '<img src="'.asset('storage/'.$row->banner_img_mob).'" width="60" height="80" style="object-fit:cover;">';
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
                return '<a href="'.route('banner.edit', $row->id).'" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>';
            })

            ->rawColumns(['image_web','image_mobile','status','action'])

            ->make(true);
        }

        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FileUploadService $fileService)
    {
        $validated = $request->validate([
            'banner_img_web' => ['required','image','max:100','dimensions:width=863,height=360'],
            'banner_mob_web' => ['required','image','max:100','dimensions:width=450,height=600'
            ],
            'sort_order' => 'required|integer'
        ], [
            'banner_img_web.dimensions' => 'Desktop banner must be exactly 863x360 px',
            'banner_img_web.max' => 'Desktop image must be less than 100KB',

            'banner_mob_web.dimensions' => 'Mobile banner must be 450x600 px',
            'banner_mob_web.max' => 'Mobile image must be less than 100KB',
        ]);

        $data['banner_img_web'] = $fileService->uploadSingle($request->file('banner_img_web'), 'banners');

        $data['banner_img_mob'] = $fileService->uploadSingle($request->file('banner_mob_web'), 'banners');

        $data['sort_order'] = $validated['sort_order'] ?? 0;

        Banners::create($data);

        return redirect()->route('banner.index')->with('success', 'Banner Added Successfully');
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
        $data['banner']=Banners::find($id);
        return view('admin.banner.update',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, FileUploadService $fileService)
    {
        $validated = $request->validate([
            'banner_img_web' => ['nullable','image','max:100','dimensions:width=863,height=360'],
            'banner_mob_web' => ['nullable','image','max:100','dimensions:width=450,height=600'
            ],
            'sort_order' => 'nullable|integer'
        ], [
            'banner_img_web.dimensions' => 'Desktop banner must be exactly 863x360 px',
            'banner_img_web.max' => 'Desktop image must be less than 100KB',

            'banner_mob_web.dimensions' => 'Mobile banner must be 450x600 px',
            'banner_mob_web.max' => 'Mobile image must be less than 100KB',
        ]);

        $banneraleradycheck=Banners::findOrFail($id);

        if($request->file('banner_img_web')){
            Storage::disk('public')->delete($banneraleradycheck->banner_img_web);
            $data['banner_img_web'] = $fileService->uploadSingle($request->file('banner_img_web'), 'banners');
        }else{
            $data['banner_img_web']= $banneraleradycheck->banner_img_web;
        }

        if($request->file('banner_mob_web')){
            Storage::disk('public')->delete($banneraleradycheck->banner_img_mob);
            $data['banner_img_mob'] = $fileService->uploadSingle($request->file('banner_mob_web'), 'banners');
        }else{
           $data['banner_img_mob']= $banneraleradycheck->banner_img_mob;
        }

        $data['sort_order'] = $validated['sort_order'] ?? $banneraleradycheck->sort_order;

        $banneraleradycheck->update($data);

        return redirect()->route('banner.index')->with('success', 'Banner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
