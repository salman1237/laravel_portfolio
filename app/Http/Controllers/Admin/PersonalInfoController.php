<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalInfoController extends Controller
{
    /**
     * Show the form for editing personal info.
     */
    public function edit()
    {
        $personalInfo = PersonalInfo::first() ?? new PersonalInfo();
        return view('admin.personal-info.edit', compact('personalInfo'));
    }

    /**
     * Update personal info in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'codeforces' => 'nullable|url|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
        ]);

        $personalInfo = PersonalInfo::first() ?? new PersonalInfo();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($personalInfo->photo) {
                Storage::disk('public')->delete($personalInfo->photo);
            }

            $path = $request->file('photo')->store('profile', 'public');
            $validated['photo'] = $path;
        }

        $personalInfo->fill($validated);
        $personalInfo->save();

        return redirect()->route('admin.personal-info.edit')
            ->with('success', 'Personal information updated successfully.');
    }
}
