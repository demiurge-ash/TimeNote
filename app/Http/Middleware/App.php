<?php

namespace TimeNote\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class App
{
    const SESSION_KEY = 'locale';

    /**
     * App constructor. Set locale
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $session = $request->getSession();

        if (!$session->has(self::SESSION_KEY)) {
            $session->put(self::SESSION_KEY, $request->getPreferredLanguage(config('app.languages')));
        }

        if ($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, config('app.languages'))) {
                $session->put(self::SESSION_KEY, $lang);
            }
        }
        app()->setLocale($session->get(self::SESSION_KEY));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
