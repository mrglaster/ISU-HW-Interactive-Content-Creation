<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isadmin) {
            return $next($request);
        }

        // Если не является админом, можете перенаправить куда-то еще или вернуть ошибку 403
        abort(403, 'У вас нет прав для доступа к этой странице.');
    }
}
