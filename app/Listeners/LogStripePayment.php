<?php

namespace App\Listeners;

use App\Models\SubscriptionTransaction;
use App\Models\User;
use Laravel\Cashier\Events\WebhookHandled;

class LogStripePayment
{
    public function handle(WebhookHandled $event): void
    {
        $payload = $event->payload;

        // Only process successful invoice payments
        if (($payload['type'] ?? null) !== 'invoice.payment_succeeded') {
            return;
        }

        $invoice = $payload['data']['object'];

        $user = User::where('stripe_id', $invoice['customer'])->first();

        if (! $user) {
            return;
        }

        // Prevent duplicates
        if (SubscriptionTransaction::where('stripe_invoice_id', $invoice['id'])->exists()) {
            return;
        }

        SubscriptionTransaction::create([
            'user_id' => $user->id,
            'stripe_invoice_id' => $invoice['id'],
            'stripe_payment_intent' => $invoice['payment_intent'],
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
    }
}