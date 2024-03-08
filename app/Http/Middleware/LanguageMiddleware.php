<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageMiddleware
{

    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            app()->setLocale(config('app.locale'));
        }
        return $response;
    }

}

