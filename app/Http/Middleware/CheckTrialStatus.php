<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckTrialStatus
{
     
    public function handle($request, Closure $next)
{
    $user = auth()->user();

    if ($user) {

        $subscription = $user->subscription('default');

        if (
            $subscription &&
            $subscription->ends_at &&
            Carbon::now()->greaterThan($subscription->ends_at) &&
            $user->status !== 'expired'
        ) {
            $user->update([
                'status' => 'expired',
            ]);
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