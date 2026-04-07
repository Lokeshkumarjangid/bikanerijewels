<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingController extends Controller
{
    function updatesetting(){
        return view('admin.settings.create');
    }

    public function settingsupdate(Request $request)
    {
        $request->validate([
            'web_home_video' => 'nullable|mimes:mp4|max:5120',
            'mob_home_video' => 'nullable|mimes:mp4|max:1024',
        ]);

        if ($request->hasFile('web_home_video')) {
            $video = $request->file('web_home_video')->store('settings', 'public');

            Setting::updateOrCreate(
                ['key' => 'web_home_video'],
                ['value' => $video]
            );
        }

        if ($request->hasFile('mob_home_video')) {
            $mobVideo = $request->file('mob_home_video')->store('settings', 'public');

            Settings::updateOrCreate(
                ['key' => 'mob_home_video'],
                ['value' => $mobVideo]
            );
        }

        return back()->with('success', 'Settings Updated');
    }
}
