<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Achievement;
use App\Models\Research;
use App\Models\Certification;
use App\Models\Language;
use App\Models\ProgrammingLanguage;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $statistics = [
            'skills' => Skill::count(),
            'programming_languages' => ProgrammingLanguage::count(),
            'projects' => Project::count(),
            'education' => Education::count(),
            'experiences' => Experience::count(),
            'achievements' => Achievement::count(),
            'research' => Research::count(),
            'certifications' => Certification::count(),
            'languages' => Language::count(),
        ];

        return view('admin.dashboard', compact('statistics'));
    }
}
