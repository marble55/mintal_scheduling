<?php

namespace App\Providers;

use App\Services\AcademicCalendarService;
use App\Services\ScheduleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('current_academic_year', function($app){
            return new AcademicCalendarService;
        });

        $this->app->singleton(ScheduleService::class, function(){
            return new ScheduleService();
        });

        $this->app->singleton('user_image', function($app){
            return Auth::user()->faculty->profile_image;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
