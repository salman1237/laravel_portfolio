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
        // Share personalInfo with all views that use the main layout
        View::composer('layouts.app', function ($view) {
            $personalInfo = PersonalInfo::first();
            $view->with('personalInfo', $personalInfo);
        });
    }
}
