<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlineJudge;
use Illuminate\Http\Request;

class OnlineJudgeController extends Controller
{
    /**
     * Display a listing of online judges.
     */
    public function index()
    {
        $judges = OnlineJudge::ordered()->get();
        return view('admin.online-judges.index', compact('judges'));
    }

    /**
     * Show the form for creating a new online judge.
     */
    public function create()
    {
        return view('admin.online-judges.create');
    }

    /**
     * Store a newly created online judge in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'rating' => 'nullable|integer',
            'problems_solved' => 'nullable|integer',
            'profile_url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
        ]);

        OnlineJudge::create($validated);

        return redirect()->route('admin.online-judges.index')
            ->with('success', 'Online judge profile created successfully.');
    }

    /**
     * Show the form for editing the specified online judge.
     */
    public function edit(OnlineJudge $onlineJudge)
    {
        return view('admin.online-judges.edit', compact('onlineJudge'));
    }

    /**
     * Update the specified online judge in storage.
     */
    public function update(Request $request, OnlineJudge $onlineJudge)
    {
        $validated = $request->validate([
            'platform_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'rating' => 'nullable|integer',
            'problems_solved' => 'nullable|integer',
            'profile_url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
        ]);

        $onlineJudge->update($validated);

        return redirect()->route('admin.online-judges.index')
            ->with('success', 'Online judge profile updated successfully.');
    }

    /**
     * Remove the specified online judge from storage.
     */
    public function destroy(OnlineJudge $onlineJudge)
    {
        $onlineJudge->delete();

        return redirect()->route('admin.online-judges.index')
            ->with('success', 'Online judge profile deleted successfully.');
    }
}
