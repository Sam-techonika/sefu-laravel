<?php

namespace App\Providers;

use App\Enums\LocaleType;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the LocaleHelper as a singleton
        $this->app->singleton('locale-helper', function () {
            return new \App\Helpers\LocaleHelper();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set up supported locales for the application
        config(['app.supported_locales' => LocaleType::values()]);
        
        // Share current locale with all views
        view()->share('currentLocale', app()->getLocale());
        view()->share('supportedLocales', config('app.supported_locales'));
        // Share settings (key => value) with all views
        try {
            view()->share('settings', Setting::allAsArray());
        } catch (\Throwable $e) {
            // in case migrations haven't run yet or DB not available, ignore
        }
    }
}
