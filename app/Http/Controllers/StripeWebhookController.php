<?php

namespace App\Http\Controllers;

use App\Mail\PaymentFailedMail;
use App\Mail\PaymentSuccessMail;
use App\Mail\SubscriptionActivatedMail;
use App\Mail\SubscriptionCancelledMail;
use App\Models\SubscriptionTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierWebhookController;

class StripeWebhookController extends CashierWebhookController
{
    public function handleWebhook(Request $request)
    {
        // Let Cashier update subscriptions & subscription_items
        $response = parent::handleWebhook($request);

        $payload = json_decode($request->getContent(), true);

        switch ($payload['type'] ?? null) {

            /*
            |--------------------------------------------------------------------------
            | Subscription Created
            |--------------------------------------------------------------------------
            */

            case 'customer.subscription.created':

                $subscription = $payload['data']['object'];

                $user = User::where('stripe_id', $subscription['customer'])->first();
                  $user->updateDefaultPaymentMethodFromStripe();

                if (! $user) {

                    Log::warning('User not found for subscription.created', [
                        'customer' => $subscription['customer'],
                    ]);

                    break;
                }

                Mail::to($user->email)
                    ->send(new SubscriptionActivatedMail($user));

                break;

            /*
            |--------------------------------------------------------------------------
            | Invoice Paid
            |--------------------------------------------------------------------------
            */

            case 'invoice.payment_succeeded':

                $invoice = $payload['data']['object'];

                $user = User::where('stripe_id', $invoice['customer'])->first();

                if (! $user) {

                    Log::warning('User not found for invoice.payment_succeeded', [
                        'customer' => $invoice['customer'],
                    ]);

                    break;
                }

                // Prevent duplicate transactions
                if (
                    SubscriptionTransaction::where(
                        'stripe_invoice_id',
                        $invoice['id']
                    )->exists()
                ) {
                    break;
                }

                $transaction = SubscriptionTransaction::create([

                    'user_id' => $user->id,

                    'stripe_invoice_id' => $invoice['id'],

                    'stripe_payment_intent' => $invoice['payment_intent'] ?? null,

                    'stripe_subscription_id' => $invoice['subscription'],

                    'currency' => strtoupper($invoice['currency']),

                    'amount' => $invoice['subtotal'] / 100,

                    'vat' => ($invoice['total'] - $invoice['subtotal']) / 100,

                    'total' => $invoice['total'] / 100,

                    'status' => 'paid',

                    'payment_method' => 'card',

                    'paid_at' => now(),

                    'payload' => json_encode($invoice),

                ]);

                Mail::to($user->email)
                    ->send(new PaymentSuccessMail($user, $transaction));

                break;

            /*
            |--------------------------------------------------------------------------
            | Payment Failed
            |--------------------------------------------------------------------------
            */

            case 'invoice.payment_failed':

                $invoice = $payload['data']['object'];

                $user = User::where('stripe_id', $invoice['customer'])->first();

                if (! $user) {

                    Log::warning('User not found for invoice.payment_failed', [
                        'customer' => $invoice['customer'],
                    ]);

                    break;
                }

                Mail::to($user->email)
                    ->send(new PaymentFailedMail($user));

                break;

            /*
            |--------------------------------------------------------------------------
            | Subscription Cancelled
            |--------------------------------------------------------------------------
            */

            case 'customer.subscription.deleted':

                $subscription = $payload['data']['object'];

                $user = User::where('stripe_id', $subscription['customer'])->first();

                if (! $user) {

                    Log::warning('User not found for subscription.deleted', [
                        'customer' => $subscription['customer'],
                    ]);

                    break;
                }

                Mail::to($user->email)
                    ->send(new SubscriptionCancelledMail($user));

                break;
        }

        return $response;
    }
}