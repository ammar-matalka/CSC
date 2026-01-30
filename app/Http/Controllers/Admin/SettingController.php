<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'nullable|array', // Changed from 'required' to 'nullable'
            'hero_background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
        ]);

        // Handle hero background image upload
        if ($request->hasFile('hero_background_image')) {
            // Delete old image if exists
            $oldSetting = Setting::where('key', 'hero_background_image')->first();
            if ($oldSetting && $oldSetting->value) {
                \Storage::disk('public')->delete($oldSetting->value);
            }

            // Store new image
            $imagePath = $request->file('hero_background_image')->store('hero', 'public');
            Setting::where('key', 'hero_background_image')->update(['value' => $imagePath]);
        }

        // Update other settings (only if provided)
        if ($request->has('settings') && is_array($request->settings)) {
            foreach ($request->settings as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
