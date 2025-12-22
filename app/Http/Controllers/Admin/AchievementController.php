<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of achievements.
     */
    public function index()
    {
        $achievements = Achievement::ordered()->get();
        return view('admin.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new achievement.
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created achievement in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:entrepreneurship,programming,hackathon,other',
            'position' => 'nullable|string|max:255',
            'organization' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        Achievement::create($validated);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement added successfully.');
    }

    /**
     * Show the form for editing the specified achievement.
     */
    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified achievement in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:entrepreneurship,programming,hackathon,other',
            'position' => 'nullable|string|max:255',
            'organization' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $achievement->update($validated);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement updated successfully.');
    }

    /**
     * Remove the specified achievement from storage.
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement deleted successfully.');
    }
}
