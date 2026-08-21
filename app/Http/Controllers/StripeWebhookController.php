<?php

namespace App\Http\Controllers;

use App\Mail\PaymentFailedMail;
use App\Mail\PaymentSuccessMail;
use App\Mail\SubscriptionActivatedMail;
use App\Mail\SubscriptionCancelledMail;
use App\Models\SubscriptionTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierWebhookController;
use Stripe\StripeClient;

class StripeWebhookController extends CashierWebhookController
{
    /**
     * Stripe webhook handler.
     */
    public function handleWebhook(Request $request)
    {
        Log::info('================ STRIPE WEBHOOK ================');

        $payload = $request->all();

        $eventType = $payload['type'] ?? null;

        Log::info('Stripe Event Received', [
            'type' => $eventType,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Let Cashier process the webhook first
        |--------------------------------------------------------------------------
        */

        $response = parent::handleWebhook($request);

        /*
        |--------------------------------------------------------------------------
        | Stripe Object
        |--------------------------------------------------------------------------
        */

        $object = $payload['data']['object'] ?? [];

        /*
        |--------------------------------------------------------------------------
        | Events without customer
        |--------------------------------------------------------------------------
        */

        $stripeCustomerId = $object['customer'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Some events don't have customer directly
        |--------------------------------------------------------------------------
        */

        if (!$stripeCustomerId && isset($object['customer_details']['email'])) {

            $user = User::where(
                'email',
                $object['customer_details']['email']
            )->first();

        } else {

            $user = $stripeCustomerId
                ? User::where('stripe_id', $stripeCustomerId)->first()
                : null;
        }

        /*
        |--------------------------------------------------------------------------
        | Events we don't need to process
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            Log::warning('User not found for Stripe event', [
                'stripe_customer_id' => $stripeCustomerId,
                'event' => $eventType,
            ]);

            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | CUSTOMER SUBSCRIPTION CREATED
        |--------------------------------------------------------------------------
        */

        if ($eventType === 'customer.subscription.created') {

            $this->handleSubscriptionCreated(
                $user,
                $object
            );

            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | CUSTOMER SUBSCRIPTION UPDATED
        |--------------------------------------------------------------------------
        */

        if ($eventType === 'customer.subscription.updated') {

            $this->handleSubscriptionUpdated(
                $user,
                $object
            );
            $user->update([
                'subscription_start' => now()->format('Y-m-d'),
                'subscription_end'   => now()->addDays(30)->format('Y-m-d'),
            ]);
            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | INVOICE PAYMENT SUCCESS
        |--------------------------------------------------------------------------
        |
        | This is the important event for your application.
        |
        | Your business logic:
        |
        | 7 days free trial
        |        ↓
        | User pays
        |        ↓
        | 30 days paid subscription
        |
        */

        if ($eventType === 'invoice.payment_succeeded') {

            $this->handleSuccessfulPayment(
                $user,
                $object
            );
           
            Mail::to($user->email)->send(
            new SubscriptionActivatedMail($user)
            );
            return $response;
        }


        /*
        |--------------------------------------------------------------------------
        | INVOICE PAYMENT FAILED
        |--------------------------------------------------------------------------
        */

        if ($eventType === 'invoice.payment_failed') {

            $user->update([
                'status' => 'past_due',
            ]);

            Log::warning('Stripe payment failed', [
                'user_id' => $user->id,
                'invoice' => $object['id'] ?? null,
            ]);

            Mail::to($user->email)->send(
                new PaymentFailedMail($user)
            );

            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | SUBSCRIPTION CANCELLED
        |--------------------------------------------------------------------------
        */

        if ($eventType === 'customer.subscription.deleted') {

            $subscriptionEnd = null;

            if (!empty($object['current_period_end'])) {

                $subscriptionEnd = Carbon::createFromTimestamp(
                    $object['current_period_end']
                );
            }

            /*
            |--------------------------------------------------------------------------
            | If Stripe doesn't provide period end,
            | keep the existing subscription end.
            |--------------------------------------------------------------------------
            */

            if (!$subscriptionEnd) {
                $subscriptionEnd = $user->subscription_end;
            }

            $user->update([
                'status' => 'cancelled',
                'subscription_end' => $subscriptionEnd,
            ]);

            Log::info('Stripe subscription cancelled', [
                'user_id' => $user->id,
                'subscription_end' => $subscriptionEnd,
            ]);

            Mail::to($user->email)->send(
                new SubscriptionCancelledMail($user)
            );

            return $response;
        }

        return $response;
    }


    /**
     * Handle subscription.created
     */
    protected function handleSubscriptionCreated(
        User $user,
        array $subscription
    ): void {

        $stripeStatus = $subscription['status'] ?? null;

        Log::info('Processing subscription.created', [
            'user_id' => $user->id,
            'stripe_status' => $stripeStatus,
            'subscription_id' => $subscription['id'] ?? null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Sync Payment Method
        |--------------------------------------------------------------------------
        */

        $this->syncPaymentMethod(
            $user,
            $subscription
        );

        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        |
        | Don't overwrite your application trial dates with null.
        |
        */

        $data = [];

        /*
        |--------------------------------------------------------------------------
        | Stripe Trial
        |--------------------------------------------------------------------------
        */

        if (!empty($subscription['trial_start'])) {

            $data['trial_start'] = Carbon::createFromTimestamp(
                $subscription['trial_start']
            );
        }

        if (!empty($subscription['trial_end'])) {

            $trialEnd = Carbon::createFromTimestamp(
                $subscription['trial_end']
            );

            $data['trial_end'] = $trialEnd;
            $data['trial_ends_at'] = $trialEnd;
        }

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        if ($stripeStatus === 'trialing') {

            $data['status'] = 'trial';
        }

        /*
        |--------------------------------------------------------------------------
        | Active subscription
        |--------------------------------------------------------------------------
        |
        | If subscription is immediately active, payment will be handled
        | by invoice.payment_succeeded.
        |
        */

        if ($stripeStatus === 'active') {

            $data['status'] = 'active';
        }

        if (!empty($data)) {
            $user->update($data);
        }

        $user->refresh();

        Log::info('Subscription created processed', [

            'user_id' => $user->id,

            'stripe_subscription_id' =>
                $subscription['id'] ?? null,

            'stripe_status' =>
                $stripeStatus,

            'application_status' =>
                $user->status,

            'pm_type' =>
                $user->pm_type,

            'pm_last_four' =>
                $user->pm_last_four,

            'trial_start' =>
                $user->trial_start,

            'trial_end' =>
                $user->trial_end,

            'trial_ends_at' =>
                $user->trial_ends_at,

            'subscription_start' =>
                $user->subscription_start,

            'subscription_end' =>
                $user->subscription_end,
        ]);
    }


    /**
     * Handle subscription.updated
     */
    protected function handleSubscriptionUpdated(
        User $user,
        array $subscription
    ): void {

        $stripeStatus = $subscription['status'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Payment method
        |--------------------------------------------------------------------------
        */

        $this->syncPaymentMethod(
            $user,
            $subscription
        );

        /*
        |--------------------------------------------------------------------------
        | Determine application status
        |--------------------------------------------------------------------------
        */

        $status = match ($stripeStatus) {

            'trialing' =>
                'trial',

            'active' =>
                'active',

            'past_due' =>
                'past_due',

            'canceled' =>
                'cancelled',

            'unpaid' =>
                'expired',

            'incomplete' =>
                'past_due',

            'incomplete_expired' =>
                'expired',

            default =>
                $user->status,
        };

        /*
        |--------------------------------------------------------------------------
        | Don't overwrite existing custom dates with null
        |--------------------------------------------------------------------------
        */

        $data = [
            'status' => $status,
        ];

        /*
        |--------------------------------------------------------------------------
        | Trial dates
        |--------------------------------------------------------------------------
        */

        if (!empty($subscription['trial_start'])) {

            $data['trial_start'] =
                Carbon::createFromTimestamp(
                    $subscription['trial_start']
                );
        }

        if (!empty($subscription['trial_end'])) {

            $trialEnd =
                Carbon::createFromTimestamp(
                    $subscription['trial_end']
                );

            $data['trial_end'] = $trialEnd;
            $data['trial_ends_at'] = $trialEnd;
        }

        /*
        |--------------------------------------------------------------------------
        | Only use Stripe subscription dates if they actually exist
        |--------------------------------------------------------------------------
        */

        if (!empty($subscription['current_period_start'])) {

            $data['subscription_start'] =
                Carbon::createFromTimestamp(
                    $subscription['current_period_start']
                );
        }

        if (!empty($subscription['current_period_end'])) {

            $data['subscription_end'] =
                Carbon::createFromTimestamp(
                    $subscription['current_period_end']
                );
        }

        $user->update($data);

        $user->refresh();

        Log::info('USER SUBSCRIPTION DATA UPDATED', [

            'user_id' =>
                $user->id,

            'status' =>
                $user->status,

            'stripe_status' =>
                $stripeStatus,

            'pm_type' =>
                $user->pm_type,

            'pm_last_four' =>
                $user->pm_last_four,

            'trial_start' =>
                $user->trial_start,

            'trial_end' =>
                $user->trial_end,

            'trial_ends_at' =>
                $user->trial_ends_at,

            'subscription_start' =>
                $user->subscription_start,

            'subscription_end' =>
                $user->subscription_end,
        ]);
    }


    /**
     * Sync payment method directly from Stripe.
     */
    protected function syncPaymentMethod(
        User $user,
        array $stripeObject = []
    ): void {

        try {

            /*
            |--------------------------------------------------------------------------
            | Stripe Client
            |--------------------------------------------------------------------------
            */

            $stripe = new StripeClient(
                config('cashier.secret')
            );

            /*
            |--------------------------------------------------------------------------
            | Get Customer
            |--------------------------------------------------------------------------
            */

            $customer = $stripe->customers->retrieve(
                $user->stripe_id,
                []
            );

            /*
            |--------------------------------------------------------------------------
            | Find payment method
            |--------------------------------------------------------------------------
            */

            $paymentMethodId = null;

            /*
            | Subscription default payment method
            */

            if (!empty($stripeObject['default_payment_method'])) {

                $paymentMethodId =
                    $stripeObject['default_payment_method'];
            }

            /*
            | Customer invoice default payment method
            */

            if (
                !$paymentMethodId &&
                !empty($customer->invoice_settings->default_payment_method)
            ) {

                $paymentMethodId =
                    $customer->invoice_settings->default_payment_method;
            }

            /*
            |--------------------------------------------------------------------------
            | Retrieve payment method
            |--------------------------------------------------------------------------
            */

            if ($paymentMethodId) {

                $paymentMethod =
                    $stripe->paymentMethods->retrieve(
                        $paymentMethodId,
                        []
                    );

                $pmType =
                    $paymentMethod->type ?? null;

                $lastFour = null;

                /*
                |--------------------------------------------------------------------------
                | Card
                |--------------------------------------------------------------------------
                */

                if (
                    $pmType === 'card' &&
                    !empty($paymentMethod->card)
                ) {

                    $lastFour =
                        $paymentMethod->card->last4 ?? null;
                }

                /*
                |--------------------------------------------------------------------------
                | Update user
                |--------------------------------------------------------------------------
                */

                $user->update([

                    'pm_type' =>
                        $pmType,

                    'pm_last_four' =>
                        $lastFour,

                ]);

                Log::info(
                    'PAYMENT METHOD SYNCED',
                    [
                        'user_id' =>
                            $user->id,

                        'payment_method_id' =>
                            $paymentMethodId,

                        'pm_type' =>
                            $pmType,

                        'pm_last_four' =>
                            $lastFour,
                    ]
                );

                return;
            }

            /*
            |--------------------------------------------------------------------------
            | No default payment method
            |--------------------------------------------------------------------------
            */

            Log::warning(
                'Stripe customer has no default payment method',
                [
                    'user_id' =>
                        $user->id,

                    'stripe_customer' =>
                        $user->stripe_id,
                ]
            );

        } catch (\Throwable $e) {

            Log::error(
                'PAYMENT METHOD SYNC FAILED',
                [
                    'user_id' =>
                        $user->id,

                    'error' =>
                        $e->getMessage(),
                ]
            );
        }
    }


    /**
     * Handle successful invoice payment.
     */
    protected function handleSuccessfulPayment(
        User $user,
        array $invoice
    ): void {

        /*
        |--------------------------------------------------------------------------
        | Payment Method
        |--------------------------------------------------------------------------
        */

        $this->syncPaymentMethod(
            $user,
            $invoice
        );

        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        |
        | Your business rule:
        |
        | 7 DAYS FREE TRIAL
        |        ↓
        | PAYMENT
        |        ↓
        | 30 DAYS PAID
        |
        */

        $subscriptionStart = now();

        $subscriptionEnd =
            now()->copy()->addDays(30);

        /*
        |--------------------------------------------------------------------------
        | Update User
        |--------------------------------------------------------------------------
        */

        $user->update([

            'status' =>
                'active',

            'subscription_start' =>
                $subscriptionStart,

            'subscription_end' =>
                $subscriptionEnd,

        ]);

        $user->refresh();

        Log::info(
            'PAID SUBSCRIPTION ACTIVATED',
            [

                'user_id' =>
                    $user->id,

                'invoice' =>
                    $invoice['id'] ?? null,

                'stripe_subscription' =>
                    $invoice['subscription'] ?? null,

                'status' =>
                    $user->status,

                'pm_type' =>
                    $user->pm_type,

                'pm_last_four' =>
                    $user->pm_last_four,

                'subscription_start' =>
                    $user->subscription_start,

                'subscription_end' =>
                    $user->subscription_end,

            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Prevent duplicate invoice
        |--------------------------------------------------------------------------
        */

        if (
            !empty($invoice['id']) &&
            SubscriptionTransaction::where(
                'stripe_invoice_id',
                $invoice['id']
            )->exists()
        ) {

            Log::info(
                'Invoice already exists',
                [
                    'invoice' =>
                        $invoice['id'],
                ]
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Invoice amounts
        |--------------------------------------------------------------------------
        */

        $subtotal =
            ($invoice['subtotal'] ?? 0) / 100;

        $total =
            ($invoice['total'] ?? 0) / 100;

        $vat =
            $total - $subtotal;

        /*
        |--------------------------------------------------------------------------
        | Create transaction
        |--------------------------------------------------------------------------
        */

        $transaction =
            SubscriptionTransaction::create([

                'user_id' =>
                    $user->id,

                'stripe_invoice_id' =>
                    $invoice['id'] ?? null,

                'stripe_payment_intent' =>
                    $invoice['payment_intent'] ?? null,

                'stripe_subscription_id' =>
                    $invoice['subscription'] ?? null,

                'currency' =>
                    strtoupper(
                        $invoice['currency'] ?? 'aed'
                    ),

                'amount' =>
                    $subtotal,

                'vat' =>
                    $vat,

                'total' =>
                    $total,

                'status' =>
                    'paid',

                'payment_method' =>
                    $user->pm_type ?? 'card',

                'paid_at' =>
                    now(),

                'payload' =>
                    json_encode($invoice),

            ]);

        /*
        |--------------------------------------------------------------------------
        | Final Log
        |--------------------------------------------------------------------------
        */

        Log::info(
            'PAYMENT SUCCESS - USER UPDATED',
            [

                'user_id' =>
                    $user->id,

                'status' =>
                    $user->status,

                'pm_type' =>
                    $user->pm_type,

                'pm_last_four' =>
                    $user->pm_last_four,

                'trial_start' =>
                    $user->trial_start,

                'trial_end' =>
                    $user->trial_end,

                'trial_ends_at' =>
                    $user->trial_ends_at,

                'subscription_start' =>
                    $user->subscription_start,

                'subscription_end' =>
                    $user->subscription_end,

            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Payment Success Email
        |--------------------------------------------------------------------------
        */

        Mail::to($user->email)->send(
            new PaymentSuccessMail(
                $user,
                $transaction
            )
        );

        /*
        |--------------------------------------------------------------------------
        | Subscription Activated Email
        |--------------------------------------------------------------------------
        */

        Mail::to($user->email)->send(
            new SubscriptionActivatedMail($user)
        );
    }
}