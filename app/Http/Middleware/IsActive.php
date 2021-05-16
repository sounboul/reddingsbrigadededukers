<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsActive
{
    /**
     * Handle an incoming request.
     *ß
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->is_active) {
            return $next($request);
        }
        return redirect()->route('logout')->with('error', 'Het account is nog niet geactiveerd. Dit kan enkele dagen duren');
    }
}
