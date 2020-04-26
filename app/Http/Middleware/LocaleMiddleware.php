<?php

namespace App\Http\Middleware;

use Closure;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = request()->segment(1);
        if (!in_array($lang, ['ka', 'en', '']) && !request()->is('admin*')) {
            abort(404);
        }
        
        app()->setLocale($lang);

        return $next($request);
    }
}
