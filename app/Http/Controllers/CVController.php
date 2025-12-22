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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CVController extends Controller
{
    /**
     * Generate and download CV as PDF.
     */
    public function download()
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

        $pdf = Pdf::loadView('cv.template', compact(
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

        $fileName = ($personalInfo->name ?? 'CV') . '_CV_' . date('Y-m-d') . '.pdf';

        return $pdf->download($fileName);
    }
}
