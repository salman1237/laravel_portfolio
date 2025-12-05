<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndividualCompetition;
use Illuminate\Http\Request;

class IndividualCompetitionController extends Controller
{
    /**
     * Display a listing of individual competitions.
     */
    public function index()
    {
        $competitions = IndividualCompetition::ordered()->get();
        return view('admin.individual-competitions.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new individual competition.
     */
    public function create()
    {
        return view('admin.individual-competitions.create');
    }

    /**
     * Store a newly created individual competition in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'rating' => 'nullable|integer',
            'max_rating' => 'nullable|integer',
            'problems_solved' => 'nullable|integer',
            'rank' => 'nullable|string|max:255',
            'profile_url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
        ]);

        IndividualCompetition::create($validated);

        return redirect()->route('admin.individual-competitions.index')
            ->with('success', 'Individual competition created successfully.');
    }

    /**
     * Show the form for editing the specified individual competition.
     */
    public function edit(IndividualCompetition $individualCompetition)
    {
        return view('admin.individual-competitions.edit', compact('individualCompetition'));
    }

    /**
     * Update the specified individual competition in storage.
     */
    public function update(Request $request, IndividualCompetition $individualCompetition)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'rating' => 'nullable|integer',
            'max_rating' => 'nullable|integer',
            'problems_solved' => 'nullable|integer',
            'rank' => 'nullable|string|max:255',
            'profile_url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
        ]);

        $individualCompetition->update($validated);

        return redirect()->route('admin.individual-competitions.index')
            ->with('success', 'Individual competition updated successfully.');
    }

    /**
     * Remove the specified individual competition from storage.
     */
    public function destroy(IndividualCompetition $individualCompetition)
    {
        $individualCompetition->delete();

        return redirect()->route('admin.individual-competitions.index')
            ->with('success', 'Individual competition deleted successfully.');
    }
}
