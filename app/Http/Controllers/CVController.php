<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\IndividualCompetition;
use App\Models\OnlineJudge;
use App\Models\PersonalInfo;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Models\Skill;
use App\Models\TeamCompetition;
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
        $teamCompetitions = TeamCompetition::ordered()->get();
        $individualCompetitions = IndividualCompetition::ordered()->get();
        $judges = OnlineJudge::ordered()->get();
        $education = Education::ordered()->get();
        $experiences = Experience::ordered()->get();

        $pdf = Pdf::loadView('cv.template', compact(
            'personalInfo',
            'skills',
            'languages',
            'projects',
            'teamCompetitions',
            'individualCompetitions',
            'judges',
            'education',
            'experiences'
        ));

        $fileName = ($personalInfo->name ?? 'CV') . '_CV_' . date('Y-m-d') . '.pdf';

        return $pdf->download($fileName);
    }
}
