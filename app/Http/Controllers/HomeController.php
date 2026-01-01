<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $personalInfo = PersonalInfo::first();
        
        // Get all skills grouped by category (including Languages and Framework)
        $skills = Skill::ordered()
            ->get()
            ->groupBy('category');
        
        // Get recent experiences (top 4)
        $experiences = \App\Models\Experience::ordered()
            ->take(4)
            ->get();

        // Get active partnerships
        $partnerships = \App\Models\Partnership::active()->ordered()->get();

        // Get active social links
        $socialLinks = SocialLink::active()->get();

        return view('home', compact('personalInfo', 'skills', 'experiences', 'partnerships', 'socialLinks'));
    }
}

