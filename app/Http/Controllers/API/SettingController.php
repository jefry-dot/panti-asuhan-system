<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Get app settings (logo, favicon)
     */
    public function index()
    {
        $settings = [
            'logo' => Setting::get('logo', null),
            'favicon' => Setting::get('favicon', null),
        ];

        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }

    /**
     * Update logo (Admin only)
     */
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo
            $oldLogo = Setting::get('logo');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }

            // Store new logo
            $path = $request->file('logo')->store('settings', 'public');
            Setting::set('logo', $path);

            return response()->json([
                'success' => true,
                'message' => 'Logo updated successfully',
                'data' => ['logo' => $path]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Logo file is required'
        ], 400);
    }

    /**
     * Update favicon (Admin only)
     */
    public function updateFavicon(Request $request)
    {
        $request->validate([
            'favicon' => 'required|image|max:512',
        ]);

        if ($request->hasFile('favicon')) {
            // Delete old favicon
            $oldFavicon = Setting::get('favicon');
            if ($oldFavicon) {
                Storage::disk('public')->delete($oldFavicon);
            }

            // Store new favicon
            $path = $request->file('favicon')->store('settings', 'public');
            Setting::set('favicon', $path);

            return response()->json([
                'success' => true,
                'message' => 'Favicon updated successfully',
                'data' => ['favicon' => $path]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Favicon file is required'
        ], 400);
    }
}
