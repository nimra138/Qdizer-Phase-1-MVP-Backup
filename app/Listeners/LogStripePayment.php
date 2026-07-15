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

        if (($payload['type'] ?? null) !== 'invoice.payment_succeeded') {
            return;
        }

        $invoice = $payload['data']['object'];

        $user = User::where('stripe_id', $invoice['customer'])->first();

        if (! $user) {
            return;
        }

        if (SubscriptionTransaction::where('stripe_invoice_id', $invoice['id'])->exists()) {
            return;
        }

        SubscriptionTransaction::create([
            'user_id' => $user->id,

            'stripe_invoice_id' => $invoice['id'],

            'stripe_payment_intent' => $invoice['payment_intent'] ?? null,

            'stripe_subscription_id' => $invoice['subscription'] ?? null,

            'currency' => strtoupper($invoice['currency'] ?? 'AED'),

            'amount' => ($invoice['subtotal'] ?? 0) / 100,

            'vat' => (($invoice['total'] ?? 0) - ($invoice['subtotal'] ?? 0)) / 100,

            'total' => ($invoice['total'] ?? 0) / 100,

            'status' => 'paid',

            'payment_method' => 'card',

            'paid_at' => now(),

            'payload' => json_encode($invoice),
        ]);
    }
}