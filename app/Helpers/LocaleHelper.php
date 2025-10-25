<?php

namespace App\Helpers;

use App\Enums\LocaleType;
use Illuminate\Support\Facades\Route;

class LocaleHelper
{
    /**
     * Generate URL for the current route with a different locale
     */
    public static function getLocalizedUrl(string $locale): string
    {
        $currentRoute = Route::current();
        
        if (!$currentRoute) {
            return route('home', ['locale' => $locale]);
        }

        $parameters = $currentRoute->parameters();
        $parameters['locale'] = $locale;

        try {
            return route($currentRoute->getName(), $parameters);
        } catch (\Exception $e) {
            // Fallback to home page with the new locale
            return route('home', ['locale' => $locale]);
        }
    }

    /**
     * Get all supported locales
     */
    public static function getSupportedLocales(): array
    {
        return LocaleType::values();
    }

    /**
     * Check if a locale is supported
     */
    public static function isSupported(string $locale): bool
    {
        return in_array($locale, static::getSupportedLocales());
    }
}