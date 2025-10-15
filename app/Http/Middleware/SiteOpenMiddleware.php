<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteOpenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $site_open = Setting::where('key', 'site_open')->first();

        if ($site_open->value == 1) {
            return $next($request);
        } else {
            return response()->json([
                'success' => false,
                'message' => __('api.setting_close'),
            ], 401);
        }
    }
}
