<?php

namespace App\Http\Middleware;

use App\Enums\LocaleType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);
        $supportedLocales = LocaleType::values();
        $defaultLocale = LocaleType::EN->value;

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        } else {
            $sessionLocale = session('locale', $defaultLocale);
            App::setLocale($sessionLocale);
        }

        return $next($request);
    }
}
