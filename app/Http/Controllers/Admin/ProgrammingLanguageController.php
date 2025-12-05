<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgrammingLanguage;
use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    /**
     * Display a listing of programming languages.
     */
    public function index()
    {
        $languages = ProgrammingLanguage::ordered()->get();
        return view('admin.programming-languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new programming language.
     */
    public function create()
    {
        return view('admin.programming-languages.create');
    }

    /**
     * Store a newly created programming language in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'proficiency_level' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        ProgrammingLanguage::create($validated);

        return redirect()->route('admin.programming-languages.index')
            ->with('success', 'Programming language created successfully.');
    }

    /**
     * Show the form for editing the specified programming language.
     */
    public function edit(ProgrammingLanguage $programmingLanguage)
    {
        return view('admin.programming-languages.edit', compact('programmingLanguage'));
    }

    /**
     * Update the specified programming language in storage.
     */
    public function update(Request $request, ProgrammingLanguage $programmingLanguage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'proficiency_level' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $programmingLanguage->update($validated);

        return redirect()->route('admin.programming-languages.index')
            ->with('success', 'Programming language updated successfully.');
    }

    /**
     * Remove the specified programming language from storage.
     */
    public function destroy(ProgrammingLanguage $programmingLanguage)
    {
        $programmingLanguage->delete();

        return redirect()->route('admin.programming-languages.index')
            ->with('success', 'Programming language deleted successfully.');
    }
}
