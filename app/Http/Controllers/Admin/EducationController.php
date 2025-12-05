<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of education.
     */
    public function index()
    {
        $education = Education::ordered()->get();
        return view('admin.education.index', compact('education'));
    }

    /**
     * Show the form for creating new education.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created education in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'cgpa' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        Education::create($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education created successfully.');
    }

    /**
     * Show the form for editing the specified education.
     */
    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    /**
     * Update the specified education in storage.
     */
    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'cgpa' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $education->update($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education updated successfully.');
    }

    /**
     * Remove the specified education from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.education.index')
            ->with('success', 'Education deleted successfully.');
    }
}
