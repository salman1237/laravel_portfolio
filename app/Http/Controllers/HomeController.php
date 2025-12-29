<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $personalInfo = PersonalInfo::first();
        
        // Get languages and frameworks
        $languages = Skill::where('category', 'Languages and Framework')
            ->ordered()
            ->take(6)
            ->get();
        
        // Get other skills (Software Development, AI & ML, Project Management)
        $skills = Skill::whereNotIn('category', ['Languages and Framework'])
            ->ordered()
            ->get()
            ->groupBy('category');

        return view('home', compact('personalInfo', 'skills', 'languages'));
    }
}

