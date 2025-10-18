<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = auth()->user();
        if ($auth && $auth->type == 'admin'  && $auth->active) {
            config(['activitylog.enabled' => true]);

            app()->setLocale($auth->locale);
            View::share([
                'admin_language' => $auth->locale,
                'admin_dir' => $auth->locale == 'ar' ? 'rtl' : 'ltr',
                'admin_theme_style' => $auth->theme,
            ]);

            return $next($request);
        } else {
            auth()->logout();
            return redirect()->route('dashboard.login.view')->withErrors(['email' => __('auth.not_permission_for_this_action')]);
        }
    }
}
