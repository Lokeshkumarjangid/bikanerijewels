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

    public function update(Request $request)
    {
        $request->validate([
            'home_video' => 'nullable|mimes:mp4|max:4096',
        ]);

       if ($request->hasFile('home_video')) {
            $video = $request->file('home_video')->store('settings', 'public');

            Setting::updateOrCreate(
                ['key' => 'home_video'],
                ['value' => $video]
            );
        }

        return back()->with('success', 'Settings Updated');
    }
}
