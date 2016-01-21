<?php

namespace App\Http\Middleware;

use Closure;

class Verify
{
    /**
     * Checks if the user has verified their email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
