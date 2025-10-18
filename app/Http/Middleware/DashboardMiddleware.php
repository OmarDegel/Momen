<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class DashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = auth()->user();
        if (!session()->has('site_title')) {
            session()->put('site_title', Setting::where('key', 'site_title')->value('value'));
        }

        $site_title = session('site_title');
        View::share('site_title', $site_title);
        if ($auth && $request->route()->getName() == 'dashboard.login.view') {
            return redirect()->route('dashboard.home.index');
        }
        return $next($request);
    }
}
