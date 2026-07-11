<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $subscription = $user->subscription('default');

        $transactions = $user->transactions()
            ->latest()
            ->paginate(10);

        return view('user.subscription.billing', [

            'user' => $user,

            'subscription' => $subscription,

            'hasSubscription' => $user->subscribed('default'),

            'isTrial' => $user->onTrial('default'),

            'trialEndsAt' => $user->trial_ends_at,

            'transactions' => $transactions,

        ]);
    }

    public function subscribe(Request $request)
    {
        $user = $request->user();

        if ($user->subscribed('default')) {

            return redirect()
                ->route('billing')
                ->with('info', 'You already have an active subscription.');

        }

        return $user
            ->newSubscription(
                'default',
                env('STRIPE_PRICE_ID')
            )
            ->checkout([

                'success_url' => route('billing.success'),

                'cancel_url' => route('billing'),

                'client_reference_id' => $user->id,

            ]);
    }

    public function success()
    {
        return redirect()
            ->route('billing')
            ->with(
                'success',
                'Payment successful. Your subscription will be activated shortly.'
            );
    }
}