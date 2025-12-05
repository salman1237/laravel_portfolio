<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamCompetition;
use Illuminate\Http\Request;

class TeamCompetitionController extends Controller
{
    /**
     * Display a listing of team competitions.
     */
    public function index()
    {
        $competitions = TeamCompetition::ordered()->get();
        return view('admin.team-competitions.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new team competition.
     */
    public function create()
    {
        return view('admin.team-competitions.create');
    }

    /**
     * Store a newly created team competition in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'competition_name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'team_name' => 'nullable|string|max:255',
            'rank' => 'nullable|string|max:255',
            'award' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        TeamCompetition::create($validated);

        return redirect()->route('admin.team-competitions.index')
            ->with('success', 'Team competition created successfully.');
    }

    /**
     * Show the form for editing the specified team competition.
     */
    public function edit(TeamCompetition $teamCompetition)
    {
        return view('admin.team-competitions.edit', compact('teamCompetition'));
    }

    /**
     * Update the specified team competition in storage.
     */
    public function update(Request $request, TeamCompetition $teamCompetition)
    {
        $validated = $request->validate([
            'competition_name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'team_name' => 'nullable|string|max:255',
            'rank' => 'nullable|string|max:255',
            'award' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $teamCompetition->update($validated);

        return redirect()->route('admin.team-competitions.index')
            ->with('success', 'Team competition updated successfully.');
    }

    /**
     * Remove the specified team competition from storage.
     */
    public function destroy(TeamCompetition $teamCompetition)
    {
        $teamCompetition->delete();

        return redirect()->route('admin.team-competitions.index')
            ->with('success', 'Team competition deleted successfully.');
    }
}
