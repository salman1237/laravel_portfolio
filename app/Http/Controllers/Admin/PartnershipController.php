<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    /**
     * Display a listing of partnerships.
     */
    public function index()
    {
        $partnerships = Partnership::ordered()->get();
        return view('admin.partnerships.index', compact('partnerships'));
    }

    /**
     * Show the form for creating a new partnership.
     */
    public function create()
    {
        return view('admin.partnerships.create');
    }

    /**
     * Store a newly created partnership in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partnerships/logos', 'public');
            $validated['logo'] = $logoPath;
        }

        $validated['is_active'] = $request->has('is_active');

        Partnership::create($validated);

        return redirect()->route('admin.partnerships.index')
            ->with('success', 'Partnership created successfully.');
    }

    /**
     * Show the form for editing the specified partnership.
     */
    public function edit(Partnership $partnership)
    {
        return view('admin.partnerships.edit', compact('partnership'));
    }

    /**
     * Update the specified partnership in storage.
     */
    public function update(Request $request, Partnership $partnership)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($partnership->logo && \Storage::disk('public')->exists($partnership->logo)) {
                \Storage::disk('public')->delete($partnership->logo);
            }
            
            $logoPath = $request->file('logo')->store('partnerships/logos', 'public');
            $validated['logo'] = $logoPath;
        }

        $validated['is_active'] = $request->has('is_active');

        $partnership->update($validated);

        return redirect()->route('admin.partnerships.index')
            ->with('success', 'Partnership updated successfully.');
    }

    /**
     * Remove the specified partnership from storage.
     */
    public function destroy(Partnership $partnership)
    {
        // Delete logo file
        if ($partnership->logo && \Storage::disk('public')->exists($partnership->logo)) {
            \Storage::disk('public')->delete($partnership->logo);
        }

        $partnership->delete();

        return redirect()->route('admin.partnerships.index')
            ->with('success', 'Partnership deleted successfully.');
    }

    /**
     * Toggle the active status of the specified partnership.
     */
    public function toggleStatus(Partnership $partnership)
    {
        $partnership->update([
            'is_active' => !$partnership->is_active
        ]);

        return response()->json([
            'success' => true,
            'is_active' => $partnership->is_active
        ]);
    }
}
