<?php

namespace App\Providers;

use App\Models\ThemeSetting;
use Illuminate\Contracts\View\View;
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
        $theme = ThemeSetting::first() ?? new ThemeSetting();
    view()->share('theme', $theme);
    }
}
