<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Billing Page
     */
    public function index()
    {
        $user = auth()->user();

        $subscription = $user->subscription('default');

        return view('user.subscription.billing', [
            'user' => $user,
            'subscription' => $subscription,
            'hasSubscription' => $user->subscribed('default'),
            'isTrial' => $subscription?->onTrial() ?? false,
            'transactions' => $user->transactions()
                ->latest()
                ->paginate(10),
        ]);
    }

    /**
     * Subscribe User
     */
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
                'cancel_url'  => route('billing'),
                'client_reference_id' => $user->id,
            ]);
    }

    /**
     * Stripe Success Page
     */
    public function success()
    {
        return redirect()
            ->route('billing')
            ->with(
                'success',
                'Payment completed successfully. Your subscription is now active.'
            );
    }

    /**
     * Cancel Subscription
     */
    public function cancel(Request $request)
    {
        $user = $request->user();

        if (! $user->subscribed('default')) {

            return back()->with(
                'error',
                'You do not have an active subscription.'
            );
        }

        $user->subscription('default')->cancel();

        return back()->with(
            'success',
            'Your subscription has been scheduled for cancellation at the end of the current billing period.'
        );
    }

    /**
     * Resume Subscription
     */
    public function resume(Request $request)
    {
        $user = $request->user();

        $subscription = $user->subscription('default');

        if (! $subscription || ! $subscription->onGracePeriod()) {

            return back()->with(
                'error',
                'Subscription cannot be resumed.'
            );
        }

        $subscription->resume();

        return back()->with(
            'success',
            'Subscription resumed successfully.'
        );
    }
}