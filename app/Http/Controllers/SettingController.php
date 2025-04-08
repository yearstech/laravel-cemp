<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    function manage()
    {
        $allSettings = Setting::all();
        return view('settings.index', compact('allSettings'));
    }
    function store(Request $request)
    {
        $request->validate($this->validationRules());
        $data = $request->only((new Setting())->getFillable());
        $data['is_visible'] = 1;
        Setting::create($data);
        return redirect()->route('settings.manage')->with('success', 'Added Successfully');
    }
    function update(Request $request, Setting $setting)
    {
        $request->validate($this->validationRules($setting->id));
        $data = $request->only((new Setting())->getFillable());
        $setting->update($data);
        return redirect()->route('settings.manage')->with('success', 'Updated Successfully');
    }
    function edit(Setting $setting)
    {
        return view('settings.edit', compact('setting'));
    }
    function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.manage')->with('success', 'Setting deleted!');
    }
    protected function validationRules($settingId = null)
    {
        return [
            'title' => 'required|string|max:255|min:2',
            'slug' => 'required|string|max:255|min:2|unique:settings,slug,' . ($settingId ?? 'NULL'),
            'value' => 'required|string|max:255|min:1',
            'data_type' => 'required|string|max:255|min:2',
        ];
    }
    function showAll()
    {
        $allSettings = Setting::all()->mapWithKeys(function ($setting) {
            return [$setting->slug => $setting->toArray()];
        })->toArray();
        if (empty($allSettings)) {
            return redirect()->back()->with('error', 'No Settings found!');
        }
        return view('settings.mass_update', compact('allSettings'));
    }
    function updateAll(Request $request)
    {
        // Get the 'settings' array from the request
        $allSettings = $request->input('settings');

        // Loop through each setting and update the database using Eloquent
        foreach ($allSettings as $slug => $value) {
            Setting::where('slug', $slug)->update(['value' => $value ?? '']);
        }

        // Return success message or redirect
        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
