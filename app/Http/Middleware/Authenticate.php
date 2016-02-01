<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class Authenticate
{
    /**
     * Check if the user has valid credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        $suppliedUserId = $request->header('X-USER-ID');
        $suppliedToken = $request->header('X-AUTH-TOKEN');

        $user = User::where('id', $suppliedUserId)
            ->where('token', $suppliedToken)
            ->first();
        if ($user == null) return response('Invalid user header data.', 401);

        return $next($request);
    }
}
