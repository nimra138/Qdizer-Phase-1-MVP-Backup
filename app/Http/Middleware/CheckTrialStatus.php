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
            $user &&
            $user->status === 'trial' &&
            $user->trial_end &&
            now()->gt($user->trial_end)
        ) {
            // Update only once
            if ($user->status !== 'expired') {
                $user->update([
                    'status' => 'expired'
                ]);
            }

                auth()->logout();

                 return redirect()->route('subscription.expired')
                ->with('error', 'Your trial has expired. Please upgrade.');
            }
        }

        return $next($request);
    }
}

// @if(auth()->user()->status == 'expired')
//     <button disabled>Generate PDF</button>
// @else
//     <button>Generate PDF</button>
// @endif