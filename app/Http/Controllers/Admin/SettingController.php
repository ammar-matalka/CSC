<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Initialize default settings if empty
        $this->initializeSettings();

        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'nullable|array',
            'hero_background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Handle hero background image upload
        if ($request->hasFile('hero_background_image')) {
            $oldSetting = Setting::where('key', 'hero_background_image')->first();
            if ($oldSetting && $oldSetting->value) {
                \Storage::disk('public')->delete($oldSetting->value);
            }

            $imagePath = $request->file('hero_background_image')->store('hero', 'public');
            Setting::updateOrCreate(
                ['key' => 'hero_background_image'],
                ['value' => $imagePath, 'type' => 'image', 'group' => 'hero']
            );
        }

        // Update other settings
        if ($request->has('settings') && is_array($request->settings)) {
            foreach ($request->settings as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully! ✅');
    }

    /**
     * Initialize default settings structure if empty
     */
    private function initializeSettings()
    {
        $defaultSettings = [
            // Hero Section
            ['key' => 'hero_title', 'value' => '', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => '', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_description', 'value' => '', 'type' => 'textarea', 'group' => 'hero'],
            ['key' => 'hero_background_image', 'value' => null, 'type' => 'image', 'group' => 'hero'],

            // Vision Section
            ['key' => 'vision_title', 'value' => '', 'type' => 'text', 'group' => 'vision'],
            ['key' => 'vision_text', 'value' => '', 'type' => 'textarea', 'group' => 'vision'],

            // Contact
            ['key' => 'contact_email', 'value' => '', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_hours', 'value' => '', 'type' => 'text', 'group' => 'contact'],

            // Footer
            ['key' => 'footer_text', 'value' => '', 'type' => 'text', 'group' => 'footer'],
            ['key' => 'copyright_text', 'value' => '', 'type' => 'text', 'group' => 'footer'],
        ];

        foreach ($defaultSettings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
