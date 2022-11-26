<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SwearMiddleware
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
        foreach ($request->all() as $k => $v) {
            if (strstr($v, 'blemba') != false) {
                return redirect()->back()->withInput()->withErrors(['error' => 'Negalima naudoti keiskmažodžių']);
            }
        }
        return $next($request);
    }
}
