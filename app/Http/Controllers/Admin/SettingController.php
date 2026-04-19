<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\MobilePage;
use App\Services\FileUploadService;

class SettingController extends Controller
{
    function updatesetting(){
        $data['setting']=Settings::all();
        return view('admin.settings.create',$data);
    }

    public function settingsupdate(Request $request,FileUploadService $fileService)
    {
        $request->validate([
            'web_home_video' => 'nullable|mimes:mp4|max:5120',
            'mob_home_video' => 'nullable|mimes:mp4|max:1024',
        ]);

        if ($request->hasFile('web_home_video')) {
            $video =$fileService->uploadSingle($request->file('web_home_video'), 'settings');

            Settings::updateOrCreate(
                ['key' => 'web_home_video'],
                ['value' => $video]
            );
        }

        if ($request->hasFile('mob_home_video')) {
            $mobVideo =$fileService->uploadSingle($request->file('mob_home_video'), 'settings');
       
            Settings::updateOrCreate(
                ['key' => 'mob_home_video'],
                ['value' => $mobVideo]
            );
        }

        return back()->with('success', 'Settings Updated');
    }

    public function mobilefirstpage(){
        $data['setting']=MobilePage::first();
        return view('admin.settings.mobilefirstpage',$data);
    }

    public function mobileupdate(Request $request,FileUploadService $fileService){
        $request->validate([
            'title' => 'required|string',
            'first_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:width=157,height=185',
            'second_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:width=157,height=218',
            'third_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:width=157,height=218',
        ]);

        $setting = MobilePage::first();
        $setting->title = $request->title;

        if ($request->hasFile('first_image')) {
            $firstImage = $fileService->uploadSingle($request->file('first_image'), 'mobile_pages');
            $setting->first_image = $firstImage;
        }

        if ($request->hasFile('second_image')) {
            $secondImage = $fileService->uploadSingle($request->file('second_image'), 'mobile_pages');
            $setting->second_image = $secondImage;
        }

        if ($request->hasFile('third_image')) {
            $thirdImage = $fileService->uploadSingle($request->file('third_image'), 'mobile_pages');
            $setting->third_image = $thirdImage;
        }

        $setting->save();

        return back()->with('success', 'Mobile First Page Updated');
    }
}
