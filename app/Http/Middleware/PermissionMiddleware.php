<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();

        if (!$routeName) {

            return $next($request);
        }

        $routeName = Str::replaceFirst('dashboard.', '', $routeName);


        if (Str::endsWith($routeName, '.edit')) {
            $routeName = Str::replaceLast('.edit', '.update', $routeName);
        }
        if (Str::endsWith($routeName, '.create')) {
            $routeName = Str::replaceLast('.create', '.store', $routeName);
        }

        $auth = auth()->user();
        $user = User::with('roles.permissions')->find($auth->id);


        if (!$user->hasPermission($routeName)) {
            $permissionExists = DB::table('permissions')->where('name', $routeName)->exists();

            if (!$permissionExists) {
                return $next($request);
            }

            return redirect()->route('dashboard.unauthorized');
        }

        return $next($request);
    }
}
