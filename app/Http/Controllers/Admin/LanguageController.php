<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of languages.
     */
    public function index()
    {
        $languages = Language::ordered()->get();
        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new language.
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created language in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|in:basic,intermediate,advanced,native',
            'order' => 'nullable|integer',
        ]);

        Language::create($validated);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language added successfully.');
    }

    /**
     * Show the form for editing the specified language.
     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified language in storage.
     */
    public function update(Request $request, Language $language)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|in:basic,intermediate,advanced,native',
            'order' => 'nullable|integer',
        ]);

        $language->update($validated);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language updated successfully.');
    }

    /**
     * Remove the specified language from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language deleted successfully.');
    }
}
