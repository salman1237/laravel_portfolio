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
     * Display the competitive programming page.
     */
    public function competitive()
    {
        $teamCompetitions = TeamCompetition::ordered()->get();
        $individualCompetitions = IndividualCompetition::ordered()->get();

        return view('competitive', compact('teamCompetitions', 'individualCompetitions'));
    }

    /**
     * Display the online judges page.
     */
    public function judges()
    {
        $judges = OnlineJudge::ordered()->get();

        return view('judges', compact('judges'));
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
        $teamCompetitions = TeamCompetition::ordered()->get();
        $individualCompetitions = IndividualCompetition::ordered()->get();
        $judges = OnlineJudge::ordered()->get();
        $education = Education::ordered()->get();
        $experiences = Experience::ordered()->get();

        return view('resume', compact(
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
    }
}
