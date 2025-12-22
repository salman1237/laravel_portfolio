<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\IndividualCompetitionController;
use App\Http\Controllers\Admin\OnlineJudgeController;
use App\Http\Controllers\Admin\PersonalInfoController;
use App\Http\Controllers\Admin\ProgrammingLanguageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TeamCompetitionController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');

Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience');
Route::get('/education', [PortfolioController::class, 'education'])->name('education');
Route::get('/achievements', [PortfolioController::class, 'achievements'])->name('achievements');
Route::get('/research', [PortfolioController::class, 'research'])->name('research');
Route::get('/resume', [PortfolioController::class, 'resume'])->name('resume');
Route::get('/cv/download', [CVController::class, 'download'])->name('cv.download');

// Breeze Dashboard - redirect to admin dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes (Auth Required)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Personal Info (Edit only)
    Route::get('/personal-info/edit', [PersonalInfoController::class, 'edit'])->name('personal-info.edit');
    Route::put('/personal-info', [PersonalInfoController::class, 'update'])->name('personal-info.update');

    // Resource Routes
    Route::resource('skills', SkillController::class)->except(['show']);
    Route::resource('programming-languages', ProgrammingLanguageController::class)->except(['show']);
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('team-competitions', TeamCompetitionController::class)->except(['show']);
    Route::resource('individual-competitions', IndividualCompetitionController::class)->except(['show']);
    Route::resource('online-judges', OnlineJudgeController::class)->except(['show']);
    Route::resource('education', EducationController::class)->except(['show']);
    Route::resource('experiences', ExperienceController::class)->except(['show']);
    
    // New Resource Routes
    Route::resource('languages', LanguageController::class)->except(['show']);
    Route::resource('certifications', CertificationController::class)->except(['show']);
    Route::resource('achievements', AchievementController::class)->except(['show']);
    Route::resource('research', ResearchController::class)->except(['show']);
});

// Breeze Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

