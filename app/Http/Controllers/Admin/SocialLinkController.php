<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of social links.
     */
    public function index()
    {
        $socialLinks = SocialLink::withoutGlobalScope('order')->orderBy('display_order')->get();
        return view('admin.social-links.index', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new social link.
     */
    public function create()
    {
        // Get next display order
        $nextOrder = SocialLink::max('display_order') + 1;
        return view('admin.social-links.create', compact('nextOrder'));
    }

    /**
     * Store a newly created social link in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'url' => 'required|url|max:500',
            'display_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('social_icons', 'public');
            $validated['icon'] = $iconPath;
        }

        $validated['is_active'] = $request->has('is_active');

        SocialLink::create($validated);

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link created successfully!');
    }

    /**
     * Show the form for editing the specified social link.
     */
    public function edit(SocialLink $socialLink)
    {
        return view('admin.social-links.edit', compact('socialLink'));
    }

    /**
     * Update the specified social link in storage.
     */
    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'url' => 'required|url|max:500',
            'display_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        // Handle icon upload (only if new file provided)
        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($socialLink->icon && Storage::disk('public')->exists($socialLink->icon)) {
                Storage::disk('public')->delete($socialLink->icon);
            }
            
            $iconPath = $request->file('icon')->store('social_icons', 'public');
            $validated['icon'] = $iconPath;
        }

        $validated['is_active'] = $request->has('is_active');

        $socialLink->update($validated);

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link updated successfully!');
    }

    /**
     * Remove the specified social link from storage.
     */
    public function destroy(SocialLink $socialLink)
    {
        // Delete icon file
        if ($socialLink->icon && Storage::disk('public')->exists($socialLink->icon)) {
            Storage::disk('public')->delete($socialLink->icon);
        }

        $socialLink->delete();

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link deleted successfully!');
    }
}
