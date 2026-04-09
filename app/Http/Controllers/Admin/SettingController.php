<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
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
}
