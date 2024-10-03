<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionCookieSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // リクエストのパスに応じてセッションクッキー名を設定
        if ($request->is('warehouse/*')) {
            config(['session.cookie' => config('session.warehouse_cookie')]);
        }
        elseif ($request->is('agency/*')) {
            config(['session.cookie' => config('session.agency_cookie')]);
        }

        return $next($request);
    }
}
