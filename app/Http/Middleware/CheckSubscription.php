<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
{
    $user = auth()->user();

    if ($user) {
        if ($user->status === 'trial' && now()->gt($user->trial_end)) {
            $user->update(['status' => 'expired']);
        }
    }

    return $next($request);
}
}
