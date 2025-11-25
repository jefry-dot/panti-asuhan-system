<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $logo = Setting::get('logo');
        $favicon = Setting::get('favicon');
        return view('admin.settings.index', compact('logo', 'favicon'));
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Hapus logo lama jika ada
        $oldLogo = Setting::get('logo');
        if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
            Storage::disk('public')->delete($oldLogo);
        }

        // Upload logo baru
        $logoPath = $request->file('logo')->store('logos', 'public');

        // Simpan ke database
        Setting::set('logo', $logoPath);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Logo berhasil diupdate!');
    }

    public function updateFavicon(Request $request)
    {
        $request->validate([
            'favicon' => 'required|image|mimes:ico,png,jpg,gif,svg|max:512'
        ]);

        // Hapus favicon lama jika ada
        $oldFavicon = Setting::get('favicon');
        if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
            Storage::disk('public')->delete($oldFavicon);
        }

        // Upload favicon baru
        $faviconPath = $request->file('favicon')->store('favicons', 'public');

        // Simpan ke database
        Setting::set('favicon', $faviconPath);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Favicon berhasil diupdate!');
    }
}
