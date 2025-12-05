<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Models\ProgrammingLanguage;
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
        $skills = Skill::ordered()->take(5)->get();
        $languages = ProgrammingLanguage::ordered()->take(5)->get();

        return view('home', compact('personalInfo', 'skills', 'languages'));
    }
}
