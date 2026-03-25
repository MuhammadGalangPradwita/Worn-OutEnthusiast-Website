<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = [];
        $keys = ['countdown_deadline', 'site_name', 'site_tagline', 'hero_subtitle'];
        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key, '');
        }

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'countdown_deadline' => 'required|date',
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value ?? '');
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
