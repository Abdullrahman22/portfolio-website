<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToMessegePage
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
        return redirect('/admin/messeges');
        return $next($request);
    }
}
