<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return Setting::all();
    }

    public function create()
    {
        // TODO: Show Setting creation view
    }

    public function store(Request $request)
    {
        return Setting::create([
            // TODO: Use values from $request
        ]);
    }

    public function show(Setting $setting)
    {
        return $setting;
    }

    public function edit(Setting $setting)
    {
        // TODO: Show Setting edit view
    }

    public function update(Request $request, Setting $setting)
    {
        return $setting->update([
            // TODO: Use values from $request
        ]);
    }

    public function destroy(Setting $setting)
    {
        return $setting->delete();
    }
}
