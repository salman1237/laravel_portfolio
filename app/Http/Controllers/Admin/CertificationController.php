<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    /**
     * Display a listing of certifications.
     */
    public function index()
    {
        $certifications = Certification::ordered()->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new certification.
     */
    public function create()
    {
        return view('admin.certifications.create');
    }

    /**
     * Store a newly created certification in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'credential_url' => 'nullable|url|max:500',
            'order' => 'nullable|integer',
        ]);

        Certification::create($validated);

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification added successfully.');
    }

    /**
     * Show the form for editing the specified certification.
     */
    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    /**
     * Update the specified certification in storage.
     */
    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'credential_url' => 'nullable|url|max:500',
            'order' => 'nullable|integer',
        ]);

        $certification->update($validated);

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification updated successfully.');
    }

    /**
     * Remove the specified certification from storage.
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification deleted successfully.');
    }
}
