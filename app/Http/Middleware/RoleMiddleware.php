<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     */
        if (!Auth::check()) {

        $user = Auth::user();
        if (!$user->hasAnyRole($roles)) {
            return redirect('dashboard');
        }

        return $next($request);
    }

}
