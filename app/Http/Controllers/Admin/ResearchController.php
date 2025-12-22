<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of research.
     */
    public function index()
    {
        $research = Research::ordered()->get();
        return view('admin.research.index', compact('research'));
    }

    /**
     * Show the form for creating a new research.
     */
    public function create()
    {
        return view('admin.research.create');
    }

    /**
     * Store a newly created research in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:journal,conference,book_chapter,patent,other',
            'authors' => 'required|string',
            'publication' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'url' => 'nullable|url|max:500',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        Research::create($validated);

        return redirect()->route('admin.research.index')
            ->with('success', 'Research added successfully.');
    }

    /**
     * Show the form for editing the specified research.
     */
    public function edit(Research $research)
    {
        return view('admin.research.edit', compact('research'));
    }

    /**
     * Update the specified research in storage.
     */
    public function update(Request $request, Research $research)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:journal,conference,book_chapter,patent,other',
            'authors' => 'required|string',
            'publication' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'url' => 'nullable|url|max:500',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $research->update($validated);

        return redirect()->route('admin.research.index')
            ->with('success', 'Research updated successfully.');
    }

    /**
     * Remove the specified research from storage.
     */
    public function destroy(Research $research)
    {
        $research->delete();

        return redirect()->route('admin.research.index')
            ->with('success', 'Research deleted successfully.');
    }
}
