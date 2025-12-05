<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\IndividualCompetition;
use App\Models\OnlineJudge;
use App\Models\Project;
use App\Models\Skill;
use App\Models\TeamCompetition;
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
            'languages' => ProgrammingLanguage::count(),
            'projects' => Project::count(),
            'team_competitions' => TeamCompetition::count(),
            'individual_competitions' => IndividualCompetition::count(),
            'online_judges' => OnlineJudge::count(),
            'education' => Education::count(),
            'experiences' => Experience::count(),
        ];

        return view('admin.dashboard', compact('statistics'));
    }
}
