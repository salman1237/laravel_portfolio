<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of skills.
     */
    public function index()
    {
        $skills = Skill::ordered()->get();
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created skill in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'proficiency_level' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('skills/icons', 'public');
            $validated['icon'] = $iconPath;
        }

        Skill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill created successfully.');
    }

    /**
     * Show the form for editing the specified skill.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified skill in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'proficiency_level' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($skill->icon && \Storage::disk('public')->exists($skill->icon)) {
                \Storage::disk('public')->delete($skill->icon);
            }
            
            $iconPath = $request->file('icon')->store('skills/icons', 'public');
            $validated['icon'] = $iconPath;
        }

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified skill from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
