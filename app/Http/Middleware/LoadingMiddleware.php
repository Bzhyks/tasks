<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoadingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return null;
        $user = $request->user();
        if ($user != null) {
            if ($user->name == 'Paulius') {
                return $next($request);
            }
        }
        return redirect()->route('home');
    }
}
