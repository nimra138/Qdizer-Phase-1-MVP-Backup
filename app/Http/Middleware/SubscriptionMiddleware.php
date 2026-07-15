<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Check Stripe subscription
        $subscription = $user->subscription('default');

        if ($subscription) {

            // Expired subscription
            if ($subscription->ends_at && Carbon::now()->greaterThan($subscription->ends_at)) {

                $user->update([
                    'status' => 'expired',
                ]);

                return redirect()
                    ->route('billing')
                    ->with('error', 'Your subscription has expired.');
            }

            // Active subscription
            if ($subscription->valid()) {

                if ($user->status !== 'active') {
                    $user->update([
                        'status' => 'active',
                    ]);
                }

                return $next($request);
            }
        }

        // Free trial
        if ($user->trial_end && Carbon::now()->lessThan($user->trial_end)) {

            if ($user->status !== 'trial') {
                $user->update([
                    'status' => 'trial',
                ]);
            }

            return $next($request);
        }

        // Trial expired
        $user->update([
            'status' => 'expired',
        ]);

        return redirect()
            ->route('billing')
            ->with('error', 'Your trial has expired. Please subscribe.');
    }
}