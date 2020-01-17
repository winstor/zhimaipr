<?php

namespace App\Http\Middleware;

use Closure;

class EnableRoutePermission
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
        config(['admin.check_route_permission'=>false],false);
        config(['admin.check_menu_roles'=>false],false);

        return $next($request);
    }
}
