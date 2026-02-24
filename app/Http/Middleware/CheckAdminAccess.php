<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAccess
{
     public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            if (Auth::user()->id_role == 1){
                abort(403, 'Доступ запрещен');
            }
        }

        return $next($request);
    }
}
