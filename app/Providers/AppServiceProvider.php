<?php

namespace App\Providers;

use App\Models\PersonalInfo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share personalInfo with the layout and every public page (needed for per-page SEO meta tags)
        View::composer([
            'layouts.app', 'home', 'skills', 'projects', 'experience', 'education',
            'achievements', 'research', 'certifications', 'languages', 'resume',
        ], function ($view) {
            $personalInfo = PersonalInfo::first();
            $view->with('personalInfo', $personalInfo);
        });
    }
}
