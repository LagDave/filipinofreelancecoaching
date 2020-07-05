<?php

namespace App\Providers;

use App\Announcement;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        View::composer('layouts.user_dashboard', function ($view) {
            $view->with('announcements', Announcement::orderBy('id', 'desc')->get());
        });
    }
}
