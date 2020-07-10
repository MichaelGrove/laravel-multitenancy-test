<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language\Language;

class VerifyLocale
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
        if ($request->method() === 'GET') {
            $segment = $request->segment(1);

            if (!Language::localeIsValid($segment)) {
                return abort(404);
                // $segments = $request->segments();
                // array_shift($segments);
                // $fallback = session('locale') ?: config('app.fallback_locale');
                // array_unshift($segments, $fallback);
                // return redirect()->to(implode('/', $segments));
            }

            session(['locale' => $segment]);
            \App::setLocale($segment);
        }
        return $next($request);
    }
}
