<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTrialStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user) {

            if (
                $user->account_status === 'trial' &&
                now()->greaterThan($user->trial_end_at)
            ) {
                $user->update([
                    'account_status' => 'expired'
                ]);

                auth()->logout();

                return redirect('/login')
                    ->with('error', 'Your trial has expired.');
            }
        }

        return $next($request);
    }
}