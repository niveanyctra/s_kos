<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'location_map' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi upload gambar
        ]);

        $setting = Setting::first();

        // Jika upload logo baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($setting->logo_path) {
                Storage::delete($setting->logo_path);
            }

            // Simpan logo baru ke storage
            $path = $request->file('logo')->store('images', 'public');
            $setting->logo_path = $path;
        }

        $setting->name = $request->name;
        $setting->description = $request->description;
        $setting->address = $request->address;
        $setting->location_map = $request->location_map;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Data setting berhasil diperbarui.');
    }
}
