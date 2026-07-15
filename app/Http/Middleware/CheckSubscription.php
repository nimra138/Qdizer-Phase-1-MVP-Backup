<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Update status if trial/subscription has expired
        $user->refreshSubscriptionStatus();

        // Block expired users
        if (
            $user->isExpired() ||
            $user->isPastDue() ||
            $user->isCancelled()
        ) {
            return redirect()
                ->route('billing')
                ->with('error', 'Your subscription has expired. Please subscribe to continue.');
        }

        return $next($request);
    }
}