<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
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
        if (auth()->check()) {

            $role = auth()->user()->role;

            if (in_array($role, ['5', '1'])) {

                return $next($request);
            }

            abort(403, '管理者権限がありません。');
        }
    }
}
