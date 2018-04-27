<?php

namespace App\Http\Middleware;

use Closure;

class AccountantMiddleware
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
        if ($request->user()->user_level !='accountant')
        {
            return redirect('dashboard')->with('admin','Not accessible if not an accountant');
        }
        return $next($request);
    }
}
