<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\PersonalInfo;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Achievement;
use App\Models\Research;
use App\Models\Certification;
use App\Models\Language;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the skills page.
     */
    public function skills()
    {
        $skills = Skill::ordered()->get()->groupBy('category');
        $languages = ProgrammingLanguage::ordered()->get();

        return view('skills', compact('skills', 'languages'));
    }

    /**
     * Display the projects page.
     */
    public function projects()
    {
        $projects = Project::ordered()->get();

        return view('projects', compact('projects'));
    }



    /**
     * Display the experience page.
     */
    public function experience()
    {
        $experiences = Experience::ordered()->get();

        return view('experience', compact('experiences'));
    }

    /**
     * Display the education page.
     */
    public function education()
    {
        $education = Education::ordered()->get();

        return view('education', compact('education'));
    }

    /**
     * Display the resume page.
     */
    public function resume()
    {
        $personalInfo = PersonalInfo::first();
        $skills = Skill::ordered()->get()->groupBy('category');
        $languages = ProgrammingLanguage::ordered()->get();
        $projects = Project::ordered()->get();
        $education = Education::ordered()->get();
        $experiences = Experience::ordered()->get();
        $achievements = Achievement::ordered()->get();
        $research = Research::ordered()->get();
        $certifications = Certification::ordered()->get();
        $spokenLanguages = Language::ordered()->get();

        return view('resume', compact(
            'personalInfo',
            'skills',
            'languages',
            'projects',
            'education',
            'experiences',
            'achievements',
            'research',
            'certifications',
            'spokenLanguages'
        ));
    }

    /**
     * Display the achievements page.
     */
    public function achievements()
    {
        $achievements = Achievement::ordered()->get()->groupBy('category');

        return view('achievements', compact('achievements'));
    }

    /**
     * Display the research page.
     */
    public function research()
    {
        $research = Research::ordered()->get();

        return view('research', compact('research'));
    }
}
